<?php

namespace OneStop\Core\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OneStop\Core\Models\Role;

class User extends Authenticatable
{

    protected $supplements = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
         'email',
        'username',
        'password',
        'status',
        'confirmation_code',
        'confirmed',
        'about',
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
        $this->attributes['human_created_at'] = $this->created_at->diffForHumans();
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



    /**
     * Check if the user has a role by name or id.
     *
     * @param string $nameOrId
     * @return boolean
     */
    public function hasRole($nameOrId)
    {
        foreach ($this->roles->toArray() as $role) {
            // check by id?
            // check by name?
            if($nameOrId == $role['name']){
                return true;
            }
        }
        return false;
    }

}
