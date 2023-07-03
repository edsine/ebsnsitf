<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\DocumentManager\Database\Seeders\DocumentManagerDatabaseSeeder;
use Modules\WorkflowEngine\Database\Seeders\WorkflowEngineDatabaseSeeder;

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
        $this->call(WorkflowEngineDatabaseSeeder::class);
        $this->call(DocumentManagerDatabaseSeeder::class);
    }
}
