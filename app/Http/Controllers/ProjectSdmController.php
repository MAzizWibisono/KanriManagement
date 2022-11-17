<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectSdm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectSdmController extends Controller
{
    public function index($id)
    {
        $project = Project::find($id);

        return view('project_sdm.index', ['project' => $project]);
    }
    public function create($id)
    {
        $project = Project::find($id);
        $users = DB::table('users')->get();
        return view('project_sdm.project_sdm-create', ['users' => $users, 'project' => $project]);
    }

    public function store(Request $request)
    {
        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        DB::table('project_sdms')->insert(
            ['project_id' => $project_id, 'user_id' => $user_id]
        );
        return redirect('project/'.$project_id);
    }

    public function destroy($id)
    {
        DB::table('project_sdms')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
       $project_sdm = DB::table('project_sdms')->where('id', '=', $id)->get()[0];
        return view('project_sdm.project_sdm-edit', ['project_sdm' => $project_sdm]);
    }

    public function update(Request $request, $id)
    {
        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        $affected = DB::table('project_sdms')
              ->where('id', $id)
              ->update(['project_id' => $project_id, 'user_id' => $user_id]);
              return redirect('project_sdm');
    }
}
