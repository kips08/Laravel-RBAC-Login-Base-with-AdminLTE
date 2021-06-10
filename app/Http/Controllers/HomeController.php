<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {       
        // $permission = ['hakakses.*', 'hakakses.tambah', 'hakakses.lihat', 'hakakses.edit', 'hakakses.hapus'];
        // foreach($permission as $p){
            
        //     Permission::create(['name' => $p]);
        // }
        return view('home');
    }
}
