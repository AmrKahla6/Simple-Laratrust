<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function index_permissions(){

        return view('admins.users.permissions.index_permission');
    }

    public function create_permissions(){

        return view('admins.users.permissions.create');
    }


    public function update_permissions(){

        return view('admins.users.permissions.update');
    }



    // Controller as example
    public function category(){

        return view('admins.categories.index');
    }

    public function client(){

        return view('admins.clients.index');
    }

    public function order(){

        return view('admins.orders.index');
    }

    public function product(){

        return view('admins.products.index');
    }
}
