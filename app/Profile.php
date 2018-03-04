<?php

namespace Framework;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'competition_id', 'leaderboard_id', 'team_id'
    ];

    public function user()
    {
        return $this->belongsTo('Framework\User');
    }

    public function competition()
    {
        return $this->hasOne('Framework\Competition');
    }

    public function team()
    {
        return $this->hasOne('Framework\Team');
    }

    public function leaderboard()
    {
        return $this->hasOne('Framework\Leaderboard');
    }

}
