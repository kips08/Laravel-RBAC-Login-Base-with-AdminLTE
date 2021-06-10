<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class HakAksesController extends Controller
{
    //
    public function index(Request $request){
        $hakakses = Permission::all();
        return view('hakakses.index', compact('hakakses'));
    }
}
