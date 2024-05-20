<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class CSCControlForm extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'transaction_number', 'sector','agency_name','appointee_name','salary_grade','position_title','position_level',
        'employment_status','appointment_nature','casual_appointment_date_from', 'casual_appointment_date_to',
        'appointment_authority_name','appointment_issuance_date','date_of_birth','sex','is_PWD','disability_type',
        'ip_group_member','ethnicity','eligbility_use_type','eligibility_effectivity_date','is_First_used_eligiblity'
    ];
    protected $dates = ['deleted_at'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
