<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
    use SoftDeletes;

    //protected $connection = 'pgsql';

    //protected $table = 'posts';

    //protected $primaryKey = 'id';

    //protected $incrementing = 'false';

    protected $fillable = ['title', 'body', 'publish_at',  'user_id'];

    protected $dates = ['publish_at', 'deleted_at'];

    //protected $guarded = ['user_id'];

    //public $timestamps = false;

   /* public function __get($property)
    {
        return  'esta es una propiedad que no existe ' . $property;
    }*/

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    /*protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('publish', function (Builder $builder) {
            $builder->whereNotNull('publish_at');
        });
    }*/

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('publish_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
