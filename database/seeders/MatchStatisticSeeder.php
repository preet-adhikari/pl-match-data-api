<?php

namespace Database\Seeders;

use App\Imports\MatchStatisticsImport;
use App\Models\MatchStatistic;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;


class MatchStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate data first
        MatchStatistic::on()->truncate();

        // Import the data
        Excel::import(new MatchStatisticsImport , storage_path('app/public/import files/combinedPlData.csv'));

    }
}
