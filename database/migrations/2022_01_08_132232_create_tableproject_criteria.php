<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableprojectCriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_criteria', function (Blueprint $table) {
            $table->id();
            $table->float('revenue', 8, 2);
            $table->float('benefit_cost_ratio', 8, 2);
            $table->float('budget', 8, 2);
            $table->float('resources', 8, 2);
            $table->float('project_risk', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_criteria');
    }
}
