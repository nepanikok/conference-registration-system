<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Conference;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function conferences()
    {
        return $this->belongsToMany(Conference::class, 'users_conferences', 'user_id', 'conference_id');
    }

    // Jei nenaudojate Spatie paketo, šis metodas gali būti reikalingas:
     public function roles()
     {
       return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
     }
}
