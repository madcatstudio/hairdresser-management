<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
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

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }
}
