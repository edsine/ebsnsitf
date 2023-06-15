<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Repositories\StaffRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Repositories\BranchRepository;
use App\Repositories\DepartmentRepository;
use Flash;
use Response;
use Hash;
use DB;
use Illuminate\Support\Collection;



class UserController extends AppBaseController
{
    /** @var $userRepository UserRepository */
    private $userRepository;

    /** @var $userRepository UserRepository */
    private $roleRepository;

    /** @var $branchRepository BranchRepository */
    private $branchRepository;

    /** @var $departmentRepository DepartmentRepository */
    private $departmentRepository;

    /** @var $staffRepository StaffRepository */
    private $staffRepository;

    public function __construct(UserRepository $userRepo, RoleRepository $roleRepo, BranchRepository $branchRepo, DepartmentRepository $departmentRepo, StaffRepository $staffRepo)
    {
        $this->userRepository = $userRepo;
        $this->roleRepository = $roleRepo;
        $this->branchRepository = $branchRepo;
        $this->departmentRepository = $departmentRepo;
        $this->staffRepository = $staffRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->paginate(10);

        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('name','id')->all();
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        $roles->prepend('Select role', '');
        $branch = $this->branchRepository->all()->pluck('branch_name', 'id');
        $department = $this->departmentRepository->all()->pluck('dep_unit', 'id');
        return view('users.create', compact('roles', 'branch', 'department'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = $this->userRepository->create($input);

        // Retrieve the value of the checkbox
        $checkboxValue = $request->input('checkbox');

        // Check if the checkbox is checked
        if ($checkboxValue == 1) {
        // Checkbox is checked
        $input['user_id'] = $user->id;
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $path = $file->store('public');
            $input['profile_picture'] = $path;
        }
        $this->staffRepository->create($input);
        } 

        $role = $this->roleRepository->find($input['roles']);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('users.index'));
        }


        $user->assignRole($role->name);

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mergedResults = DB::table('users')
        ->join('staff', 'users.id', '=', 'staff.user_id')
        ->where('user_id', $id)
        ->first();

        return view('users.show')->with('user', $mergedResults);
        //dd($mergedResults);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $roles = Role::pluck('name','id')->all();
        //$userRole = $user->roles->pluck('name','id')->all();

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit',compact('user','roles'));
        $user['role_id'] = $user->roles()->first()->id;

        $roles = $this->roleRepository->all()->pluck('name', 'id');

        $roles->prepend('Select role', '');

        return view('users.edit')->with(['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {

        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $input =  $request->all();

        $role = $this->roleRepository->find($input['roles']);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('users.index'));
        }

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            unset($input['password']);
        }

        $user = $this->userRepository->update($input, $id);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));

        $user->roles()->detach();
        $user->assignRole($role->name);


        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        if ($user->hasRole('super-admin')) {
            Flash::error('Cannot delete super admin');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }
}
