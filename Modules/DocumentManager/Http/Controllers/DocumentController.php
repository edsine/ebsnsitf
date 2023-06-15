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
        $documents = $this->documentRepository->paginate(10);

        return view('documentmanager::documents.index')
            ->with('documents', $documents);
    }

    /**
     * Show the form for creating a new Document.
     */
    public function create()
    {
        $folders = $this->folderRepository->all()->pluck('name', 'id');
        $folders->prepend('Select folder', '');
        return view('documentmanager::documents.create')->with(['folders' => $folders]);
    }

    /**
     * Store a newly created Document in storage.
     */
    public function store(CreateDocumentRequest $request)
    {
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

        $input['document_url'] = $file_name;

        $document = $this->documentRepository->create($input);

        Flash::success('Document saved successfully.');

        return redirect(route('documents.index'));
    }

    /**
     * Display the specified Document.
     */
    public function show($id)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        return view('documentmanager::documents.show')->with('document', $document);
    }

    /**
     * Show the form for editing the specified Document.
     */
    public function edit($id)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $folders = $this->folderRepository->all()->pluck('name', 'id');
        $folders->prepend('Select folder', '');
        return view('documentmanager::documents.edit')->with(['document' => $document, 'folders' => $folders]);
    }

    /**
     * Update the specified Document in storage.
     */
    public function update($id, UpdateDocumentRequest $request)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        // Get new version count
        $document_versions_count = $document->documentVersions()->withTrashed()->count();
        $new_count = $document_versions_count + 1;

        // Get folder and its parents. Create if path does not exist
        $documents_folder  = $document->folder;
        $path = "documents/";

        $path .= $documents_folder->getAllAncestorsPath();

        $path .= $documents_folder->name;


        $path_folder = public_path($path);

        // Save file

        $file = $request->file('file');

        $title = str_replace(' ', '', $document->title);

        $file_name = $title . '_' . 'v' . $new_count . '_' . rand() . '.' . $file->getClientOriginalExtension();
        $file->move($path_folder, $file_name);

        $input['document_id'] = $id;
        $input['created_by'] = Auth::user()->id;
        $input['version_number'] = $document_versions_count + 1;
        $input['document_url'] = $file_name;

        $documentVersion = $this->documentVersionRepository->create($input);

        Flash::success('Document updated successfully.');

        return redirect(route('documents.index'));
    }

    /**
     * Remove the specified Document from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $document = $this->documentRepository->find($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        $this->documentRepository->delete($id);

        Flash::success('Document deleted successfully.');

        return redirect(route('documents.index'));
    }
}
