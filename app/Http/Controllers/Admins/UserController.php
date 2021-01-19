<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware(['permission:users_read'])->only('index');

      $this->middleware(['permission:users_create'])->only('create');

      $this->middleware(['permission:users_update'])->only('edit');

      $this->middleware(['permission:users_delete'])->only('destroy');

    }//end of construct


    public function index_user(){
        $users = User::whereRoleIs('admin')->get();
        return view('admins.users.index_user',compact('users'));
    }

    public function create_user(){
        return view('admins.users.create_user');
    }

    public function create_user_store(Request $request){
        // dd($req->all());
         $request->validate([
            'name'        => 'required',
            'email'       => 'required|unique:users',
            'password'    => 'required',
            'permissions' => 'required|min:1', // store permissions
        ]);
        // $user = User::create([
        //     'name' => $req->name,
        //     'email' => $req->email,
        //     'password' => bcrypt($req->password),
        // ]);
        // return redirect()->route('index_user');

        /**
         * to store permission
         * store all data except permission & password to hash
         * then user take attachRole() function (admin) we have only two attachRole super_admin(دا اللي بيدي الصلاحيات اصلا)
         * and admin(اي يوزر بتعمليله ادد هو ادمن انتي بس اللي سوبر ادمن)
         */
        $request_data = $request->except(['password', 'permissions']);
        $request_data['password'] = bcrypt($request->password);
        $user = User::create($request_data);
        $user->attachRole('admin');
        // return $request->permissions;
        $user->syncPermissions($request->permissions);
        return redirect()->route('index_user');
    }


    //Edit user
    public function update_user($id){
        $users = User::findOrFail($id);
        return view('admins.users.update_users',compact('users'));
    }


    //Stor user
    public function update_user_store(Request $request, $id){
         $request->validate([
            'name'        => 'required',
            'email'       => ['required'], // email is unique
            'permissions' => 'required|min:1'
        ]);

        // $users->update([
        //     'name' => $req->name,
        //     'email' => $req->email,
        //     'password' => bcrypt($req->password),
        // ]);
        // return redirect()->route('index_user');
        $user  = User::findOrFail($id);
        $request_data = $request->except(['permissions']);

        $user->update($request_data);
        $user->syncPermissions($request->permissions);
        return redirect()->route('index_user');
    }

    public function delete_user($id){
        $users = User::findOrFail($id)->delete();
        return redirect()->back();
    }
}
