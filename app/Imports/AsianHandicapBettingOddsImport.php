<?php

namespace App\Imports;

use App\Models\AsianHandicapBettingOdd;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class AsianHandicapBettingOddsImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AsianHandicapBettingOdd([
            'match_id' => $row[0],
            'number_of_betbrain_bookmakers_asian_handicap' => $row['BbAH'],
            'betbrain_size_handicap_home' => $row['BbAHh'],
            'betbrain_max_asian_handicap_home_odds' => $row['BbMxAHH'],
            'betbrain_avg_asian_handicap_home_odds' => $row['BbAvAHH'],
            'betbrain_max_asian_handicap_away_odds' => $row['BbMxAHA'],
            'betbrain_avg_asian_handicap_away_odds' => $row['BbAvAHA'],
            // 'gamebookers_asian_handicap_home_odds' => $row['GBAHH'],
            // 'gamebookers_asian_handicap_away_odds' => $row['GBAHA'],
            // 'gamebookers_size_handicap_home_odds' => $row['GBAH'],
            // 'ladbrokes_asian_handicap_home_odds' => $row['LBAHH'],
            // 'ladbrokes_asian_handicap_away_odds' => $row['LBAHA'],
            // 'ladbrokes_size_handicap_home_odds' => $row['LBAH'],
            'bet365_asian_handicap_home_odds' => $row['B365AHH'],
            'bet365_asian_handicap_away_odds' => $row['B365AHA'],
            // 'bet365_size_handicap_home_odds' => $row['B365AH']        
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 500;
    }
}
