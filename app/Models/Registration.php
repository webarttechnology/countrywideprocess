<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;
    protected $fillable = ['fname','mname','lname','company','businesNameforwithoutatoney','email_id','password','mobile_no','address_type','address_atoney','unit','city','state','zipcode','business_name','firm_name','bar_id','registration_as','is_active','account_type','account_name','account_address','areyou','billing_name','billing_email','billing_phone','billing_address'];
}
