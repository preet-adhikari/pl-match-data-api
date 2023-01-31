<?php

namespace Database\Seeders;

use App\Imports\TotalGoalsBettingOddsImport;
use App\Models\TotalGoalsBettingOdd;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class TotalGoalsBettingOddsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TotalGoalsBettingOdd::on()->truncate();

        // Import the data
        Excel::import(new TotalGoalsBettingOddsImport , storage_path('app/public/import files/combinedPlData.csv'));
        
    }
}
