<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricezone extends Model
{
    use HasFactory;

    protected $fillable = ['service_master_id', 'priceitem_id', 'name'];

    public function service_master(){
    	return $this->belongsTo(Service_master::class);
    }

    public function priceitem(){
    	return $this->belongsTo(Priceitem::class);
    }

    public function pricelevel(){
    	return $this->hasMany(Pricelevel::class);
    }

    public function price(){
    	return $this->hasMany(Price::class);
    }
}
