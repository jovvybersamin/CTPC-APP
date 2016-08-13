<?php

namespace OneStop\Core\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use OneStop\Core\Models\Role;
use OneStop\Core\Models\Video;

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
     *
     * @return [type] [description]
     */
    public function videos()
    {
        return $this->hasMany(Video::class,'uploaded_by');
    }

    /**
     * A iven user can have many business categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(BusinessCategory::class,'user_business_categories','user_id');
    }

    /**
     * Get only the users that has a provider role.
     *
     * @param  [type] $query [description]
     * @return
     */
    public function providers($query)
    {
        return $query->roles()->where('id',2);
    }

    /**
     * Get all ids of category.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getCategoriesIds()
    {
        $ids = [];

        $this->categories->each(function($item,$key) use (&$ids)
        {
            array_push($ids,$item->id);
        });

        return collect($ids);
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

   /**
    * Get the about info of the given user.
    *
    * @return string
    */
    public function aboutLimited()
    {
        if(strlen($this->about) < 50) {
            return $this->about;
        }
        return Str::substr($this->about,0,50) . '...';
    }

    /**
     *
     * @return [type] [description]
     */
    public function aboutN2lbr()
    {
       return nl2br($this->about);
    }

    /**
     * Get the avatar url of the given user.
     *
     * @return string
     */
    public function avatar()
    {
        if ( empty($this->profile )){
             return route('avatar','default.png');
        }
        return route('avatar',$this->profile);
    }

    /**
     * Get the profile url of the given user.
     *
     * @return string
     */
    public function profileUrl()
    {
        return route('users.profile',$this->username);
    }

    /**
     * Get the human date for created date of the given user.
     *
     * @return string
     */
    public function joined()
    {
        return $this->created_at->diffForHumans();
    }

}
