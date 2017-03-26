<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
	/**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 3;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proposals';

    protected $fillable = ['title', 'content', 'action_id'];

    public function comments(){

        return $this->hasMany(Comment::class);
    }
}
