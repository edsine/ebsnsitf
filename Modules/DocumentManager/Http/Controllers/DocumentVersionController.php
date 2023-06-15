<?php

namespace Modules\DocumentManager\Http\Controllers;

use Modules\DocumentManager\Http\Requests\CreateDocumentVersionRequest;
use Modules\DocumentManager\Http\Requests\UpdateDocumentVersionRequest;
use App\Http\Controllers\AppBaseController;
use Modules\DocumentManager\Repositories\DocumentVersionRepository;
use Illuminate\Http\Request;
use Flash;

class DocumentVersionController extends AppBaseController
{
    /** @var DocumentVersionRepository $documentVersionRepository*/
    private $documentVersionRepository;

    public function __construct(DocumentVersionRepository $documentVersionRepo)
    {
        $this->documentVersionRepository = $documentVersionRepo;
    }

    /**
     * Display a listing of the DocumentVersion.
     */
    public function index(Request $request)
    {
        $documentVersions = $this->documentVersionRepository->paginate(10);

        return view('documentmanager::document_versions.index')
            ->with('documentVersions', $documentVersions);
    }

    /**
     * Show the form for creating a new DocumentVersion.
     */
    public function create()
    {
        return view('documentmanager::document_versions.create');
    }

    /**
     * Store a newly created DocumentVersion in storage.
     */
    public function store(CreateDocumentVersionRequest $request)
    {
        $input = $request->all();

        $documentVersion = $this->documentVersionRepository->create($input);

        Flash::success('Document Version saved successfully.');

        return redirect(route('documentVersions.index'));
    }

    /**
     * Display the specified DocumentVersion.
     */
    public function show($id)
    {
        $documentVersion = $this->documentVersionRepository->find($id);

        if (empty($documentVersion)) {
            Flash::error('Document Version not found');

            return redirect(route('documentVersions.index'));
        }

        return view('documentmanager::document_versions.show')->with('documentVersion', $documentVersion);
    }

    /**
     * Show the form for editing the specified DocumentVersion.
     */
    public function edit($id)
    {
        $documentVersion = $this->documentVersionRepository->find($id);

        if (empty($documentVersion)) {
            Flash::error('Document Version not found');

            return redirect(route('documentVersions.index'));
        }

        return view('documentmanager::document_versions.edit')->with('documentVersion', $documentVersion);
    }

    /**
     * Update the specified DocumentVersion in storage.
     */
    public function update($id, UpdateDocumentVersionRequest $request)
    {
        $documentVersion = $this->documentVersionRepository->find($id);

        if (empty($documentVersion)) {
            Flash::error('Document Version not found');

            return redirect(route('documentVersions.index'));
        }

        $documentVersion = $this->documentVersionRepository->update($request->all(), $id);

        Flash::success('Document Version updated successfully.');

        return redirect(route('documentVersions.index'));
    }

    /**
     * Remove the specified DocumentVersion from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $documentVersion = $this->documentVersionRepository->find($id);

        if (empty($documentVersion)) {
            Flash::error('Document Version not found');

            return redirect(route('documentVersions.index'));
        }

        $this->documentVersionRepository->delete($id);

        Flash::success('Document Version deleted successfully.');

        return redirect(route('documentVersions.index'));
    }
}
