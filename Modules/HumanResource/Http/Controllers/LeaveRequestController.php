<?php

namespace Modules\HumanResource\Http\Controllers;

use Flash;
//use LeaveRequest;
use Illuminate\Http\Request;

use Modules\HumanResource\Http\Requests\CreateLeaveRequests;
use Modules\HumanResource\Http\Requests\UpdateleaveRequests;

// use Modules\HumanResource\Repositories\DTAReviewRepository;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\StaffRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Support\Renderable;

use Modules\Shared\Repositories\BranchRepository;

use Modules\HumanResource\Repositories\LeaveRequestRepository;
//use Modules\Leaves\Http\Requests\UpdateleavesRequest;

// use Modules\HumanResource\Http\Requests\LeaveRequest;


class LeaveRequestController extends  AppBaseController
{

    /** @var LeaveRequestController $leaverequest*/
    private $leaverequestRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;


    //   /** @var DTAReviewRepository $dtaReviewRepository*/
    //   private $dtaReviewRepository;

/** @var StaffRepository $staffRepository*/
private $staffRepository;

public function __construct(LeaveRequestRepository $leaverequestRepo, BranchRepository $branchRepo, StaffRepository $staffRepo)
    {
        $this->leaverequestRepository = $leaverequestRepo;
        $this->branchRepository = $branchRepo;
        $this->staffRepository = $staffRepo;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()

    {
        $leaverequest=$this->leaverequestRepository->paginate(10);
        return view('humanresource::leaverequest.index',compact('leaverequest'));
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
    public function store(CreateLeaveRequests $request)
    {
//dd($request->all());
        $input=$request->all();
        $uid=Auth::id();

        // $staff_id = $this->staffRepository.getByUserId($uid);
        // $input['staff_id'] = $staff_id->id;
        $input['approve_status'] = 0;
        $input['supervisor_office'] = 0;
        $input['md_hr'] = 0;
        $input['leave_officer'] = 0;

        if ($request->hasFile('signature_path')) {
            $file = $request->file('signature_path');
            $fileName = $file->hashName();
            $path = $file->store('public');
            $input['signature_path'] = $fileName;
        }

        $leaverequest = $this->leaverequestRepository->create($input);
        

        Flash::success('Leave Requests sent successfully.');

        return redirect(route('leave_request.index'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)

    {
        $leaverequest = $this->leaverequestRepository->find($id);
        
        if (empty($leaverequest)) {
            Flash::error('Leave Requests not found');

            return redirect(route('leaverequests.index'));
        }




        return view('humanresource::leaverequest.show')->with('leaverequest',$leaverequest);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $leaverequest= $this->leaverequestRepository->find($id);
        if (empty($leaverequest)) {
            Flash::error('Leave Request not found');

            return redirect(route('leaverequest.index'));
        }
        
        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');



        return view('humanresource::leaverequest.edit')->with(['LeaveRequest' => $leaverequest, 'branches' => $branches]);;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, UpdateleavesRequest $request)
    {
        $leaverequest = $this->leaverequestRepository->find($id);

        if (empty($leaverequest)) {
            Flash::error('leave request not found');

            return redirect(route('leaverequest.index'));
        }

        $input = $request->all();

        $input['staff_id'] = Auth::id();
        

        if ($request->hasFile('uploaded_doc')) {
            $file = $request->file('uploaded_doc');
            $fileName = $file->hashName();
            $path = $file->store('public');
            $input['signature_path'] = $fileName;
        } else {
            // prevent images from updating db since there is no upload
            unset($input['signature_path']);
        }

        $leaverequest = $this->leaverequestRepository->update($input, $id);

        // $input_r = null;
        // $input_r['officer_id'] = $dtarequests->staff_id;
        // $input_r['dta_reviewid'] = $id;
        // $input_r['dta_id'] = $id;
        // $input_r['comments'] = $request->input('comments');
        // $input_r['review_status'] = $request->input('approval_status');
        // $input_r['created_at'] = now();
        // $input_r['updated_at'] = now();
        // $this->dtaReviewRepository->create($input_r);

        Flash::success('LEAVE REQUEST  successfully SENT.');

        return redirect(route('leaverequest.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $dtarequests = $this->leaverequestRepository->find($id);

        if (empty($dtarequests)) {
            Flash::error('LEAVE Requests not found');

            return redirect(route('leave_request.index'));
        }

        $this->leaverequestRepository->delete($id);

        Flash::success('LEAVE REQUEST DISCARDED SUCCESSFULLY.');

        return redirect(route('leave_request.index'));
    }
}







