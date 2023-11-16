<?php

namespace App\Http\Controllers;

use App\Models\MatchResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeasonDataController extends Controller
{
    public function getSeasonData($season)
    {
        $data = MatchResult::where('season' , 'LIKE' , $season . '%'  )->get()
        ->map(function ($item) {   // Remove the unneccessary items
            return collect($item)->except(['id' , 'created_at' , 'updated_at']);
        });
        return $data;
    }


    public function getIndividualSeasonData($season)
    {
        $seasonArray = [
            'season' => $season
        ];
        //Validate and convert the data for convenience
        $validator = Validator::make($seasonArray , [
            'season' => 'required|numeric|digits:4'
        ],
        [
            'season.required' => 'The season should not be empty',
            'season.numeric' => 'Please enter a valid numeric year',
            'season.digits' => 'Please enter a year in full(containing 4 digits).'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $data = SeasonDataController::getSeasonData($season);
            return $data;
        }  
    }

    
}
