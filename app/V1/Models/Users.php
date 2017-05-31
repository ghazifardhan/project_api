<?php

namespace App\V1\Models;

use App\V1\Models\BaseModel as Model;

class Users extends Model{

	protected $table = 'users';

	protected $fillable = [
		'name', 'email', 'password', 'reset_code'
	];

	protected $hidden = [
        'password'
 	];

}