<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_confirmed',
        'is_favorite',
    ];

    public function places(): hasMany
    {
        return $this->hasMany(Place::class);
    }

    public function users(): hasMany
    {
        return $this->hasMany(User::class);
    }
}
