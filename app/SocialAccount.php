<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'provider',
        'provider_user_id',
    ];

    /**
     * Add social account specific info to query scope.
     *
     * @param $query
     * @param $providerName
     * @param $providerUserId
     *
     * @return mixed
     */
    public static function scopeFindByProvider($query, $providerName, $providerUserId)
    {
        return $query
            ->where('provider', $providerName)
            ->where('provider_user_id', $providerUserId);
    }

    /**
     * Get related registered user account.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
