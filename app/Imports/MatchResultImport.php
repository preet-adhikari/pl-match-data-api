<?php

namespace App\Imports;

use App\Models\MatchResult;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;


HeadingRowFormatter::default('none');

class MatchResultImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MatchResult([
            'division' => $row['Div'],
            'date' => $row['PlDates'],
            'home_team' => $row['HomeTeam'],
            'away_team' => $row['AwayTeam'],
            'full_time_home_team_goals' => $row['FTHG'],
            'full_time_away_team_goals' => $row['FTAG'],
            'full_time_result' => $row['FTR'],
            'half_time_home_team_goals' => $row['HTHG'],
            'half_time_away_team_goals' => $row['HTAG'],
            'half_time_result' => $row['HTR'],
            'season' => $row['Season']
        ]);
    }

    //Using batch inserts to chunk the import data and import in batches
    public function batchSize(): int
    {
        return 500;
    }

    //Using chunks to load the optimal amount of data in the memory so that the PHP script doesn't throw an error.

    public function chunkSize(): int
    {
        return 1000;
    }

    
}
