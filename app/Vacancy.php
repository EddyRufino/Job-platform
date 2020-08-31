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

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }
}
