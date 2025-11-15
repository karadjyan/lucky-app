<?php

namespace App\User\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'phone',
    ];

    public function links(): HasMany
    {
        return $this->hasMany(UserLink::class, 'user_id', 'id');
    }
}
