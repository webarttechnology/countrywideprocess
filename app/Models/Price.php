<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $fillable = ['service_master_id', 'priceitem_id', 'name','pricezone_id','pricelevel_id','amount','page','additional_case'];

    public function service_master(){
    	return $this->belongsTo(Service_master::class);
    }

    public function pricezone(){
    	return $this->belongsTo(Pricezone::class);
    }

    public function priceitem(){
    	return $this->belongsTo(Priceitem::class);
    }

    public function pricelevel(){
    	return $this->belongsTo(Pricelevel::class);
    }
    
}
