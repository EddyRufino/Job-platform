<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
	protected $guarded = [];

    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }
}
