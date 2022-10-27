<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf_master extends Model
{
    use HasFactory;
    protected $fillable = ['blog_id','pdf_link','is_active'];
}
