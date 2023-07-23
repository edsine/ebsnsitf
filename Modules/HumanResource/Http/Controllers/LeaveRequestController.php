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
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

use Modules\HumanResource\Http\Requests\CreateLeaveRequests;

=======
>>>>>>> origin
>>>>>>> atp

use Modules\HumanResource\Http\Requests\CreateLeaveRequests;

=======
>>>>>>> e043d26 (Atp (#75))

use Modules\HumanResource\Http\Requests\CreateLeaveRequests;

=======

use Modules\HumanResource\Http\Requests\CreateLeaveRequests;

>>>>>>> origin
// use Modules\HumanResource\Http\Requests\UpdateleaveRequests;
use Modules\HumanResource\Repositories\LeaveRequestRepository;
use Modules\HumanResource\Repositories\LeavetypeRepository;

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======

//use Modules\Leaves\Http\Requests\UpdateleavesRequest;
>>>>>>> e043d26 (Atp (#75))
=======

//use Modules\Leaves\Http\Requests\UpdateleavesRequest;
=======
=======

//use Modules\Leaves\Http\Requests\UpdateleavesRequest;
>>>>>>> atp
>>>>>>> origin



class LeaveRequestController extends  AppBaseController
{

    /** @var LeaveRequestController $leaverequest*/
    private $leaverequestRepository;

    /** @var BranchRepository $branchRepository*/
    private $branchRepository;

    /** @var LeavetypeRepository $branchRepository*/
    private $leavetypeRepository ;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======

>>>>>>> origin

>>>>>>> e043d26 (Atp (#75))
=======
=======

>>>>>>> origin
>>>>>>> atp


 

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

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
   
=======
=======
>>>>>>> origin
=======
   
=======
>>>>>>> atp
    //  public function getLeaveTypeDuration($id)
    //  {
    //     $leaveTypes=$this->leavetypeRepository->find($id);
    //     //  $leaveType = LeaveType::findOrFail($id);
    //     dd($leaveTypes);
    //      return response()->json(['duration' => $leaveTypes->duration]);
    //  }
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e043d26 (Atp (#75))
=======
=======
>>>>>>> atp
>>>>>>> origin


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
        
        

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        $leavetype = $this->leavetypeRepository->all()->pluck('name','id');
        
=======
=======
>>>>>>> origin
=======
        $leavetype = $this->leavetypeRepository->all()->pluck('name','id');
        
=======
>>>>>>> atp
        // $leavetype = $this->leavetypeRepository->all()->pluck('name','id');
        $leavetype = $this->leavetypeRepository->all()->pluck('name','id');
        // dd($duration);

        // $leavetype = $leavetypes->pluck('name', 'id')->map(function ($name, $id) use ($leavetypes) {
        //     $duration = $leavetypes->where('id', $id)->pluck('duration')->first();
        //     return $name . ' (' . $duration . ' days)';
        // });  

        // $leavetype=$this->leavetypeRepository->all()->pluck('name','id');

<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e043d26 (Atp (#75))
=======
=======
>>>>>>> atp
>>>>>>> origin
    

        return view('humanresource::leaverequest.create',compact('leavetype'));

    }

    public function getDuration($id)
    {
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> atp
      
=======
        /* $id = $request->input('id');
        $duration = DB::table('leave_type')->where('id', $id)->value('duration'); */
<<<<<<< HEAD
>>>>>>> e043d26 (Atp (#75))
=======
        /* $id = $request->input('id');
        $duration = DB::table('leave_type')->where('id', $id)->value('duration'); */
=======
>>>>>>> atp
>>>>>>> origin
        $leavetype = $this->leavetypeRepository->getById($id);

        return response()->json(['duration' => $leavetype->duration]);
    }

    public function leavetypeduration(Request $request)
    {
        $id=$request->get('id');
        
        $leavetype=$this->leavetypeRepository->find($id)->pluck('duration');
      

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
        // return view('humanresource::leaverequest.create',compact('leavetype'));
>>>>>>> e043d26 (Atp (#75))
=======
        // return view('humanresource::leaverequest.create',compact('leavetype'));
=======
=======
        // return view('humanresource::leaverequest.create',compact('leavetype'));
>>>>>>> atp
>>>>>>> origin
        return $leavetype;
    }


    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateLeaveRequests $request)
    {




        
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

            return redirect(route('leave_request.index'));
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
    public function update($id, UpdateLeaveRequests $request)
    {
        $leaverequest = $this->leaverequestRepository->find($id);

        if (empty($leaverequest)) {
            Flash::error('leave request not found');

            return redirect(route('leave_request.index'));
        }

        $input = $request->all();

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        
=======
        // $input['staff_id'] = Auth::id();
>>>>>>> e043d26 (Atp (#75))
=======
        // $input['staff_id'] = Auth::id();
=======
        
=======
        // $input['staff_id'] = Auth::id();
>>>>>>> atp
>>>>>>> origin
        

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







