<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserInfo.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class UserInfo extends Model
{
    public $table = 'user_info';

    protected $guarded = [];

    protected $casts = [
        'helps' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
