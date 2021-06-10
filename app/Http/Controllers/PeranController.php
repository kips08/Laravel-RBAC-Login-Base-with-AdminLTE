<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PeranController extends Controller
{
    //
    public function index(Request $request){
        $roles = Role::all();

        return view('peran.index', compact('roles'));
    }

    public function view($name){
        $role = Role::findByName($name);
        $permissions = Permission::all();
        foreach($permissions as $p){
            $exploded = explode('.', $p->name);
            $tree[$exploded[0]][] = $p;
        }
        return view('peran.view', compact('tree', 'role'));
    }

    public function update(Request $request, $name){
        try{    
            $request->validate([
                'checkHakakses' => 'required',
            ]);

            $role = Role::findByName($name);
            foreach($request->checkHakakses as $v){
                $permissions[] = Permission::findByName($v);
                $role->syncPermissions($permissions);
            }
            return Redirect::route('rbac.peran.view', $name)->with('success', 'Hak Akses berhasil di perbarui');
        } catch (Exception $e){
            return Redirect::back()->withErrors('error', $e->getMessage());
        }
    }

    public function delete($name){
        try{
            $role = Role::findByName($name)->delete();
            return redirect()->route('rbac.peran.index')->with('success', 'Role Berhasil di hapus.');
        } catch(Exception $e) {
            return redirect()->back()->withErrors('error', $e->getMessage());
        }
    }
}
