<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Flash;
use Response;
use Hash;

class UserController extends AppBaseController
{
    /** @var $userRepository UserRepository */
    private $userRepository;

    /** @var $userRepository UserRepository */
    private $roleRepository;

    public function __construct(UserRepository $userRepo, RoleRepository $roleRepo)
    {
        $this->userRepository = $userRepo;
        $this->roleRepository = $roleRepo;
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
        $roles = $this->roleRepository->all()->pluck('name', 'id');
        $roles->prepend('Select role', '');
        return view('users.create')->with('roles', $roles);
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

        $role = $this->roleRepository->find($input['role_id']);

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
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
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

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

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

        $role = $this->roleRepository->find($input['role_id']);

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
