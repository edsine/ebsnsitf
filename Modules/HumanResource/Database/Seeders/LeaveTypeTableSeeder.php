<?php

namespace Modules\HumanResource\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\HumanResource\App\Models;
use Illuminate\Database\Eloquent\Model;
use Modules\HumanResource\Models\LeaveType;

class LeaveTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Model::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('leavetype')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        LeaveType::factory(10)->create();

        
    }
}
