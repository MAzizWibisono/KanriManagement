<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use PhpParser\Node\Stmt\Foreach_;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $bubble_chart = [];
        $xmax = 0;
        $ymax = 0;
        foreach ($projects as $key => $value) {
            array_push($bubble_chart, ['name'=> $value->project_name, 'data'=>[[(float) $value->mandays, Carbon::parse($value->start_at)->diffInMonths(Carbon::parse($value->finish_at)),(float) $value->estimated_budget]] ]);
            if(($xmax+100)<=$value->mandays){
                $xmax=$value->mandays+100;
            }
            if(($ymax+2)<= Carbon::parse($value->start_at)->diffInMonths(Carbon::parse($value->finish_at))){
                $ymax= Carbon::parse($value->start_at)->diffInMonths(Carbon::parse($value->finish_at))+2;
            }
        }
        // return $bubble_chart;
        return view('home', ['bubble_chart'=>collect($bubble_chart)->toJson(), 'xmax'=>$xmax, 'ymax'=>$ymax]);
    }
}
