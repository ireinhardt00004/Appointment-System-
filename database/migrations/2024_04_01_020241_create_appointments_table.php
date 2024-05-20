<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('transaction_number');
            $table->string('full_name');
            $table->string('lname');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('extname')->nullable();
            $table->string('postitle');
            $table->string('frompos')->nullable();
            $table->string('topos')->nullable();
            $table->string('salary_grade');
            $table->string('salary_rate')->nullable();
            $table->string('salary_increment')->nullable();
            $table->string('appointment_status');
            $table->string('office_department_unit');
            $table->string('compensation_rate_words');
            $table->decimal('compensation_rate_num', 12, 2);
            $table->string('appointment_nature');
            $table->string('vice')->nullable();
            $table->string('reason_title')->nullable();
            $table->string('plantilla_item_number')->nullable();
            $table->string('plantilla_page_number')->nullable();
            $table->string('odc_number')->nullable();
            $table->date('date_process_ao')->nullable();
            $table->date('date_posted_fb_mess')->nullable();
            $table->date('date_received_records_unit')->nullable();
            $table->date('date_received_hr_unit')->nullable();
            $table->string('school_district');
            $table->string('item_number')->nullable();
            $table->string('name_incumbent')->nullable();
            $table->string('sex')->enum(['Male', 'Female', 'Others','N/A'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('date_original_appointment')->nullable();
            $table->string('date_last_promotion')->nullable();
            $table->string('eligibility')->nullable();
            $table->date('date_validity_eligibility')->nullable();
            $table->string('first_time_use_eligibility');
            $table->string('position_level')->nullable();
            $table->string('status_of_appointment')->nullable();
            $table->string('pwd')->enum(['Yes', 'No'])->nullable();
            $table->string('type_of_disability')->nullable();
            $table->string('member_of_ip_group')->nullable();
            $table->string('ethnicity')->nullable();
            $table->date('date_updating_psiop_online')->nullable();
            $table->date('date_updating_psiop_offline')->nullable();
            $table->date('date_transmitted_to_csc')->nullable();
            $table->date('date_received_from_csc')->nullable();
            $table->string('approved')->enum(['Approved', 'Disapproved', 'N/A'])->nullable();
            $table->string('pub_mode')->nullable();
            $table->string('processing_days')->nullable();
            $table->string('status')->nullable();
            $table->string('action_remarks')->nullable();
            $table->string('final_action')->nullable();
            $table->string('education')->nullable();
            $table->string('education_remarks')->nullable();
            $table->string('experience')->nullable();
            $table->string('training')->nullable();
            $table->string('eligibility_remarks')->nullable();
            $table->string('senior_high_remarks')->nullable();
            $table->string('prov_appt_remarks')->nullable();
            $table->string('nature_appt_remarks')->nullable();
            $table->string('date_signing_remarks')->nullable();
            $table->string('cert_vacabt_pos_remarks')->nullable();
            $table->string('performace_rating_radio')->nullable();
            $table->string('performace_rating_remarks')->nullable();
            $table->string('justification_radio')->nullable();
            $table->string('justification_remarks')->nullable();
            $table->string('daily_compensation')->nullable();
            $table->date('position_pub_from')->nullable();
            $table->date('position_pub_to')->nullable();
            $table->date('deliberation_held_on')->nullable();
            $table->date('deliberation_mode')->nullable();
            $table->string('placement_committe_chair')->nullable();
            $table->string('sector')->nullable();
            $table->string('name_agency')->nullable();
            $table->string('name_previous_incumbent')->nullable();
            $table->date('period_employment_from')->nullable();
            $table->date('period_employment_to')->nullable();
            $table->string('rai_month')->nullable();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
