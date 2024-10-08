<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Status extends Model
{
    protected $fillable = [
        'name',
        'display_name',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
