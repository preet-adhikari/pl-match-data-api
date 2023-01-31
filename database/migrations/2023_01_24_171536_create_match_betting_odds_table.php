<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchBettingOddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_betting_odds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->foreign("match_id")->references("id")->on("match_results")->onDelete("cascade");
            $table->decimal("bet365_home_win_odds")->nullable();
            $table->decimal("bet365_draw_odds")->nullable();
            $table->decimal("bet365_away_win_odds")->nullable();
            $table->decimal("blue_square_home_win_odds")->nullable();
            $table->decimal("blue_square_draw_odds")->nullable();
            $table->decimal("blue_square_away_win_odds")->nullable();
            $table->decimal("bet_&_win_home_win_odds")->nullable();
            $table->decimal("bet_&_win_draw_odds")->nullable();
            $table->decimal("bet_&_win_away_win_odds")->nullable();
            $table->decimal("gamebookers_home_win_odds")->nullable();
            $table->decimal("gamebookers_draw_odds")->nullable();
            $table->decimal("gamebookers_away_win_odds")->nullable();
            $table->decimal("interwetten_home_win_odds")->nullable();
            $table->decimal("interwetten_draw_odds")->nullable();
            $table->decimal("interwetten_away_win_odds")->nullable();
            $table->decimal("ladbrokes_home_win_odds")->nullable();
            $table->decimal("ladbrokes_draw_odds")->nullable();
            $table->decimal("ladbrokes_away_win_odds")->nullable();
            $table->decimal("pinnacle_sports_home_win_odds")->nullable();
            $table->decimal("pinnacle_sports_draw_odds")->nullable();
            $table->decimal("pinnacle_sports_away_win_odds")->nullable();
            // $table->decimal("sporting_odds_home_win_odds")->nullable();
            // $table->decimal("sporting_odds_draw_odds")->nullable();
            // $table->decimal("sporting_odds_away_win_odds")->nullable();
            $table->decimal("sportingbet_home_win_odds")->nullable();
            $table->decimal("sportingbet_draw_odds")->nullable();
            $table->decimal("sportingbet_away_win_odds")->nullable();
            $table->decimal("stan_james_home_win_odds")->nullable();
            $table->decimal("stan_james_draw_odds")->nullable();
            $table->decimal("stan_james_away_win_odds")->nullable();
            $table->decimal("stanleybet_home_win_odds")->nullable();
            $table->decimal("stanleybet_draw_odds")->nullable();
            $table->decimal("stanleybet_away_win_odds")->nullable();
            $table->decimal("vc_bet_home_win_odds")->nullable();
            $table->decimal("vc_bet_draw_odds")->nullable();
            $table->decimal("vc_bet_away_win_odds")->nullable();
            $table->decimal("william_hill_home_win_odds")->nullable();
            $table->decimal("william_hill_draw_odds")->nullable();
            $table->decimal("william_hill_away_win_odds")->nullable();
            $table->unsignedInteger("number_of_betbrain_bookmakers_to_calculate_odds")->nullable();
            $table->decimal("betbrain_maximum_home_win_odds")->nullable();
            $table->decimal("betbrain_average_home_win_odds")->nullable();
            $table->decimal("betbrain_maximum_draw_odds")->nullable();
            $table->decimal("betbrain_average_draw_win_odds")->nullable();
            $table->decimal("betbrain_maximum_away_win_odds")->nullable();
            $table->decimal("betbrain_average_away_win_odds")->nullable();    
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
        Schema::table("match_betting_odds", function(Blueprint $table){
            $table->dropForeign("match_betting_odds_match_id_foreign");
            $table->dropColumn("match_id");
        });
        Schema::dropIfExists('match_betting_odds');
    }
}
