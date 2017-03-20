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
    protected $perPage = 5;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proposals';
}
