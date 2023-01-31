<?php

namespace App\Imports;

use App\Models\TotalGoalsBettingOdd;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');
class TotalGoalsBettingOddsImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new TotalGoalsBettingOdd([
            'match_id' => $row[0],
            'number_of_betbrain_bookmakers_calculate_total_goals' => $row['BbOU'],
            'betbrain_max_over_2_5_goals' => $row['BbMx.2.5'], // >2.5
            'betbrain_avg_over_2_5_goals' => $row['BbAv.2.5.1'], // <2.5
            'betbrain_max_under_2_5_goals' => $row['BbMx.2.5'], // >2.5
            'betbrain_avg_under_2_5_goals' => $row['BbAv.2.5.1'], //<2.5
            // 'gamebookers_over_2_5_goals' => $row['GB.2.5'], //>2.5
            // 'gamebookers_under_2_5_goals' => $row['GB.2.5.1'], //<2.5
            'bet365_over_2_5_goals' => $row['B365.2.5'], //>2.5
            'bet365_under_2_5_goals' => $row['B365.2.5.1'] //<2.5
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
