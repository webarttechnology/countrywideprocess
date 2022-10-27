<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = ['country_id', 'badge_no', 'fname','lname','email_id','company','address1','address2','city','state','pincode','mobile_no','fax_no','yoe','past_experience','is_active'];
}
