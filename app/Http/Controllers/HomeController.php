<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\EmployerManager\Models\Employee;
use Modules\EmployerManager\Models\Employer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $registered_employers = Employer::where('status', 1)->count();
        $pending_employers = Employer::where('status', 2)->count();
        $registered_employees = Employee::where('status', 1)->count();
        $pending_employees = Employee::where('status', 2)->count();
        $data = Employer::where('status', 1);
        $data = $data->paginate(10);
        return view('home', compact('registered_employers', 'pending_employers', 'registered_employees', 'pending_employees', 'data'));
    }
}
