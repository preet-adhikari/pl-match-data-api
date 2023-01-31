<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchStatistic extends Model
{
    use HasFactory;

    // protected $fillable = ['home_team_shots', 'away_team_shots' , 'home_team_shots_on_target' , 'away_team_shots_on_target', 'home_team_hit_woodwork' , 'away_team_hit_woodwork' , 'home_team_corners', 'away_team_corners', 'home_team_fouls_committed' , 'away_team_fouls_committed' , 'home_team_offsides', 'away_team_offsides', 'home_team_yellow_cards' , 'away_team_yellow_cards', 'home_team_red_cards', 'away_team_red_cards'];

    // //Using mutator to convert the "NA" in the csv file to a null value. Since there are a lot of fields, overriding is the better option.
    // //Override __set() function
    // public function __set($key, $value)
    // {
    //     // if(in_array($key, ['home_team_shots', 'away_team_shots' , 'home_team_shots_on_target' , 'away_team_shots_on_target', 'home_team_hit_woodwork' , 'away_team_hit_woodwork' , 'home_team_corners', 'away_team_corners', 'home_team_fouls_committed' , 'away_team_fouls_committed' , 'home_team_offsides', 'away_team_offsides', 'home_team_yellow_cards' , 'away_team_yellow_cards', 'home_team_red_cards', 'away_team_red_cards']))
    //     if(array_key_exists($key , $this->fillable))
    //     {
    //         dd("Hello");
    //         // $this->attributes[$key] = $value == "NA" ? null : $value;
    //         if($value == "NA"){
    //             $this->attributes[$key] = null;
    //         } 
    //     } else{
    //         //Default
    //         $this->setAttribute($key , $value);
    //     }
    // }
}
