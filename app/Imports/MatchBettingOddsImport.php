<?php

namespace App\Imports;

use App\Models\MatchBettingOdd;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class MatchBettingOddsImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MatchBettingOdd([
            // Because the index is same in the csv file
            'match_id' => $row[0],
            'bet365_home_win_odds' => $row['B365H'],
            'bet365_draw_odds' => $row['B365H'],
            'bet365_away_win_odds' => $row['B365A'],
            'blue_square_home_win_odds' => $row['BSH'],
            'blue_square_draw_odds' => $row['BSD'],
            'blue_square_away_win_odds' => $row['BSA'],
            'bet_&_win_home_win_odds' => $row['BWH'],
            'bet_&_win_draw_odds' => $row['BWD'],
            'bet_&_win_away_win_odds' => $row['BWA'],
            'gamebookers_home_win_odds' => $row['GBH'],
            'gamebookers_draw_odds' => $row['GBD'],
            'gamebookers_away_win_odds' => $row['GBA'],
            'interwetten_home_win_odds' => $row['IWH'],
            'interwetten_draw_odds' => $row['IWD'],
            'interwetten_away_win_odds' => $row['IWA'],
            'ladbrokes_home_win_odds' => $row['LBH'],
            'ladbrokes_draw_odds' => $row['LBD'],
            'ladbrokes_away_win_odds' => $row['LBA'],
            'pinnacle_sports_home_win_odds' => $row['PSH'],
            'pinnacle_sports_draw_odds' => $row['PSD'],
            'pinnacle_sports_away_win_odds' => $row['PSA'],
            'sportingbet_home_win_odds' => $row['SBH'],
            'sportingbet_draw_odds' => $row['SBD'],
            'sportingbet_away_win_odds' => $row['SBA'],
            'stan_james_home_win_odds' => $row['SJH'],
            'stan_james_draw_odds' => $row['SJD'],
            'stan_james_away_win_odds' => $row['SJA'],
            'vc_bet_home_win_odds' => $row['VCH'],
            'vc_bet_draw_odds' => $row['VCD'],
            'vc_bet_away_win_odds' => $row['VCA'],
            'william_hill_home_win_odds' => $row['WHH'],
            'william_hill_draw_odds' => $row['WHD'],
            'william_hill_away_win_odds' => $row['WHA'],
            'number_of_betbrain_bookmakers_to_calculate_odds' => $row['Bb1X2'],
            'betbrain_maximum_home_win_odds' => $row['BbMxH'],
            'betbrain_average_home_win_odds' => $row['BbAvH'],
            'betbrain_maximum_draw_odds' => $row['BbMxD'],
            'betbrain_average_draw_win_odds' => $row['BbAvD'],
            'betbrain_maximum_away_win_odds' => $row['BbMxA'],
            'betbrain_average_away_win_odds' => $row['BbAvA'],
        ]);
    }

    // Specify chunksize and batchsize
    public function chunkSize(): int
    {
        return 500;
    }

    public function batchSize(): int
    {
        return 250;
    }
}
