<?php

namespace Database\Seeders;

use App\Imports\AsianHandicapBettingOddsImport;
use App\Models\AsianHandicapBettingOdd;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class AsianHandicapBettingOddsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AsianHandicapBettingOdd::on()->truncate();

        // Import the data
        Excel::import(new AsianHandicapBettingOddsImport , storage_path('app/public/import files/combinedPlData.csv'));
    }
}
