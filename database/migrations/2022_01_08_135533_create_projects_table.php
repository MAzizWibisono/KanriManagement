<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('project_manager_id');
            $table->string('project_name');
            $table->string('project_desc');
            $table->date('start_at');
            $table->date('finish_at');
            $table->double('estimated_budget', 10, 2);
            $table->double('mandays', 10, 2);
            // $table->double('revenue', 10, 2);
            // $table->double('new_revenue', 10, 2);
            // $table->double('add_on_revenue', 10, 2);
            // $table->float('component_benefit_matrix_revenue', 6, 2);
            // $table->float('component_benefit_matrix_new_revenue', 6, 2);
            // $table->float('component_benefit_matrix_add_on_revenue', 6, 2);
            $table->integer('rating_revenue');
            $table->integer('rating_benefit_cost_ratio');
            $table->integer('rating_budget');
            $table->integer('rating_resources');
            $table->integer('rating_project_risk');
            $table->timestamps();


            $table->foreign('program_id')->references('id')->on('programs');
            $table->foreign('project_manager_id')->references('id')->on('project_managers');
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
