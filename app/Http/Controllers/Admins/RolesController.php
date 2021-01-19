<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;

class RolesController extends Controller
{
    public function index_roles(){
        $roles = Role::get();
        return view('admins.users.roles.index_role',compact('roles'));
    }

    public function create_roles(){
        return view('admins.users.roles.create_role');
    }

    public function create_roles_store(Request $req){
        $roles = $req->validate([
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);
        $roles = Role::create($req->all());
        return redirect()->route('index_roles');
    }

    public function update_roles($id){
        $roles = Role::findOrFail($id);
        return view('admins.users.roles.update_role',compact('roles'));
    }

    public function update_roles_store(Request $req, $id){
        $roles = Role::findOrFail($id);
        $req->validate([
            'name' => 'required',
            'display_name' => 'required',
            'description' => 'required',
        ]);
        $roles->update([
            'name' => $req->name,
            'display_name' => $req->display_name,
            'description' => $req->description,
        ]);
        return redirect()->route('index_roles');
    }

    public function delete_roles($id){
        $roles = Role::findOrFail($id)->delete();
        return redirect()->back();
    }
}
