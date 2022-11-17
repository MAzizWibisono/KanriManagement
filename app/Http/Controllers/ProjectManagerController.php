<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProjectManagerController extends Controller
{
    public function index()
    {
        $project_managers = DB::table('project_managers')->get();

        return view('project_manager.index', ['project_managers' => $project_managers]);
    }

    public function create()
    {
        return view('project_manager.project_manager-create');
    }

    public function store(Request $request)
    {
        $namalengkap = $request->input('nama_lengkap');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $mandays = $request->input('mandays');

        DB::table('project_managers')->insert(
            ['nama_lengkap' => $namalengkap, 'email' => $email, 'password' => $password, 'mandays' => $mandays]
        );
        return redirect('project_manager');
    }

    public function destroy($id)
    {
        DB::table('project_managers')->where('id', '=', $id)->delete();
        return redirect('project_manager');
    }

    public function edit($id)
    {
       $project_managers = DB::table('project_managers')->where('id', '=', $id)->get()[0];
        return view('project_manager.project_manager-edit', ['project_manager' => $project_managers]);
    }

    public function update(Request $request, $id)
    {
        $namalengkap = $request->input('nama_lengkap');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $mandays = $request->input('mandays');

        $affected = DB::table('project_managers')
              ->where('id', $id)
              ->update(['nama_lengkap' => $namalengkap, 'email' => $email, 'password' => $password, 'mandays' => $mandays]);
              return redirect('project_manager');
    }
}
