<?php

namespace App\Repositories;

use App\Models\User;
use Modules\WorkflowEngine\Models\Staff;
use App\Repositories\BaseRepository;

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

}
