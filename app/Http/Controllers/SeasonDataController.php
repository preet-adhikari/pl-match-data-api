<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeasonDataController extends Controller
{
    public function getIndividualSeasonData($season)
    {
        $seasonArray = [
            'season' => $season
        ];
        //Validate and convert the data for convenience
        $validator = Validator::make($seasonArray , [
            'season' => 'required|numeric|digits_between:2,4'
        ],
        [
            'season.required' => 'The season should not be empty',
            'season.numeric' => 'Please enter a valid numeric year',
            'season.digits_between' => 'Please enter a year in 2 or 4 digits.'
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $length = strlen((string)$season);
            if($length > 2) {
                dd("You've entered the full year " . $season);
                // Create a function for grabbing the season data and call it here.
            } else {
                dd("You've entered the half year " . $season);
                // Get the correct year and call the function to get the season data.
            }
        }
        
        
    }
}
