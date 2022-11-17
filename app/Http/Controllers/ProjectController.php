<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {
        $orderBy=request()->filled('orderBy')?request()->orderBy:"id";
        $projects = Project::leftJoin('ranks', 'ranks.project_id', '=', 'projects.id')->orderBy($orderBy, "DESC")->get();
        $project_criterias = DB::table('project_criteria')->get();
        return view('project.index', ['projects' => $projects, 'project_criterias'=>$project_criterias]);
    }
    public function create()
    {
        $programs = Program::get();
        $project_managers = DB::table('project_managers')->get();
        return view('project.project-create', ['programs' => $programs, 'project_managers' => $project_managers]);

    }

    public function store(Request $request)
    {
        $program_id = $request->input('program_id');
        $project_manager_id = $request->input('project_manager_id');
        $project_name = $request->input('project_name');
        $project_desc = $request->input('project_desc');
        $start_at = $request->input('start_at');
        $finish_at = $request->input('finish_at');
        $estimated_budget = $request->input('estimated_budget');
        $mandays = $request->input('mandays');
        $rating_revenue = $request->input('rating_revenue');
        $rating_benefit_cost_ratio = $request->input('rating_benefit_cost_ratio');
        $rating_budget = $request->input('rating_budget');
        $rating_resources = $request->input('rating_resources');
        $rating_project_risk = $request->input('rating_project_risk');
        // $new_revenue = $request->input('new_revenue');
        // $add_on_revenue = $request->input('add_on_revenue');
        // $component_benefit_matrix_revenue = $request->input('component_benefit_matrix_revenue');
        // $component_benefit_matrix_new_revenue = $request->input('component_benefit_matrix_new_revenue');
        // $component_benefit_matrix_add_on_revenue = $request->input('component_benefit_matrix_add_on_revenue');

        DB::table('projects')->insert(
            ['program_id' => $program_id,
             'project_manager_id' => $project_manager_id,
             'project_name' => $project_name,
             'project_desc' => $project_desc,
             'start_at' => $start_at,
             'finish_at' => $finish_at,
             'estimated_budget' => $estimated_budget,
             'mandays' => $mandays,
             'rating_revenue' => $rating_revenue,
             'rating_benefit_cost_ratio' => $rating_benefit_cost_ratio,
             'rating_budget' => $rating_budget,
             'rating_resources' => $rating_resources,
             'rating_project_risk' => $rating_project_risk,
            //  'new_revenue' => $new_revenue,
            //  'add_on_revenue' => $add_on_revenue,
            //  'component_benefit_matrix_revenue' => $component_benefit_matrix_revenue,
            //  'component_benefit_matrix_new_revenue' => $component_benefit_matrix_new_revenue,
            //  'component_benefit_matrix_add_on_revenue' => $component_benefit_matrix_add_on_revenue
             ]
        );
        return redirect('project');
    }

    public function destroy($id)
    {
        DB::table('projects')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $programs = Program::get();
        $project = Project::find($id);
        $project_managers = DB::table('project_managers')->get();
        return view('project.project-edit', ['programs' => $programs, 'project_managers' => $project_managers, 'project' => $project]);
    }
    public function update(Request $request, $id)
    {
        $program_id = $request->input('program_id');
        $project_manager_id = $request->input('project_manager_id');
        $project_name = $request->input('project_name');
        $project_desc = $request->input('project_desc');
        $start_at = $request->input('start_at');
        $finish_at = $request->input('finish_at');
        $estimated_budget = $request->input('estimated_budget');
        $mandays = $request->input('mandays');
        $rating_revenue = $request->input('rating_revenue');
        $rating_benefit_cost_ratio = $request->input('rating_benefit_cost_ratio');
        $rating_budget = $request->input('rating_budget');
        $rating_resources = $request->input('rating_resources');
        $rating_project_risk = $request->input('rating_project_risk');
        // $new_revenue = $request->input('new_revenue');
        // $add_on_revenue = $request->input('add_on_revenue');
        // $component_benefit_matrix_revenue = $request->input('component_benefit_matrix_revenue');
        // $component_benefit_matrix_new_revenue = $request->input('component_benefit_matrix_new_revenue');
        // $component_benefit_matrix_add_on_revenue = $request->input('component_benefit_matrix_add_on_revenue');
        $affected = DB::table('projects')
              ->where('id', $id)
              ->update(['program_id' => $program_id,
               'project_manager_id' => $project_manager_id,
                'project_name' => $project_name,
                'project_desc' => $project_desc,
                'start_at' => $start_at,
                'finish_at' => $finish_at,
                'estimated_budget' => $estimated_budget,
                'mandays' => $mandays,
                'rating_revenue' => $rating_revenue,
                'rating_benefit_cost_ratio' => $rating_benefit_cost_ratio,
                'rating_budget' => $rating_budget,
                'rating_resources' => $rating_resources,
                'rating_project_risk' => $rating_project_risk,
                // 'new_revenue' => $new_revenue,
                // 'add_on_revenue' => $add_on_revenue,
                // 'component_benefit_matrix_revenue' => $component_benefit_matrix_revenue,
                // 'component_benefit_matrix_new_revenue' => $component_benefit_matrix_new_revenue,
                // 'component_benefit_matrix_add_on_revenue' => $component_benefit_matrix_add_on_revenue
               ]);

               return redirect('project');
     }
}
