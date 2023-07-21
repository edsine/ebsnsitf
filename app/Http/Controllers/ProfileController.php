<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Flash;
use App\Repositories\StaffRepository;
use App\Http\Controllers\AppBaseController;

class ProfileController extends AppBaseController
{
    
    /** @var $staffRepository StaffRepository */
    private $staffRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StaffRepository $staffRepo)
    {
        $this->middleware('auth');
        $this->staffRepository = $staffRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        //echo "I am on the profile page";
        return view('users/profile', compact('user'));
    }


    public function eSignature()
    {
         $id = Auth::id();
        
        //echo "I am on the profile page";'
        $esignature = $this->staffRepository->getByUserId($id);
        return view('users.e_signature', compact('esignature'));
    }
    
    public function showProfile()
    {
        return view('users.show_profile');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'nullable|string|min:6|same:password_confirmation'
        ]);
        if($request->filled('password')){
            $request->request->add([
                'password' => Hash::make($request->password),
            ]);
        }else {
            $request->request->remove('password');
        }
        $input = $request->all();
        $item = User::findorFail($id);
        $item->update($input);
        Flash::success('Employer saved successfully.');
        return redirect()->route('home');
    }


    public function eSignatureUpdate(Request $request, $id)
    {
        $request->validate([
            'user_signature' => 'required'
        ]);
       

        $esignature = $this->staffRepository->find($id);
        if(!$esignature){
            Flash::error('staff does not exist');
            return redirect()->route('profile');  
        }

        $input =  $request->all();

        if ($request->hasFile('user_signature')) {
            $file = $request->file('user_signature');
            $fileName = $file->hashName();
            $path = $file->store('public');
            $input['user_signature'] = $fileName;
        } else {
            // prevent picture from updating db since there is no upload
            unset($input['user_signature']);
        }
        // $input = $request->();
       
        $esignature->update($input);

        Flash::success('Staff e-Signature saved successfully.');
        return redirect()->route('profile');
    }
}



