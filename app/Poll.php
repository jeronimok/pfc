<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    public function options(){

        return $this->hasMany(Option::class);
    }

    public function action(){
    	return $this->belongsTo(Action::class);
    }
}
