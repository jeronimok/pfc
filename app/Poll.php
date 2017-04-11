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

    public function num_votes(){
    	$n = 0;
    	foreach($this->options as $option){
    		$n = $n + count($option->voters);
    	}
    	return $n;
    }
}
