<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory , HasApiTokens;

    protected $fillable = [
        'username',
        'password',
        'verified_at',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Auth\Database\factories\UserFactory::new();
    }

    
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles',  'role_id');
    }

    public function abilitiesFor(string $roleName): array
    {
        $role = $this->roles()
            ->where('name', $roleName)
            ->first();

        return !$role
            ? []
            : $role->abilities;
    }

}
