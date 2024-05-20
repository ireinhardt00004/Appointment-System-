<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'transaction_number', 'full_name', 'lname', 'fname', 'mname', 'extname', 'postitle', 'frompos', 'topos', 'salary_grade', 'salary_rate', 'salary_increment', 'appointment_status', 'office_department_unit', 'compensation_rate_words', 'compensation_rate_num', 'appointment_nature', 'reason_title', 'plantilla_item_number', 'plantilla_page_number', 'odc_number', 'date_received_records_unit', 'date_received_hr_unit', 'school_district', 'item_number', 'name_incumbent', 'sex', 'date_of_birth', 'tin_number', 'date_original_appointment', 'date_last_promotion', 'eligibility', 'date_validity_eligibility', 'first_time_use_eligibility', 'position_level', 'status_of_appointment', 'pwd', 'type_of_disability', 'member_of_ip_group', 'ethnicity', 'date_updating_psiop_online', 'date_updating_psiop_offline', 'date_transmitted_to_csc', 'date_received_from_csc', 'approved', 'processing_days', 'status', 'action_remarks', 'final_action',
        'education', 'education_remarks', 'experience', 'training', 'eligibility_remarks', 'senior_high_remarks', 'prov_appt_remarks', 'nature_appt_remarks', 'date_signing_remarks', 'cert_vacabt_pos_remarks', 'performace_rating_radio', 'performace_rating_remarks', 'justification_radio', 'justification_remarks', 'date_process_ao', 'vice', 'date_posted_fb_mess',
        'daily_compensation', 'position_pub_from', 'position_pub_to', 'deliberation_held_on', 'placement_committe_chair',
        'sector', 'name_agency', 'name_previous_incumbent', 'deliberation_mode','period_employment_from', 'period_employment_to', 'rai_month'
     ];
    
    protected $dates = ['deleted_at'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function checkData() {
        return $this->hasOne(CheckData::class);
    }
    public function isChecked()
    {
        // Check if there is related CheckData for this appointment and user
        return $this->checkData()->where('user_id', auth()->id())->where('appointment_id', $this->id)->exists();
    }
     
    public function scopeSearch($query, $value) {
    
        $query->where('transaction_number','like',"%{$value}%")
        ->orwhere('fname','like',"%{$value}%")
        ->orwhere('mname','like',"%{$value}%")
        ->orwhere('lname','like',"%{$value}%")
        ->orwhere('school_district','like',"%{$value}%")
        ->orwhere('appointment_nature','like',"%{$value}%")
        ->orwhere('appointment_status','like',"%{$value}%")
        ->orwhere('date_original_appointment','like',"%{$value}%")
        ->orwhere('eligibility','like',"%{$value}%")
        ->orwhere('created_at','like',"%{$value}%")
        ->orwhereDate('created_at','like',"%{$value}%")
        ->orwhere('date_original_appointment','like',"%{$value}%")
        ->orWhereHas('users', function ($query) use ($value) {
                       $query->where('fname', 'like',"%{$value}%")
                           ->orWhere('lname', 'like',"%{$value}%");
                   });
    }
}
