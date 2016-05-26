<?php

namespace OneStop\Core\Models;

use OneStop\Core\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username','password','status',
        'confirmation_code','confirmed','about',
        'profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A given user can have a many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'user_roles');
    }


    /**
     *
     *
     * @param [type] $key [description]
     */
    public function setSupplement($key,$value)
    {
        return $this->attributes[$key] = $value;
    }
}
