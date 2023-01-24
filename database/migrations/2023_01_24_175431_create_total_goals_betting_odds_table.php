<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalGoalsBettingOddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_goals_betting_odds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->foreign("match_id")->references("id")->on("match_results")->onDelete("cascade");
            $table->unsignedInteger('number_of_betbrain_bookmakers_calculate_total_goals')->nullable();
            $table->decimal("betbrain_max_over_2_5_goals")->nullable(); // maximum over 2.5 goals
            $table->decimal("betbrain_avg_over_2_5_goals")->nullable(); //average over 2.5 goals
            $table->decimal("betbrain_max_under_2_5_goals")->nullable();
            $table->decimal("betbrain_avg_under_2_5_goals")->nullable();
            $table->decimal("gamebookers_over_2_5_goals")->nullable();
            $table->decimal("gamebookers_under_2_5_goals")->nullable();
            $table->decimal("bet365_over_2_5_goals")->nullable();
            $table->decimal("bet365_under_2_5_goals")->nullable();
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
        Schema::table('total_goals_betting_odds', function (Blueprint $table) {
            $table->dropForeign('total_goals_betting_odds_match_id_foreign');
            $table->dropColumn('match_id');
        });
        
        Schema::dropIfExists('total_goals_betting_odds');
    }
}
