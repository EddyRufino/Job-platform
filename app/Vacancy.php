<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
	protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] = Str::slug($name);
    }

    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
