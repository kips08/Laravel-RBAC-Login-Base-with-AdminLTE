<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenggunaController extends Controller
{
    //
    public function index(Request $request){
        if(!empty($request->search)){
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')->paginate(5);
        } else {
            $users = User::paginate(5);
        }
        $user = Auth::user();
        
        return view('pengguna.index', compact('users'));
    }

    
}
