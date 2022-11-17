<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = DB::table('programs')->get();

        return view('program.index', ['programs' => $programs]);
    }

    public function create()
    {
        return view('program.program-create');
    }

    public function store(Request $request)
    {
        $program_name = $request->input('program_name');
        $program_funder = $request->input('program_funder');
        $program_owner = $request->input('program_owner');
        DB::table('programs')->insert(
            ['program_name' => $program_name, 'program_funder' => $program_funder, 'program_owner' => $program_owner, 'status' => 'PENDING' ]
        );
        return redirect('program');
    }

    public function destroy($id)
    {
        DB::table('programs')->where('id', '=', $id)->delete();
        return redirect('program');
    }

    public function edit($id)
    {
       $program = DB::table('programs')->where('id', '=', $id)->get()[0];
        return view('program.program-edit', ['program' => $program]);
    }

    public function update(Request $request, $id)
    {
        $program_name = $request->input('program_name');
        $program_funder = $request->input('program_funder');
        $program_owner = $request->input('program_owner');
        $status = $request->input('status');
        DB::table('programs')
              ->where('id', $id)
              ->update(['program_name' => $program_name, 'program_funder' => $program_funder, 'program_owner' => $program_owner, 'status' => $status]);
              return redirect('program');
    }

    public function show($id)
    {
       $program = Program::find($id);
        return view('project.index', ['program' => $program]);
    }
}
