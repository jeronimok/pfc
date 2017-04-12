<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function action(){
    	return $this->belongsTo(Action::class);
    }
}
