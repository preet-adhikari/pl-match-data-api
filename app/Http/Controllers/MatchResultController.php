<?php

namespace App\Http\Controllers;

use App\Models\MatchResult;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatchResultController extends Controller
{
    // Get a list of all the match results for a single team
    public function getAllMatchResultsForIndividualTeam($team)
    {
        // Use a query function
        $data = MatchResult::where(function($query) use ($team) {
            $query->where('home_team' , 'LIKE' , $team . '%')
                  ->orWhere('away_team' , 'LIKE' , $team . '%');
        })->get()
        ->map(function ($item) {   // Remove the unneccessary items
            return collect($item)->except(['id' , 'created_at' , 'updated_at']);
        });
        return $data;
    }
    
    // Get a list of match results for an individual team for a particular season

    public function getIndividualSeasonResultsForATeam(Request $request)
    {
        // Retrieve the data and put it in an array
        //TODO: Refactor this code
        $data = [
            'season' => $request->season,
            'team' => $request->team
        ];


        // Create validation rules 
        $validator = Validator::make($data , [
            'season' => 'required|numeric|digits:4',
            'team' => 'required|string|max:255'
        ],
        [
            'season.required' => 'The season should not be empty',
            'season.numeric' => 'Please enter a valid numeric year',
            'season.digits' => 'Please enter a year in full(containing 4 digits).',
            'team.required' => 'The team should not be empty',
            'team.string' => 'Please enter a valid Premier League Team'
        ]);

        // Test for validation
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $output = MatchResult::where(function($query) use ($request) {
                $query->where('home_team' , 'LIKE' , $request->team . '%')
                      ->orWhere('away_team' , 'LIKE' , $request->team . '%');
            })->where('season' , 'LIKE' , $request->season . '%' )->get()
            ->map(function ($item) {   // Remove the unneccessary items
                return collect($item)->except(['id' , 'created_at' , 'updated_at']);
            });
            return $output;
        }
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function show(MatchResult $matchResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function edit(MatchResult $matchResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatchResult $matchResult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchResult $matchResult)
    {
        //
    }
}
