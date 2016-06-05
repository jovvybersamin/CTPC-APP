<?php

namespace OneStop\Core\Models;

use OneStop\Core\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $supplements = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
        'username','password','status',
        'confirmation_code','confirmed','about',
        'profile'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','confirmation_code','confirmed'
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
     * [supplement description]
     * @return [type] [description]
     */
    public function supplement()
    {
        $this->attributes['edit_url'] = $this->editUrl();
    }

    /**
     *
     * @param [type] $key [description]
     */
    public function setSupplement($key,$value)
    {
        return $this->attributes[$key] = $value;
    }

    /**
     * Override the toArray method.
     *
     * @return [type] [description]
     */
    public function toArray()
    {
        $this->supplement();
        return parent::toArray();
    }

    /**
     * Get the edit url for the given user.
     *
     * @return string
     */
    public function editUrl()
    {
        return route('cp.users.edit',$this->username);
    }

}
