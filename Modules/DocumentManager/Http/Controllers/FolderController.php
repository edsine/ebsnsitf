<?php

namespace Modules\DocumentManager\Http\Controllers;

use Modules\DocumentManager\Http\Requests\CreateFolderRequest;
use Modules\DocumentManager\Http\Requests\UpdateFolderRequest;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Repositories\FolderRepository;
use Illuminate\Http\Request;
use Flash;
use Modules\Shared\Repositories\BranchRepository;
use Modules\Shared\Repositories\DepartmentRepository;

class FolderController extends AppBaseController
{
    /** @var FolderRepository $folderRepository*/
    private $folderRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;

    public function __construct(FolderRepository $folderRepo, BranchRepository $branchRepo, DepartmentRepository $departmentRepo)
    {
        $this->folderRepository = $folderRepo;
        $this->departmentRepository = $departmentRepo;
        $this->branchRepository = $branchRepo;
    }

    /**
     * Display a listing of the Folder.
     */
    public function index(Request $request)
    {
        // Gets folders without a parent folder
        $folders = $this->folderRepository->rootFolders()->paginate(10);

        return view('documentmanager::folders.index')
            ->with('folders', $folders);
    }

    /**
     * Show the form for creating a new Folder.
     */
    public function create()
    {
        $folders = $this->folderRepository->all()->pluck('name', 'id');
        $folders->prepend('Select parent folder', '');

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        $departments = $this->departmentRepository->all()->pluck('name', 'id');
        $departments->prepend('Select department', '');

        return view('documentmanager::folders.create')->with(['folders' => $folders, 'branches' => $branches, 'departments' => $departments]);
    }

    /**
     * Store a newly created Folder in storage.
     */
    public function store(CreateFolderRequest $request)
    {
        $input = $request->all();


        if (empty($input['parent_folder_id'])) {

            $folder_count_by_name = $this->folderRepository->findByName($input['name'])->count();
            if ($folder_count_by_name > 0) {
                Flash::error('Name has been taken already');
                return redirect()->back();
            }

            if (empty($input['branch_id']) || empty($input['department_id'])) {
                Flash::error('Branch and department fields cannot be empty');
                return redirect()->back();
            }
        }

        if (!empty($input['parent_folder_id'])) {

            $parent_folder = $this->folderRepository->find($input['parent_folder_id']);
            if (empty($parent_folder)) {
                Flash::error('Parent Folder not found');

                return redirect()->back();
            }

            $folder_count_by_name_and_parent_id = $this->folderRepository->findByNameAndParentId($input['name'], $input['parent_folder_id'])->count();
            if ($folder_count_by_name_and_parent_id > 0) {
                Flash::error('Name has been taken already');
                return redirect()->back();
            }


            if (empty($input['branch_id']) || empty($input['department_id'])) {
                $input['branch_id'] = $parent_folder->branch->id;
                $input['department_id'] = $parent_folder->department->id;
            }
        }

        $folder = $this->folderRepository->create($input);

        Flash::success('Folder saved successfully.');

        if (isset($parent_folder)) {
            return redirect(route('folders.show', $parent_folder->id));
        }
        return redirect(route('folders.index'));
    }

    /**
     * Display the specified Folder.
     */
    public function show($id)
    {
        $folder = $this->folderRepository->find($id);

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }
        $sub_folders = $folder->subFolders()->paginate(10);
        $documents = $folder->documents()->paginate(10);

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        $departments = $this->departmentRepository->all()->pluck('name', 'id');
        $departments->prepend('Select department', '');


        return view('documentmanager::folders.show')->with(['folder' => $folder, 'sub_folders' => $sub_folders, 'documents' => $documents, 'branches' => $branches, 'departments' => $departments]);
    }

    /**
     * Show the form for editing the specified Folder.
     */
    public function edit($id)
    {
        $folder = $this->folderRepository->find($id);

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }

        $folders = $this->folderRepository->all()->pluck('name', 'id');
        $folders->prepend('Select parent folder', '');

        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');

        $departments = $this->departmentRepository->all()->pluck('name', 'id');
        $departments->prepend('Select department', '');

        return view('documentmanager::folders.edit')->with(['folder' => $folder, 'folders' => $folders, 'branches' => $branches, 'departments' => $departments]);
    }

    /**
     * Show the form for editing the specified Sub Folder.
     */
    public function editSubFolder($id, $parent_folder_id)
    {
        $sub_folder = $this->folderRepository->find($id);
        $parent_folder = $this->folderRepository->find($parent_folder_id);

        if (empty($parent_folder)) {
            Flash::error('Parent Folder not found');

            return redirect(route('folders.index'));
        }

        if (empty($sub_folder)) {
            Flash::error('Sub Folder not found');

            return redirect(route('folders.show', $parent_folder->id));
        }

        return view('documentmanager::folders.sub_folders.edit')->with(['sub_folder' => $sub_folder, 'parent_folder' => $parent_folder])->render();
    }

    /**
     * Update the specified Folder in storage.
     */
    public function update($id, UpdateFolderRequest $request)
    {
        $folder = $this->folderRepository->find($id);
        $input = $request->all();

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('folders.index'));
        }

        if (empty($input['branch_id']) && empty($input['branch_id']) && empty($input['parent_folder_id'])) {
            Flash::error('Parent folder and (branch and department) fields cannot be empty');
            return redirect()->back();
        }

        if (empty($input['branch_id']) && empty($input['branch_id']) && !empty($input['parent_folder_id'])) {
            $parent_folder = $this->folderRepository->find($input['parent_folder_id']);
            if (empty($parent_folder)) {
                Flash::error('Parent Folder not found');

                return redirect()->back();
            }

            $input['branch_id'] = $parent_folder->branch->id;
            $input['department_id'] = $parent_folder->department->id;
        }

        $folder = $this->folderRepository->update($input, $id);

        Flash::success('Folder updated successfully.');

        if (isset($parent_folder)) {
            return redirect(route('folders.show', $parent_folder->id));
        }
        return redirect(route('folders.index'));
    }

    /**
     * Remove the specified Folder from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $folder = $this->folderRepository->find($id);

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect()->back();
        }

        $this->folderRepository->delete($id);

        Flash::success('Folder deleted successfully.');

        return redirect()->back();
    }
}
