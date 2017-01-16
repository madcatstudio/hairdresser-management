<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
    	'name',
    ];

    public function treatments()
    {
    	return $this->belongsToMany(Treatment::class)->latest();
    }
}
