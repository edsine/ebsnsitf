<?php

namespace Modules\DocumentManager\Http\Controllers;

use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Repositories\FolderRepository;
use Modules\DocumentManager\Repositories\DocumentRepository;
use Modules\DocumentManager\Http\Requests\CreateDocumentRequest;
use Modules\DocumentManager\Http\Requests\UpdateDocumentRequest;
use Modules\DocumentManager\Repositories\DocumentVersionRepository;
use Modules\DocumentManager\Http\Requests\CreateDocumentVersionRequest;

class DocumentController extends AppBaseController
{
    /** @var DocumentRepository $documentRepository*/
    private $documentRepository;

    /** @var DocumentVersionRepository $documentVersionRepository*/
    private $documentVersionRepository;

    /** @var FolderRepository $folderRepository*/
    private $folderRepository;

    public function __construct(DocumentRepository $documentRepo, FolderRepository $folderRepo, DocumentVersionRepository $documentVersionRepo)
    {
        $this->documentRepository = $documentRepo;
        $this->documentVersionRepository = $documentVersionRepo;
        $this->folderRepository = $folderRepo;
    }

    /**
     * Display a listing of the Document.
     */
    public function index(Request $request)
    {

    }

    /**
     * Display a listing of the Document Versions.
     */
    public function documentVersions(Request $request, $id)
    {
    }

    /**
     * Display a listing of the Document in a folder Versions.
     */
    public function folderDocumentVersions(Request $request, $id)
    {
        if (!checkPermission('read document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }

        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }
        $documentVersions = $document->documentVersions()->paginate(10);

        return view('documentmanager::folders.documents.document_versions.index')
            ->with(['document' => $document, 'documentVersions' => $documentVersions]);
    }

    /**
     * Show the form for creating a new Document.
     */
    public function create()
    {
    }

    /**
     * Store a newly created Document in storage.
     */
    public function store(CreateDocumentRequest $request)
    {
        if (!checkPermission('create document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;

        // Check if folder exist
        $folder = $this->folderRepository->find($input['folder_id']);
        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect(route('documents.index'));
        }

        // Get folder and its parents. Create if path does not exist
        $path = "documents/";

        $path .= $folder->getAllAncestorsPath();

        $path .= $folder->name;


        $path_folder = public_path($path);

        // Save file

        $file = $request->file('file');

        $title = str_replace(' ', '', $input['title']);

        $file_name = $title . '_' . 'v1' . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);

        $document_url = $path . "/" . $file_name;

        $input['document_url'] = $document_url;

        $document = $this->documentRepository->create($input);

        // Save document version

        $version_input['document_id'] = $document->id;
        $version_input['created_by'] = Auth::user()->id;
        $version_input['version_number'] = 1;
        $version_input['document_url'] = $document_url;

        $documentVersion = $this->documentVersionRepository->create($version_input);

        Flash::success('Document saved successfully.');


        return redirect(route('folders.show', $folder->id));

        // return redirect(route('documents.index'));
    }

    /**
     * Display the specified Document.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified Document.
     */
    public function edit($id)
    {
    }

    /**
     * Show the form for editing the specified document in a folder.
     */
    public function folderEditDocument($id, $folder_id)
    {
        if (!checkPermission('update document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $document = $this->documentRepository->find($id);
        $folder = $this->folderRepository->find($folder_id);

        if (empty($folder)) {
            Flash::error('Folder not found');

            return redirect()->back();
        }

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('folders.show', $folder_id));
        }

        return view('documentmanager::folders.documents.edit')->with(['document' => $document, 'folder' => $folder]);
    }

    /**
     * Update the specified Document in storage.
     */
    public function update($id, CreateDocumentVersionRequest $request)
    {
        if (!checkPermission('update document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $input = $request->all();
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $documents_folder = $document->folder;
        // Get folder and its parents. Create if path does not exist
        $path = "documents/";

        $path .= $documents_folder->getAllAncestorsPath();

        $path .= $documents_folder->name;

        $path_folder = public_path($path);


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

        // $document_input['title'] = $input['title'];
        // $document_input['description'] = $input['description'];

        // $document = $this->documentRepository->update($document_input, $id);

        // Save document version

        $version_input['document_id'] = $id;
        $version_input['created_by'] = Auth::user()->id;
        $version_input['version_number'] = $new_count;
        $version_input['document_url'] = $document_url;

        $documentVersion = $this->documentVersionRepository->create($version_input);

        Flash::success('Document updated successfully.');

        return redirect(route('folders.show', $documents_folder->id));
        // return redirect(route('documents.index'));
    }

    /**
     * Remove the specified Document from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (!checkPermission('delete document')) {
            Flash::error('Permission denied');

            return redirect()->back();
        }
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect()->back();
        }

        $this->documentRepository->delete($id);

        Flash::success('Document deleted successfully.');

        return redirect()->back();
    }
}
