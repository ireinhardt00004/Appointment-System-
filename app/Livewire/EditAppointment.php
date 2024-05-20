<?php

namespace App\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Appointment;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class EditAppointment extends ModalComponent
{
    public Appointment $appointment;
    public $data;
    public $uid;

    public function mount($user) {

        $this->data = Appointment::find($user);
      
       // Gate::authorize('update', $this->$appointment);
        // $this->appointment->

    }
        public function update(Request $request)
        {
         
            try {
                // $validatedData = $this->validate([
                //     'lname' => 'required|string',
                //     'fname' => 'required|string',
                //     'mname' => 'nullable|string',
                //     'extname' => 'nullable|string',
                //     'postitle' => 'required|string',
                //     'frompos' => 'required|string',
                //     'topos' => 'required|string',
                //     'salary_grade' => 'required|string',
                //     'salary_increment' => 'nullable|string',
                //     'appointment_status' => 'required|string',
                //     'office_department_unit' => 'required|string',
                //     'compensation_rate_words' => 'required|string',
                //     'compensation_rate_num' => 'required|numeric',
                //     'appointment_nature' => 'required|string',
                //     'reason_title' => 'nullable|string',
                //     'plantilla_item_number' => 'required|string',
                //     'plantilla_page_number' => 'required|string',
                //     'odc_number' => 'required|string',
                //     'date_received_records_unit' => 'nullable|date',
                //     'date_received_hr_unit' => 'nullable|date',
                //     'school_district' => 'required|string',
                //     'date_posted_fb_mess' => 'nullable|date',
                //     'name_incumbent' => 'required|string',
                //     'sex' => 'required|string',
                //     'data.date_process_ao' => 'nullable|date',
                //     'vice' => 'nullable|string',
                //     'date_of_birth' => 'required|date',
                //     'tin_number' => 'required|string',
                //     'date_original_appointment' => 'nullable|date',
                //     'date_last_promotion' => 'nullable|date',
                //     'eligibility' => 'required|string',
                //     'date_validity_eligibility' => 'required|string',
                //     'first_time_use_eligibility' => 'required|string',
                //     'position_level' => 'required|string',
                //     'status_of_appointment' => 'nullable|string',
                //     'pwd' => 'required|string',
                //     'type_of_disability' => 'nullable|string',
                //     'member_of_ip_group' => 'required|string',
                //     'ethnicity' => 'required|string',
                //     'date_updating_psiop_online' => 'nullable|date',
                //     'data.date_updating_psiop_offline' => 'nullable|date',
                //     'date_transmitted_to_csc' => 'nullable|date',
                //     'date_received_from_csc' => 'nullable|date',
                //     'approved' => 'required|string',
                //     'processing_days' => 'required|string',
                //     'status' => 'required|string',
                //     'action_remarks' => 'required|string',
                //     'final_action' => 'nullable|string',
                //     'education' => 'nullable|string',
                //     'education_remarks' => 'nullable|string',
                //     'experience' => 'nullable|string',
                //     'training' => 'nullable|string',
                //     'eligibility_remarks' => 'nullable|string',
                //     'senior_high_remarks' => 'nullable|string',
                //     'prov_appt_remarks' => 'nullable|string',
                //     'nature_appt_remarks' => 'nullable|string',
                //     'date_signing_remarks' => 'nullable|string',
                //     'cert_vacabt_pos_remarks' => 'nullable|string',
                //     'performace_rating_radio' => 'nullable|string',
                //     'performace_rating_remarks' => 'nullable|string',
                //     'justification_radio' => 'nullable|string',
                //     'justification_remarks' => 'nullable|string',
                //     'date_process_ao' => 'nullable|date',
                //     'vice' => 'nullable|string',
                //     'daily_compensation' => 'nullable|string',
                //     'position_pub_from' => 'nullable|date',
                //     'position_pub_to' => 'nullable|date',
                //     'placement_committe_chair' => 'nullable|string',
                //     'sector' =>'required|string',
                //     'name_agency' => 'required|string',
                //     'name_previous_incumbent' => 'nullable|string',
                //     'uid' => 'nullable|string'
                // ]);
              
                    // Fetch the appointment data from the database
                    $id = $request->input('uid');
                    dd($id);
            $appointment = Appointment::findOrFail($id);

        // Concatenate salary_grade and salary_increment with a hyphen
        $salaryGrade = $validatedData['salary_grade'] . '-' . $validatedData['salary_increment'];

        // Only update if the concatenated value is different
        if ($appointment->salary_grade !== $salaryGrade) {
            $appointment->salary_grade = $salaryGrade;
        }

        // Loop through each field and update if the new value is different
        foreach ($validatedData as $field => $value) {
            if ($appointment->{$field} !== $value) {
                $appointment->{$field} = $value;
            }
        }

        // Save the updated data
        $appointment->save();

        session()->flash('success', 'Appointment Data Information updated successfully.');

        ActivityLog::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Updated an Appointment Data Entry.'
        ]);

        $this->closeModal(); 
    } catch (\Exception $e) {
        // Log the exception for debugging purposes
        logger('Appointment Data update failed: ' . $e->getMessage());
        session()->flash('error', 'Failed to update the appointment data. Please try again or contact the Administrator');
    }
}
    
    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '4xl';
    }
    public static function closeModalOnEscape(): bool
    {
        return false;
    }
    public function render()
    {
       // return view('livewire.edit-appointment',['data' => $this->data]);
       //return view('livewire.edit-appointment');
    }
}
