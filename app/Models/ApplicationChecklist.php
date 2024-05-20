<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class ApplicationChecklist extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'user_id','transaction_number','name','positionTitle','SG_STEP','MonthlyCompensation','Daily_Compensation_Casual','EduText','education',
        'education_remarks','ExpText','experience','experience_remarks','TrainText','training','training_remarks','eligibility_Text','eligibility','eligibility_remarks','Other_Requirements','Other_Requirements_remarks','Senior_HS','Senior_HS_remarks','Common_Requirements','Common_Requirements_remarks','CS_form_no_33_a','CS_form_no_33_a_remarks','CS_form_no_33_b','CS_form_no_33_b_remarks','CS_form_no_34_a','CS_form_no_34_a_remarks','CS_form_no_34_b','CS_form_no_34_b_remarks','CS_form_no_34_c','CS_form_no_34_c_remarks','CS_form_no_34_d','CS_form_no_34_d_remarks','CS_form_no_34_e','CS_form_no_34_e_remarks','CS_form_no_34_f','CS_form_no_34_f_remarks','Employment_Status','Employment_Status_remarks','Provisional_Appointment','Provisional_Appointment_remarks','appointee_subject','appointee_subject_remarks','Nature_of_Appointment','Nature_of_Appointment_remarks','Signature_of_Appointing','Signature_of_Appointing_remarks','Date_of_Signing','Date_of_Signing_remarks','Certification_of_Publication','Certification_of_Publication_remarks','Certification_by_Chairperson','Certification_by_Chairperson_remarks','Acknowledgement_Original','Acknowledgement_Original_remarks','Personal_Data_Sheet','Personal_Data_Sheet_remarks','Is_the_agency_accredited','Is_the_agency_accredited_remarks','If_NOT_accredited','If_NOT_accredited_remarks','Erasures_or_alterations','Erasures_or_alterations_remarks','With_decided_administrative','With_decided_administrative_remarks','Discrepancy_in_name','Discrepancy_in_name_remarks','Change_of_Civil_Status','Change_of_Civil_Status_remarks','Annulment_or_Declaration','Annulment_or_Declaration_remarks','Appointments_issued_by_the_SUCs','Appointments_issued_by_the_SUCs_remarks','Appointment_issued_for_faculty_positions','ppointment_issued_for_faculty_positions_remarks','Appointments_Requiring_Board_Resolution','Appointments_Requiring_Board_Resolution_remarks','Ban_on_Issuance','Ban_on_Issuance_remarks','Certification_issued_by_the_appointing_officer','Certification_issued_by_the_appointing_officer_remarks','Certification_issued_by_the_Provincial','Appointment_to_head_of_department','Concurred','Not_Concurred','Creation_and_reclassification','Non_Disciplinary_in_Nature','Non_Disciplinary_in_Nature_remarks','Certification_issued_by_the_agency','Written_consent_by_the_employee','Temporary_and_Provisional_Appointment','Temporary_and_Provisional_Appointment_remarks','Reclassification','Reclassification_remarks','OR_COPY_AUT_CERT_OF_ELIG','OR_COPY_AUT_CERT_OF_ELIG_remarks','Position_Description_Form','Position_Description_Form_remarks','Oath_of_Office','Oath_of_Office_remarks','Certification_of_Assumption_to_Duty','Certification_of_Assumption_to_Duty_remarks','Performance_Rating','Performance_Rating_remarks','Justification','Justification_remarks','Electronic_file_stored','Electronic_file_stored_remarks','Others','Others_remarks'
    ];
    protected $dates = ['deleted_at'];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
