<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\Team;
use App\Location;
use App\Game;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getSchedule($selectedDivisionId = 0, $selectedLocationId = 0, $selectedTeamId = 0)
    {
        $divisions = Division::all();
        $teams = Team::all();
        $locations = Location::all();

        $games = Game::orderBy('game_date');
        if ($selectedDivisionId) {
            $games->where('division_id', $selectedDivisionId);
        }
        if ($selectedLocationId) {
            $games->where('location_id', $selectedLocationId);
        }
        if ($selectedTeamId) {
            $games->where(function($q) use ($selectedTeamId) {
                $q->where('home_team_id', $selectedTeamId)
                    ->orWhere('away_team_id', $selectedTeamId);
            });

        }

        $gameData = $games->get();
        $schedule = [];
        foreach ($gameData AS $game) {
            $cleanDate = date('m/d', strtotime($game->game_date));
            $schedule[$cleanDate][] = $game;
        }

        return view('index/schedule', [
            'divisions' => $divisions,
            'teams' => $teams,
            'locations' => $locations,
            'schedule' => $schedule,
            'selectedDivisionId' => $selectedDivisionId,
            'selectedLocationId' => $selectedLocationId,
            'selectedTeamId' => $selectedTeamId,
        ]);        
    }

    public function getStandings()
    {
        $divisions = Division::all();
        $standings = [];
        foreach ($divisions AS $division) {
            $standings[$division->name] = Team::where('division_id', $division->id)->orderBy('wins', 'DESC')->orderBy('name', 'ASC')->get();
        }
        return view('index/standings', [
            'standings' => $standings,
        ]);
    }


}
