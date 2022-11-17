<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectCriteriaController extends Controller
{
    public function index()
    {
        $project_criterias = DB::table('project_criteria')->get();

        return view('project_criteria.index', ['project_criterias' => $project_criterias]);
    }

    public function create()
    {
        return view('project_criteria.project_criteria-create');
    }

    public function store(Request $request)
    {
        $revenue = $request->input('revenue');
        $benefit_cost_ratio = $request->input('benefit_cost_ratio');
        $budget = $request->input('budget');
        $resources = $request->input('resources');
        $project_risk = $request->input('project_risk');
        DB::table('project_criteria')->insert(
            ['revenue' => $revenue, 'benefit_cost_ratio' => $benefit_cost_ratio, 'budget' => $budget, 'resources' => $resources, 'project_risk' => $project_risk ]
        );
        return redirect('project_criteria');
    }

    public function destroy($id)
    {
        DB::table('project_criteria')->where('id', '=', $id)->delete();
        return redirect('project_criteria');
    }

    public function edit($id)
    {
       $project_criteria = DB::table('project_criteria')->where('id', '=', $id)->get()[0];
        return view('project_criteria.project_criteria-edit', ['project_criteria' => $project_criteria]);
    }

    public function update(Request $request, $id)
    {
        $revenue = $request->input('revenue');
        $benefit_cost_ratio = $request->input('benefit_cost_ratio');
        $budget = $request->input('budget');
        $resources = $request->input('resources');
        $project_risk = $request->input('project_risk');
        $affected = DB::table('project_criteria')
              ->where('id', $id)
              ->update(['revenue' => $revenue, 'benefit_cost_ratio' => $benefit_cost_ratio, 'budget' => $budget, 'resources' => $resources, 'project_risk' => $project_risk]);
              return redirect('project_criteria');
    }
}
