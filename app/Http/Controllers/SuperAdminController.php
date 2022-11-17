<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuperAdminController extends Controller
{
    public function index()
    {
        $super_admins = DB::table('super_admins')->get();

        return view('super_admin.super_admin', ['super_admins' => $super_admins]);
    }

    public function create()
    {
        return view('super_admin.super_admin-create');
    }

    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        DB::table('super_admins')->insert(
            ['email' => $email, 'password' => $password]
        );
        return redirect('super_admin');
    }

    public function destroy($id)
    {
        DB::table('super_admins')->where('id', '=', $id)->delete();
        return redirect('super_admin');
    }

    public function edit($id)
    {
       $super_admin = DB::table('super_admins')->where('id', '=', $id)->get()[0];
        return view('super_admin.super_admin-edit', ['super_admin' => $super_admin]);
    }

    public function update(Request $request, $id)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $affected = DB::table('super_admins')
              ->where('id', $id)
              ->update(['email' => $email,'password' => $password]);
              return redirect('super_admin');
    }
}
