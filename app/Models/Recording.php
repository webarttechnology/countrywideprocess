<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recording extends Model
{
    use HasFactory;
    protected $fillable = ['document_type','state_name','county','suffix','inlineRadio2','inlineRadio1','first_name','last_name','organization_name','authorized_agent_name','execution_date','consideration','section','block','lot','unit','town','grantee_suffix','grantee_inlineRadio2','grantee_inlineRadio1','grantee_first_name','grantee_last_name','grantee_authorized_agent_name','grantee_organization_name','transfer_tax_exempt1','transfer_tax_exempt2','consideration_amount','party_count','transfer_tax','title_count','sb2','image1','image_title1','image2','image_title2','image3','image_title3','image4','image_title4','payment_amt','payment_status','invoice_no'];
}
