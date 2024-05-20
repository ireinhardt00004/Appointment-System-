<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class ControlPSIPOP extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id','transaction_number', 'odc_number','date_received_records_unit', 'date_received_hr_unit','school_district','item_number','position_from','position_to',
        'name_incumbent','sex','date_of_birth','tin_number','date_original_appointment','date_last_promotion','eligibility','date_validity_eligibility','first_time_use_eligibility',
        'salary_grade_step','position_level','nature_of_appointment','status_of_appointment','pwd','type_of_disability','member_of_ip_group','ethnicity',
        'name_previous_incumbent','reason_of_vacancy','date_updating_psiop_online','date_updating_psiop_offline','date_processed_signature_ao','date_posted_fb','date_transmitted_to_csc','date_received_from_csc','approved',
        'processing_days','status','action_remarks','final_action'
    ];
    protected $dates = ['deleted_at'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
