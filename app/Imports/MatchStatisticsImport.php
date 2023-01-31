<?php

namespace App\Imports;

use App\Models\MatchResult;
use App\Models\MatchStatistic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;



HeadingRowFormatter::default('none');


class MatchStatisticsImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //Setting the foreign key for match id
        
        return new MatchStatistic([
            'match_id' => $row[0],
            'attendance' => $row['Attendance'],
            'referee' => $row['Referee'],
            'home_team_shots' => $row['HS'],
            'away_team_shots' => $row['AS'],
            'home_team_shots_on_target' => $row['HST'],
            'away_team_shots_on_target' => $row['AST'],
            'home_team_hit_woodwork' => $row['HHW'],
            'away_team_hit_woodwork' => $row['AHW'],
            'home_team_corners' => $row['HC'],
            'away_team_corners' => $row['AC'],
            'home_team_fouls_committed' => $row['HF'],
            'away_team_fouls_committed' => $row['AF'],
            'home_team_offsides' => $row['HO'],
            'away_team_offsides' => $row['AO'],
            'home_team_yellow_cards' => $row['HY'],
            'away_team_yellow_cards' => $row['AY'],
            'home_team_red_cards' => $row['HR'],
            'away_team_red_cards' => $row['AR'],
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
