<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class Role extends Model
{
    public $timestamps = false;

    /**
     * Get all users with this role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
