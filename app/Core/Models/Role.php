<?php

namespace OneStop\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
   	protected $fillable = ['name'];
}
