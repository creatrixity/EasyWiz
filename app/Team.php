<?php

namespace Framework;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'alias', 'artwork'
    ];

    public function user()
    {
        return $this->belongsToMany('Framework\User');
    }
}
