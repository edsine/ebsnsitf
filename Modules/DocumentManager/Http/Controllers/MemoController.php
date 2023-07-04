<?php

namespace Modules\DocumentManager\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use Modules\Shared\Repositories\DepartmentRepository;
use Modules\DocumentManager\Repositories\MemoRepository;
use Modules\DocumentManager\Repositories\FolderRepository;
use Modules\DocumentManager\Http\Requests\CreateMemoRequest;
use Modules\DocumentManager\Http\Requests\UpdateMemoRequest;
use Modules\DocumentManager\Repositories\DocumentRepository;
use Modules\DocumentManager\Repositories\MemoHasUserRepository;
use Modules\DocumentManager\Repositories\DocumentVersionRepository;
use Modules\DocumentManager\Repositories\MemoHasDepartmentRepository;

class MemoController extends AppBaseController
{
    /** @var MemoRepository $memoRepository*/
    private $memoRepository;

    /** @var MemoHasDepartmentRepository $memoHasDepartmentRepository*/
    private $memoHasDepartmentRepository;

    /** @var MemoHasUserRepository $memoHasUserRepository*/
    private $memoHasUserRepository;

    /** @var DocumentRepository $documentRepository*/
    private $documentRepository;

    /** @var DocumentVersionRepository $documentVersionRepository*/
    private $documentVersionRepository;

    /** @var FolderRepository $folderRepository*/
    private $folderRepository;

    /** @var $userRepository UserRepository */
    private $userRepository;

    /** @var DepartmentRepository $departmentRepository*/
    private $departmentRepository;


    public function __construct(MemoRepository $memoRepo, MemoHasDepartmentRepository $memoHasDepartmentRepo, MemoHasUserRepository $memoHasUserRepo,  DocumentRepository $documentRepo, FolderRepository $folderRepo, DocumentVersionRepository $documentVersionRepo, UserRepository $userRepo, DepartmentRepository $departmentRepo)
    {
        $this->memoRepository = $memoRepo;
        $this->memoHasDepartmentRepository = $memoHasDepartmentRepo;
        $this->memoHasUserRepository = $memoHasUserRepo;
        $this->documentRepository = $documentRepo;
        $this->documentVersionRepository = $documentVersionRepo;
        $this->folderRepository = $folderRepo;
        $this->userRepository = $userRepo;
        $this->departmentRepository = $departmentRepo;
    }

    /**
     * Display a listing of the Memo.
     */
    public function index(Request $request)
    {
        if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $memos = $this->memoRepository->paginate(10);

        return view('documentmanager::memos.index')
            ->with('memos', $memos);
    }

