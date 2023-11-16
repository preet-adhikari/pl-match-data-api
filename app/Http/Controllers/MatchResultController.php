<?php

namespace App\Http\Controllers;

use App\Models\MatchResult;
use Illuminate\Http\Request;

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
