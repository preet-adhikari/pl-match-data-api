<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsianHandicapBettingOddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asian_handicap_betting_odds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->foreign("match_id")->references("id")->on("match_results")->onDelete("cascade");
            $table->unsignedInteger('number_of_betbrain_bookmakers_asian_handicap')->nullable(); // Number of BetBrain bookmakers used to Asian handicap averages and maximums
            $table->decimal("betbrain_size_handicap_home")->nullable(); // Betbrain size of handicap (home team)
            $table->decimal("betbrain_max_asian_handicap_home_odds")->nullable(); // Betbrain maximum Asian handicap home team odds
            $table->decimal("betbrain_avg_asian_handicap_home_odds")->nullable();
            $table->decimal("betbrain_max_asian_handicap_away_odds")->nullable();
            $table->decimal("betbrain_avg_asian_handicap_away_odds")->nullable();

            $table->decimal("gamebookers_asian_handicap_home_odds")->nullable(); // Gamebookers Asian handicap home team odds
            $table->decimal("gamebookers_asian_handicap_away_odds")->nullable();
            $table->decimal("gamebookers_size_handicap_home_odds")->nullable();

            $table->decimal("ladbrokes_asian_handicap_home_odds")->nullable();
            $table->decimal("ladbrokes_asian_handicap_away_odds")->nullable();
            $table->decimal("ladbrokes_size_handicap_home_odds")->nullable();

            $table->decimal("bet365_asian_handicap_home_odds")->nullable();
            $table->decimal("bet365_asian_handicap_away_odds")->nullable();
            $table->decimal("bet365_size_handicap_home_odds")->nullable();
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
        Schema::table('asian_handicap_betting_odds', function (Blueprint $table) {
            $table->dropForeign('asian_handicap_betting_odds_match_id_foreign');
            $table->dropColumn('match_id');
        });
        Schema::dropIfExists('asian_handicap_betting_odds');
    }
}
