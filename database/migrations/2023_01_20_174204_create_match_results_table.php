<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_results', function (Blueprint $table) {
            $table->id();
            $table->string("division")->default("E0");
            $table->string("home_team");
            $table->string("away_team");
            $table->unsignedInteger("full_time_home_team_goals");
            $table->unsignedInteger("full_time_away_team_goals");
            $table->char("full_time_result", 1);
            $table->unsignedInteger("half_time_home_team_goals");
            $table->unsignedInteger("half_time_away_team_goals");
            $table->char("half_time_result" , 1);
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
        Schema::dropIfExists('match_results');
    }
}
