<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'video_url'
    ];

    /* ================= RELATIONS ================= */

    // Video bisa direquest banyak user
    public function requests(): HasMany
    {
        return $this->hasMany(VideoRequest::class);
    }

    // Video bisa punya banyak izin
    public function permissions(): HasMany
    {
        return $this->hasMany(VideoPermission::class);
    }
}
