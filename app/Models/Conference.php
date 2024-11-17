<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'speakers',
        'date',
        'address',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_conferences', 'conference_id', 'user_id');
    }
}