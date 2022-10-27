<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricelevel extends Model
{
    use HasFactory;
    protected $fillable = ['service_master_id', 'priceitem_id', 'name','pricezone_id'];

    public function service_master(){
    	return $this->belongsTo(Service_master::class);
    }

    public function pricezone(){
    	return $this->belongsTo(Pricezone::class);
    }

    public function priceitem(){
    	return $this->belongsTo(Priceitem::class);
    }

    public function price(){
    	return $this->hasMany(Price::class);
    }
}
