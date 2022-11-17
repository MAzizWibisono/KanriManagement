<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('user.index', ['users' => $users]);
    }

    public function create()
    {
        return view('user.user-create');
    }

    public function store(Request $request)
    {
        $namalengkap = $request->input('nama_lengkap');
        $email = $request->input('email');
        $mandays = $request->input('mandays');
        $password = $request->input('password');
        DB::table('users')->insert(
            ['nama_lengkap' => $namalengkap, 'email' => $email, 'mandays' => $mandays, 'password' => $password]
        );
        return redirect('user');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect('user');
    }

    public function edit($id)
    {
       $user = DB::table('users')->where('id', '=', $id)->get()[0];
        return view('user.user-edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $namalengkap = $request->input('nama_lengkap');
        $email = $request->input('email');
        $mandays = $request->input('mandays');
        $password = $request->input('password');
        $affected = DB::table('users')
              ->where('id', $id)
              ->update(['nama_lengkap' => $namalengkap, 'email' => $email, 'mandays' => $mandays, 'password' => $password]);
              return redirect('user');
    }
}
