<?php

namespace Modules\HumanResource\Http\Controllers;

use Flash;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;



use App\Repositories\StaffRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\DB;
use LeaveType;
use Modules\Shared\Repositories\BranchRepository;
use Modules\HumanResource\Http\Requests\UpdateLeaveRequests;

use Modules\HumanResource\Http\Requests\CreateLeaveRequests;
use Modules\HumanResource\Models\LeaveType as ModelsLeaveType;
use Modules\HumanResource\Repositories\LeaveRequestRepository;
use Modules\HumanResource\Repositories\LeavetypeRepository;




class LeaveRequestController extends  AppBaseController
{

    /** @var LeaveRequestController $leaverequest*/
    private $leaverequestRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    /** @var LeavetypeRepository $branchRepository*/
    private $leavetypeRepository ;


 

/** @var StaffRepository $staffRepository*/
private $staffRepository;

public function __construct(LeaveRequestRepository $leaverequestRepo, BranchRepository $branchRepo, StaffRepository $staffRepo ,LeavetypeRepository $leavetypeRepo)
    {
        $this->leaverequestRepository = $leaverequestRepo;
        $this->branchRepository = $branchRepo;
        $this->staffRepository = $staffRepo;
        $this->leavetypeRepository = $leavetypeRepo;
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
        
        

        $leavetype = $this->leavetypeRepository->all();
       // $leavetype = $this->leavetypeRepository->all()->pluck('name','id');
        
    

        return view('humanresource::leaverequest.create',compact('leavetype'));

    }

    public function getDuration($id)
    {
      
        $leavetype = $this->leavetypeRepository->getById($id);

        return response()->json(['duration' => $leavetype->duration]);
    }

    public function leavetypeduration(Request $request)
    {
        $id=$request->get('id');
        
        $leavetype=$this->leavetypeRepository->find($id)->pluck('duration');
      

        return $leavetype;
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateLeaveRequests $request, LeavetypeRepository $leavetype)
    {

//         dd($leaverepo);
//   //atp
//   $input= $leaverepo->find($request->leavetype_id);
//atp

        
        $input=$request->all();
       
        $uid=Auth::id();

         //$staff_id = $this->staffRepository.getByUserId($uid);
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

         $this->leaverequestRepository->create($input);
        

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

            return redirect(route('leave_request.index'));
        }
        // $leavetype=$this->leavetypeRepository->find($id)->pluck('duration','id');
        $leavetype=$this->leavetypeRepository->find($id)->all();
       
        $branches = $this->branchRepository->all()->pluck('branch_name', 'id');
        $branches->prepend('Select branch', '');



        return view('humanresource::leaverequest.edit')->with(['LeaveRequest' => $leaverequest, 'branches' => $branches,'leavetype'=>$leavetype]);;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, UpdateLeaveRequests $request)
    {
        $leaverequest = $this->leaverequestRepository->find($id);

        if (empty($leaverequest)) {
            Flash::error('leave request not found');

            return redirect(route('leave_request.index'));
        }

        $input = $request->all();

        
        

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

        

        Flash::success('LEAVE REQUEST Updated successfully .');

        return redirect(route('leave_request.index'));
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







