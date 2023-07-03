<?php

namespace Modules\DocumentManager\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Repositories\MemoRepository;
use Modules\DocumentManager\Repositories\FolderRepository;
use Modules\DocumentManager\Http\Requests\CreateMemoRequest;
use Modules\DocumentManager\Http\Requests\UpdateMemoRequest;
use Modules\DocumentManager\Repositories\DocumentRepository;
use Modules\DocumentManager\Repositories\DocumentVersionRepository;

class MemoController extends AppBaseController
{
    /** @var MemoRepository $memoRepository*/
    private $memoRepository;

    /** @var DocumentRepository $documentRepository*/
    private $documentRepository;

    /** @var DocumentVersionRepository $documentVersionRepository*/
    private $documentVersionRepository;

    /** @var FolderRepository $folderRepository*/
    private $folderRepository;


    public function __construct(MemoRepository $memoRepo, DocumentRepository $documentRepo, FolderRepository $folderRepo, DocumentVersionRepository $documentVersionRepo)
    {
        $this->memoRepository = $memoRepo;
        $this->documentRepository = $documentRepo;
        $this->documentVersionRepository = $documentVersionRepo;
        $this->folderRepository = $folderRepo;
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
