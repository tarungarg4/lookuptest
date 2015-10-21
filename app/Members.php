<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    protected $table = 'members';
    protected $fillable = [
    	'name','email','phone','country'
    ];

    public function setUpdatedAt($value)
	{
	// do nothing
	}
    public function setCreatedAt($value)
	{
	// do nothing
	}
}
