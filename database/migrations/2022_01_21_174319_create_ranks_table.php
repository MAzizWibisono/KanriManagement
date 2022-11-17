<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW ranks AS SELECT id AS project_id,(((pj.rating_revenue*(SELECT revenue/100 FROM project_criteria LIMIT 1))+(pj.rating_benefit_cost_ratio*(SELECT benefit_cost_ratio/100 FROM project_criteria LIMIT 1))+(pj.rating_budget*(SELECT budget/100 FROM project_criteria LIMIT 1))+(pj.rating_resources*(SELECT resources/100 FROM project_criteria LIMIT 1))+(pj.rating_project_risk*(SELECT project_risk/100 FROM project_criteria LIMIT 1)))) AS score FROM `projects` pj ORDER BY ((pj.rating_revenue*(SELECT revenue/100 FROM project_criteria LIMIT 1))+(pj.rating_benefit_cost_ratio*(SELECT benefit_cost_ratio/100 FROM project_criteria LIMIT 1))+(pj.rating_budget*(SELECT budget/100 FROM project_criteria LIMIT 1))+(pj.rating_resources*(SELECT resources/100 FROM project_criteria LIMIT 1))+(pj.rating_project_risk*(SELECT project_risk/100 FROM project_criteria LIMIT 1))) DESC");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
