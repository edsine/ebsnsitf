<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\DocumentManager\Database\Seeders\DocumentManagerDatabaseSeeder;
use Modules\WorkflowEngine\Database\Seeders\WorkflowEngineDatabaseSeeder;
use Modules\EmployerManager\Database\Seeders\EmployerManagerDatabaseSeeder;

//use Module\HumanResource\Database\Seeders\LeaveTypeTableSeeder;
//use Modules\HumanResource\Database\Seeders\LeaveTypeTableSeeder as SeedersLeaveTypeTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(RolesAndPermissionsTablesSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(LocalGovernmentsTableSeeder::class);
        $this->call(RealRolesTablesSeeder::class);
        $this->call(DepartmentsAndBranchesTablesSeeder::class);
        $this->call(DTAPermissionsTableSeeder::class);
        $this->call(RealUsersAndStaffTablesSeeder::class);
        $this->call(EmployersTableSeeder::class);
        $this->call(NewRolesAndPermissionsTablesSeeder::class);

        // Modules
        $this->call(WorkflowEngineDatabaseSeeder::class);
        $this->call(DocumentManagerDatabaseSeeder::class);
        $this->call(EmployerManagerDatabaseSeeder::class);
     //   $this->call(LeaveTypeTableSeeder::class);
    }
}
