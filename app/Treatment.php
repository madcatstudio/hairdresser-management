<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
	protected $fillable = [
    	'date',
    	'note',
    ];

    protected $dates = ['date'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function services()
    {
    	return $this->belongsToMany(Service::class);
    }
}
