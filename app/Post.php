<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //protected $connection = 'pgsql';

    //protected $table = 'posts';

    //protected $primaryKey = 'id';

    //protected $incrementing = 'false';

    protected $fillable = ['title', 'body', 'publish_at',  'user_id'];

    protected $dates = ['publish_at'];

    //protected $guarded = ['user_id'];

    //public $timestamps = false;
}
