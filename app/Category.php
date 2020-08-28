<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function vacancies()
    {
    	return $this->hasMany(Vacancy::class);
    }
}
