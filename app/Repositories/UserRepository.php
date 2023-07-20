<?php

namespace App\Repositories;

use App\Models\User;
use Modules\WorkflowEngine\Models\Staff;
use App\Repositories\BaseRepository;
use DB;

/**
 * Class UserRepository
 * @package App\Repositories
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'email',
        'password'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return User::class;
    }

    public function getByUserId($id)
    {
        return $user = User::join('staff', 'users.id', '=', 'staff.user_id')
        ->select('users.*','staff.*', 'users.id as userId', 'staff.id as staff_id')
        ->where('staff.user_id', $id)
        ->first();
    }

    public function getSomeTablesData($id)
    {
        return DB::table('users')
        ->join('staff', 'users.id', '=', 'staff.user_id')
       // ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        //->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->join('departments', 'staff.department_id', '=', 'departments.id')
        ->join('branches', 'staff.branch_id', '=', 'branches.id')
        ->where('user_id', $id)
        ->first();
    }

}
