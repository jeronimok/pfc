<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 10;

     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';
}
