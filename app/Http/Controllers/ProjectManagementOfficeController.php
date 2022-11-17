<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProjectManagementOfficeController extends Controller
{
    public function index()
    {
        $project_management_offices = DB::table('project_management_offices')->get();

        return view('project_management_office.index', ['project_management_offices' => $project_management_offices]);
    }

    public function create()
    {
        return view('project_management_office.project_management_office-create');
    }

    public function store(Request $request)
    {
        $namalengkap = $request->input('nama_lengkap');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        DB::table('project_management_offices')->insert(
            ['nama_lengkap' => $namalengkap, 'email' => $email, 'password' => $password ]
        );
        return redirect('project_management_office');
    }

    public function destroy($id)
    {
        DB::table('project_management_offices')->where('id', '=', $id)->delete();
        return redirect('project_management_office');
    }

    public function edit($id)
    {
       $project_management_office = DB::table('project_management_offices')->where('id', '=', $id)->get()[0];
        return view('project_management_office.project_management_office-edit', ['project_management_office' => $project_management_office]);
    }

    public function update(Request $request, $id)
    {
        $namalengkap = $request->input('nama_lengkap');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        $affected = DB::table('project_management_offices')
              ->where('id', $id)
              ->update(['nama_lengkap' => $namalengkap, 'email' => $email, 'password' => $password]);
              return redirect('project_management_office');
    }
}
