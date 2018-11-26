<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    /**
     * @var string
     */
    protected $table = "posts";


    /**
     * @var array
     */
    protected $guarded = [];

}
