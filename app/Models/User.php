<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];
    /* ================= RELATIONS ================= */

    // User punya banyak request video
    public function videoRequests(): HasMany
    {
        return $this->hasMany(VideoRequest::class);
    }

    // User punya banyak izin video
    public function videoPermissions(): HasMany
    {
        return $this->hasMany(VideoPermission::class);
    }
}
