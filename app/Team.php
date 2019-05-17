<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function division() {
        return $this->belongsTo('App\Division');
    }
}
