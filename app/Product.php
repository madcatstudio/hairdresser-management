<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
    	'body',
    	'company_id',
    ];


    public function company()
    {
    	return $this->belongsTo(Company::class);
    }

    public function purchases()
    {
    	return $this->belongsToMany(Purchase::class)->latest();
    }

}
