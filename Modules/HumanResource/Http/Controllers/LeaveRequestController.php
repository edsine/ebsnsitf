<?php

namespace Modules\HumanResource\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;



use Modules\HumanResource\Http\Requests\CreateClaimsCompensationRequest;
use Modules\ClaimsCompensation\Http\Requests\UpdateClaimsCompensationRequest;
use App\Http\Controllers\AppBaseController;
use Modules\HumanResource\Repositories\ClaimsCompensationRepository;
use Flash;
use Modules\Shared\Repositories\BranchRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;



class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('humanresource::leaverequest.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('humanresource::leaverequest.create');
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
        return view('humanresource::leaverequest.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('humanresource::leaverequest.edit');
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
