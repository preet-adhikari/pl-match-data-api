<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->foreign("match_id")->references("id")->on("match_results")->onDelete("cascade");
            $table->unsignedInteger('attendance');
            $table->string("referee");
            $table->unsignedInteger("home_team_shots");
            $table->unsignedInteger("away_team_shots");
            $table->unsignedInteger("home_team_shots_on_target");
            $table->unsignedInteger("away_team_shots_on_target");
            $table->unsignedInteger("home_team_hit_woodwork");
            $table->unsignedInteger("away_team_hit_woodwork");
            $table->unsignedInteger("home_team_corners");
            $table->unsignedInteger("away_team_corners");
            $table->unsignedInteger("home_team_fouls_committed");
            $table->unsignedInteger("away_team_fouls_committed");
            $table->unsignedInteger("home_team_offsides");
            $table->unsignedInteger("away_team_offsides");
            $table->unsignedInteger("home_team_yellow_cards");
            $table->unsignedInteger("away_team_yellow_cards");
            $table->unsignedInteger("home_team_red_cards");
            $table->unsignedInteger("away_team_red_cards");
            $table->unsignedInteger("home_team_bookings_points");
            $table->unsignedInteger("away_team_bookings_points");
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
        Schema::table("match_statistics", function(Blueprint $table){
            $table->dropForeign("match_statistics_match_id_foreign");
            $table->dropColumn("match_id");
        });
        Schema::dropIfExists('match_statistics');
    }
}
