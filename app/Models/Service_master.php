<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_master extends Model
{
    use HasFactory;
    protected $fillable = ['name','image','title', 'is_active','details','slug_value'];

    public function price(){
    	return $this->hasMany(Price::class);
    }

    public function priceitem(){
    	return $this->hasMany(Priceitem::class);
    }

    public function pricezone(){
    	return $this->hasMany(Pricezone::class);
    }

    public function pricelevel(){
    	return $this->hasMany(Pricelevel::class);
    }
}
