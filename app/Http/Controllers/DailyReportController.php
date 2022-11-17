<?php

namespace App\Http\Controllers;

use App\Models\DailyReport;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailyReportController extends Controller
{
    public function index($id)
    {
        $project = Project::find($id);

        return view('daily_report.index', ['project' => $project]);
    }
    public function create($id)
    {
        $project = Project::find($id);
        $users = DB::table('users')->get();
        return view('daily_report.daily_report-create', ['users' => $users, 'project' => $project]);
    }

    public function store(Request $request)
    {
        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        $desc_report = $request->input('desc_report');
        DB::table('daily_reports')->insert(
            ['project_id' => $project_id, 'user_id' => $user_id, 'desc_report' => $desc_report]
        );
        return redirect('project/'.$project_id.'/daily_report');
    }

    public function destroy($id)
    {
        DB::table('daily_reports')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function edit($id, $daily_report_id)
    {
       $daily_report = DailyReport::find($daily_report_id);
       $project = Project::find($id);
       $users = DB::table('users')->get();
        return view('daily_report.daily_report-edit', ['daily_report' => $daily_report, 'users' => $users, 'project' => $project]);
    }

    public function update(Request $request, $id)
    {
        $project_id = $request->input('project_id');
        $user_id = $request->input('user_id');
        $desc_report = $request->input('desc_report');
        $affected = DB::table('daily_reports')
              ->where('id', $id)
              ->update(['project_id' => $project_id, 'user_id' => $user_id, 'desc_report' => $desc_report]);
              return redirect('project/'.$project_id.'/daily_report');
    }
}
