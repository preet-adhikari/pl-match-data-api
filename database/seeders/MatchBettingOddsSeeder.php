<?php

namespace Database\Seeders;

use App\Imports\MatchBettingOddsImport;
use App\Models\MatchBettingOdd;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class MatchBettingOddsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MatchBettingOdd::on()->truncate();

        // Import the data
        Excel::import(new MatchBettingOddsImport , storage_path('app/public/import files/combinedPlData.csv'));
        
    }
}
