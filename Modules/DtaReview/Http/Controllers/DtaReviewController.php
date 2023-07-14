<?php

namespace Modules\DtaReview\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\DTAReview\Repositories\DTAReviewRepository;

class DtaReviewController extends Controller
{
    /** @var DTAReviewRepository $dtaReviewRepository*/
    private $dtaReviewRepository;

    public function __construct(DTAReviewRepository $dtaReviewRepo)
    {
        $this->dtaReviewRepository = $dtaReviewRepo;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $dtareview = $this->dtaReviewRepository->paginate(10);

        return view('dtareview::dtareview.index')->with('dtareviews', $dtareview);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('dtareview::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('dtareview::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dtareview::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
