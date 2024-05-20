<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Rai extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id','transaction_number', 'date_issued','last_name','first_name','name_ex','middle_name','position_title','item_number','salary_grade','salary_rate_monthly','employee_status','period_employment_from','period_employment_to','nature_of_appointment','publication_date_from','publication_date_to','publication_mode','is_validated','csc_date_action','csc_date_release','agency_receiving_officer'
    ];
    protected $dates = ['deleted_at'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}