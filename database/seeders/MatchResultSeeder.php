<?php

namespace Database\Seeders;

use App\Imports\MatchResultImport;
use App\Models\MatchResult;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class MatchResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate before seeding
        MatchResult::on()->truncate();

        Excel::import(new MatchResultImport , storage_path('app/public/import files/combinedPlData.csv'));
    }
}
