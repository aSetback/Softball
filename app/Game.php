<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function homeTeam() {
        return $this->hasOne('App\Team', 'id', 'home_team_id');
    }
    public function awayTeam() {
        return $this->hasOne('App\Team', 'id', 'away_team_id');
    }
    public function location() {
        return $this->belongsTo('App\Location');
    }
    public function division() {
        return $this->belongsTo('division');
    }

}