    /**
     * Show the form for creating a new Memo.
     */
    public function create()
    {
        if (!checkPermission('create memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        return view('documentmanager::memos.create');
    }

    /**
     * Store a newly created Memo in storage.
     */
    public function store(CreateMemoRequest $request)
    {
        if (!checkPermission('create memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $user = Auth::user();
        $input = $request->all();
        $input['created_by'] = $user->id;

        // Get folder and its parents. Create if path does not exist
        $path = "documents/";


        // Check if memo folder exists. Create if it does not exist
        $memo_folder = $this->folderRepository->findByName('Memo')->first();
        if (empty($memo_folder)) {
            $folder_input['name'] = 'Memo';
            $folder_input['description'] = "MD's Memos";
            $folder_input['branch_id'] = $user->staff ? $user->staff->branch_id : 1;
            $folder_input['department_id'] = $user->staff ? $user->staff->department_id : 1;
            $folder_input['created_by'] = $user->id;

            $memo_folder = $this->folderRepository->create($folder_input);
        }

        // Prepare document input
        $document_input['folder_id'] = $memo_folder->id;
        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];
        $document_input['created_by'] = $user->id;

        $path .= $memo_folder->name;


        $path_folder = public_path($path);

        // Save file

        $file = $request->file('file');

        $title = str_replace(' ', '', $input['title']);

        $file_name = $title . '_' . 'v1' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);

        $document_url = $path . "/" . $file_name;

        $document_input['document_url'] = $document_url;

        $document = $this->documentRepository->create($document_input);

        // Save document version

        // Save document version

        $version_input['document_id'] = $document->id;
        $version_input['created_by'] = Auth::user()->id;
        $version_input['version_number'] = 1;
        $version_input['document_url'] = $document_url;

        $documentVersion = $this->documentVersionRepository->create($version_input);

        //End save document version

        // End file save

        $input['document_id'] = $document->id;

        $memo = $this->memoRepository->create($input);

        Flash::success('Memo saved successfully.');

        return redirect(route('memos.index'));
    }

    /**
     * Assign memo to users
     */

    public function assignToUsers(Request $request)
    {
        $logged_in_user = Auth::user();
        $input = $request->all();
        $memo_id = $input['memo_id'];
        $users = $input['users'];

        if (!checkPermission('assign memo to user')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($memo_id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }
        // dd($input);
        foreach ($users as $key => $user_id) {
            $input_fields['user_id'] = $user_id;
            $input_fields['memo_id'] = $memo_id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            // Check if user exists
            $user = $this->userRepository->find($user_id);
            if (empty($user)) {
                continue;
            }

            // Check if entry with user_id and memo_id exists
            $memo_has_user = $this->memoHasUserRepository->findByUserAndMemo($user_id, $memo_id);
            if (!empty($memo_has_user)) {
                continue;
            }

            $this->memoHasUserRepository->create($input_fields);
        }

        Flash::success('Memo assigned successfully to user(s).');

        return redirect(route('memos.index'));
    }

    /**
     * Assign memo to departments
     */

    public function assignToDepartments(Request $request)
    {
        $logged_in_user = Auth::user();
        $input = $request->all();
        $memo_id = $input['memo_id'];
        $departments = $input['departments'];

        if (!checkPermission('assign memo to department')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($memo_id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        foreach ($departments as $key => $department_id) {
            $input_fields['department_id'] = $department_id;
            $input_fields['memo_id'] = $memo_id;
            $input_fields['assigned_by'] = $logged_in_user->id;

            // Check if department exists
            $department = $this->departmentRepository->find($department_id);
            if (empty($department)) {
                continue;
            }

            // Check if entry with user_id and memo_id exists
            $memo_has_department = $this->memoHasDepartmentRepository->findByDepartmentAndMemo($department_id, $memo_id);
            if (!empty($memo_has_department)) {
                continue;
            }

            $this->memoHasDepartmentRepository->create($input_fields);
        }

        Flash::success('Memo assigned successfully to department(s).');

        return redirect(route('memos.index'));
    }

    /**
     * Display a listing of the assigned users to a Memo.
     */
    public function assignedUsers(Request $request, $id)
    {
        if (!checkPermission('read user-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $assigned_users = $memo->assignedUsers()->paginate();

        return view('documentmanager::memos.assigned_users')
            ->with(['memo' => $memo, 'assigned_users' => $assigned_users]);
    }

    /**
     * Display a listing of the assigned departments to a Memo.
     */
    public function assignedDepartments(Request $request, $id)
    {
        if (!checkPermission('read department-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $assigned_departments = $memo->assignedDepartments()->paginate();

        return view('documentmanager::memos.assigned_departments')
            ->with(['memo' => $memo, 'assigned_departments' => $assigned_departments]);
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedUser($user_id, $memo_id)
    {
        if (!checkPermission('delete user-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo_has_user = $this->memoHasUserRepository->findByUserAndMemo($user_id, $memo_id);

        if (empty($memo_has_user)) {
            Flash::error('Assignment not found');

            return redirect(route('memos.assignedUsers', $memo_id));
        }

        $this->memoHasUserRepository->delete($memo_has_user->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('memos.assignedUsers', $memo_id));
    }

    /**
     * Remove the specified department assignment from storage.
     *
     * @throws \Exception
     */
    public function deleteAssignedDepartment($department_id, $memo_id)
    {
        if (!checkPermission('delete department-memo assignment')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo_has_department = $this->memoHasDepartmentRepository->findByDepartmentAndMemo($department_id, $memo_id);

        if (empty($memo_has_department)) {
            Flash::error('Assignment not found');

            return redirect(route('memos.assignedDepartments', $memo_id));
        }

        $this->memoHasDepartmentRepository->delete($memo_has_department->id);

        Flash::success('Assignment deleted successfully.');

        return redirect(route('memos.assignedDepartments', $memo_id));
    }

    /**
     * Display a listing of the Memo Versions.
     */
    public function memoVersions(Request $request, $id)
    {
        if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $memo_document = $this->documentRepository->find($memo->document_id);

        if (empty($memo_document)) {
            Flash::error("Memo's document not found");

            return redirect(route('memos.index'));
        }

        $memoVersions = $memo_document->documentVersions()->paginate(10);

        return view('documentmanager::memos.memo_versions.index')
            ->with(['memo' => $memo, 'memo_document' => $memo_document, 'documentVersions' => $memoVersions]);
    }


    /**
     * Display the specified Memo.
     */
    public function show($id)
    {
        if (!checkPermission('read memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        return view('documentmanager::memos.show')->with('memo', $memo);
    }

    /**
     * Show the form for editing the specified Memo.
     */
    public function edit($id)
    {
        if (!checkPermission('update memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        return view('documentmanager::memos.edit')->with('memo', $memo);
    }

    /**
     * Update the specified Memo in storage.
     */
    public function update($id, UpdateMemoRequest $request)
    {
        if (!checkPermission('update memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $input = $request->all();
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        // Get folder and its parents. Create if path does not exist
        $memo_folder = $this->folderRepository->findByName('Memo')->first();

        $path = "documents/";

        $path .= $memo_folder->name;

        $path_folder = public_path($path);

        // Get document
        $document_id = $memo->document_id;
        $document = $this->documentRepository->find($document_id);

        if (empty($document)) {
            Flash::error("Memo's Document not found");

            return redirect(route('memos.index'));
        }

        // Get new version count
        $document_versions_count = $document->documentVersions()->withTrashed()->count();
        $new_count = $document_versions_count + 1;
        // Save file

        $file = $request->file('file');

        $title = str_replace(' ', '', $document->title);

        $file_name = $title . '_' . 'v' . $new_count . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);

        $document_url = $path . "/" . $file_name;

        // Save document

        $document_input['title'] = $input['title'];
        $document_input['description'] = $input['description'];

        $document = $this->documentRepository->update($document_input, $document_id);

        // Save document version

        $version_input['document_id'] = $document->id;
        $version_input['created_by'] = Auth::user()->id;
        $version_input['version_number'] = $new_count;
        $version_input['document_url'] = $document_url;

        $documentVersion = $this->documentVersionRepository->create($version_input);

        $memo = $this->memoRepository->update($input, $id);

        Flash::success('Memo updated successfully.');

        return redirect(route('memos.index'));
    }

    /**
     * Remove the specified Memo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (!checkPermission('delete memo')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $this->memoRepository->delete($id);

        Flash::success('Memo deleted successfully.');

        return redirect(route('memos.index'));
    }
}
