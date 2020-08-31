<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $guarded = [];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
