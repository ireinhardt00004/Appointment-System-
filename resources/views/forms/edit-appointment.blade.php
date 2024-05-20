@if(isset($form))
<!-- EDIT  Modal -->
<div id="editpopup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden  w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full">
    <div class="relative w-full max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white w-full h-full rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                 Edit Appointment Data Entry Form
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editpopup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 ">
             
<!-- <section class="bg-white w-full h-full dark:bg-gray-900">
  <div class="py-10 px-5 mx-auto  w-[100%] shadow-[0px_0px_17px_-1px_rgba(120,120,120,1)] border border-gray-300 rounded-[16px]"> -->
      <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Fill up this form carefully</h2>
      <form  class="mx-auto w-full " id="appointmentDataForm"  method="POST" action="{{ route('update.appointment') }}">
      @csrf
      <!-- Group -->
      @method('PUT')
      <div class="grid md:grid-cols-2 md:gap-6 *:">
      <div class="relative z-0 w-full mb-5 group ">
        <input id="input_userID" type="hidden" name="userID" value="" >
          <input id="Input_lname" type="text" name="lname" id="floating_lname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_lname" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_fname" type="text" name="fname" id="floating_fname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_fname" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_mname" type="text" name="mname" id="floating_mname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_mname" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_extname" type="text" name="extname" id="floating_extname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_extname" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Extension Name</label>
      </div>
      
      <div class="relative z-0 w-full mb-5 group ">
          <input id="input_postitle" type="text" name="postitle" id="floating_postitle" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_postitle" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Title</label>
      </div>
      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="input_frompos" type="text" name="frompos" id="floating_frompos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_frompos" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> Position From</label>
    </div>
      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="input_topos" type="text" name="topos" id="floating_topos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_topos" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position To</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
    <select id="select_salary_rate" type="text" name="salary_rate" id="floating_salary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  >
        <option disabled selected>Select Salary Grade</option>
          <option value="1" class="text-black"> 1 </option>
          <option value="2" class="text-black"> 2 </option>
          <option value="3" class="text-black"> 3 </option> 
          <option value="4" class="text-black"> 4 </option>
          <option value="5" class="text-black"> 5 </option>
          <option value="6" class="text-black"> 6 </option>
          <option value="7" class="text-black"> 7 </option> 
          <option value="8" class="text-black"> 8 </option>
          <option value="9" class="text-black"> 9 </option>
          <option value="10" class="text-black"> 10 </option>
          <option value="11" class="text-black"> 11 </option> 
          <option value="12" class="text-black"> 12 </option>
          <option value="13" class="text-black"> 13 </option>
          <option value="14" class="text-black"> 14 </option>
          <option value="15" class="text-black"> 15 </option> 
          <option value="16" class="text-black"> 16 </option>
          <option value="17" class="text-black"> 17 </option>
          <option value="18" class="text-black"> 18 </option>
          <option value="19" class="text-black"> 19 </option> 
          <option value="20" class="text-black"> 20 </option>
          <option value="21" class="text-black"> 21 </option> 
          <option value="22" class="text-black"> 22 </option>
          <option value="23" class="text-black"> 23 </option>
          <option value="24" class="text-black"> 24 </option>
          <option value="25" class="text-black"> 25 </option> 
          <option value="26" class="text-black"> 26 </option>
          <option value="27" class="text-black"> 27 </option>
          <option value="28" class="text-black"> 28 </option>
          <option value="29" class="text-black"> 29 </option> 
          <option value="30" class="text-black"> 30 </option>
        </select>
        <label for="floating_salary" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary/Job/Pay Grade</label>
</div>
<div class="relative z-0 w-full mb-5 group">
    <select id="select_salary_increment" type="text" name="salary_increment" id="floating_salary_increment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  >
        <option disabled selected>Select Salary Grade Increment</option>
          <option value="1" class="text-black"> 1 </option>
          <option value="2" class="text-black"> 2 </option>
          <option value="3" class="text-black"> 3 </option> 
          <option value="4" class="text-black"> 4 </option>
          <option value="5" class="text-black"> 5 </option>
          <option value="6" class="text-black"> 6 </option>
          <option value="7" class="text-black"> 7 </option> 
          <option value="8" class="text-black"> 8 </option>
        </select>
        <label for="floating_salary_increment" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary/Job/Pay Grade Increment</label>
</div>
<!-- <div class="relative z-0 w-full mb-5 group ">
          <input id="input_salary_monthly" type="text" name="salary_monthly" id="floating_salary_monthly" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_salary_monthly" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Monthly Salary</label>
      </div> -->
<div class="relative z-0 w-full mb-5 group">
        <select id="select_appointment_status" type="text" name="appointment_status" id="floating_appointment_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  >
        <option disabled selected>Select Employment Status</option>
        <option value="Permanent" class="text-black">Permanent</option>
        <option value="Casual" class="text-black">Casual</option> 
        <option value="Temporary" class="text-black">Temporary</option> 
        <option value="Coterminous" class="text-black">Coterminous</option>
        <option value="Fixed Term" class="text-black">Fixed Term</option>
        <option value="Contractual" class="text-black">Contractual</option> 
        <option value="Substitute" class="text-black">Substitute</option> 
        <option value="Provisional" class="text-black">Provisional</option>
        </select>
        <label for="floating_appointment_status" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Employee Status</label>
    </div>
    <div class="relative z-0 w-full mb-5 group ">
          <input id="input_office_department" type="text" name="office_department_unit" id="floating_office" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_office" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Office/ Department/ Unit</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_date_period_employment_from" type="date" name="period_employment_from" id="floating_period_employment_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_period_employment_from" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Period of Employment From (if not Permanent Status)</label>
      </div> 
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_date_period_employment_to" type="date" name="period_employment_to" id="floating_period_employment_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_period_employment_to" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Period of Employment To (if not Permanent Status)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_compensation_rate_words" type="text" name="compensation_rate_words" id="floating_compensation_rate_words" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_compensation_rate_words" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month (in words ₱)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_compensation_rate_num" type="number" name="compensation_rate_num" id="floating_compensation_rate_num" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_compensation_rate_num" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month(in numbers ₱)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="select_appointment_nature" type="text" name="appointment_nature" id="floating_appointment_nature" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <option disabled selected>Select Nature Of Appointment</option>
        <option value="Original" class="text-black">Original</option>
        <option value="Promotional" class="text-black">Promotional</option> 
        <option value="Reemployment" class="text-black">Reemployment</option> 
        <option value="Reappointment" class="text-black">Reappointment</option>
        <option value="Reinstatement" class="text-black">Reinstatement</option>
        <option value="Reclassification" class="text-black">Reclassification</option> 
        <option value="Demotion" class="text-black">Demotion</option>
        </select>
        <label for="floating_appointment_nature" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appointment</label>
    </div>
      <div class="relative z-0 w-full mb-5 group">
        <input id="input_reason_title" type="text" name="reason_title" id="floating_reason_title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  >
        <!-- <option selected disabled>Select title</option>
          <option value="Transferred" class="text-black">Transferred</option>
          <option value="Retired" class="text-black">Retired</option>
          <option value="ETC" class="text-black">ETC</option>
          </select> -->
        <label for="floating_reason_title" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Reason (Transferred, Retired, Resigned, ETC.)</label>
    </div>
   
    <div class="relative z-0 w-full mb-5 group">
          <input id="input_plantilla_item_number" type="text" name="plantilla_item_number" id="floating_plantilla_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  >
          
          <label for="cForm"  id="floating_plantilla_item_number" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Item Number</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_plantilla_page_number" type="number" name="plantilla_page_number" id="floating_plantilla_page_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
          <label for="floating_plantilla_page_number" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Page Number</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="select_sector" type="text" name="sector" id="floating_Sector" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  >
        <option disabled selected>Select Sector</option>
          <option value="LGU - MUNICIPALITY" class="text-black"> LGU - MUNICIPALITY </option>
          <option value="LGU - CITY" class="text-black"> LGU - CITY </option>
          <option value="LGU - PROVINCE" class="text-black"> LGU - PROVINCE </option> 
          <option value="EXECUTIVE - NGA" class="text-black"> EXECUTIVE - NGA </option>
          <option value="EXECUTIVE - LWD" class="text-black"> EXECUTIVE - LWD </option>
          <option value="EXECUTIVE ATTACHED" class="text-black"> EXECUTIVE ATTACHED </option>
          <option value="SUC" class="text-black"> SUC </option>
</select>
<label for="floating_sector" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sector</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="select_name_agency" type="text" name="name_agency" id="floating_agency" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  >
        <option disabled selected>Select Name of Agency</option>
          <option value="PGO - Cavite" class="text-black">PGO - Cavite </option>
          <option value="CGO - Bacoor" class="text-black">CGO - Bacoor </option>
          <option value="CGO - Dasmariñas" class="text-black">CGO - Dasmariñas </option> 
          <option value="CGO - Gen. Trias" class="text-black">CGO - Gen. Trias </option>
          <option value="CGO - Imus" class="text-black">CGO - Imus </option>
          <option value="CGO - Trece Martires" class="text-black">CGO - Trece Martires </option>
          <option value="CGO - Tagaytay" class="text-black">CGO - Tagaytay </option>
          <option value="MGO - Alfonso" class="text-black">MGO - Alfonso </option>
          <option value="MGO - Amadeo" class="text-black">MGO - Amadeo </option>
          <option value="MGO Carmona" class="text-black">MGO Carmona </option> 
          <option value="MGO - Gen. E. Aguinaldo" class="text-black">MGO - Gen. E. Aguinaldo </option>
          <option value="MGO - Gen. Mariano Alvarez" class="text-black">MGO - Gen. Mariano Alvarez </option>
          <option value="MGO - Indang" class="text-black">MGO - Indang </option>
          <option value="MGO - Kawit" class="text-black">MGO - Kawit </option>
          <option value="MGO - MAgallanes" class="text-black">MGO - MAgallanes </option>
          <option value="MGO - Maragondon" class="text-black">MGO - Maragondon </option>
          <option value="MGO - Mendez" class="text-black">MGO - Mendez </option> 
          <option value="MGO - Naic" class="text-black">MGO - Naic </option>
          <option value="MGO - Noveleta" class="text-black">MGO - Noveleta </option>
          <option value="MGO - Rosario" class="text-black">MGO - Rosario </option>
          <option value="MGO - Silang" class="text-black">MGO - Silang </option>
          <option value="MGO - Tanza" class="text-black">MGO - Tanza </option>
          <option value="MGO - Ternate" class="text-black">MGO - Ternate </option>
          <option value="Amadeo Water District" class="text-black">Amadeo Water District </option> 
          <option value="Carmona Water District" class="text-black">Carmona Water District </option>
          <option value="Dasmariñas Water District" class="text-black">Dasmariñas Water District </option>
          <option value="Gen. E. Aguinaldo Water District" class="text-black">Gen. E. Aguinaldo Water District </option>
          <option value="Gen. M. Alvarez Water District" class="text-black">Gen. M. Alvarez Water District </option>
          <option value="Indang Water District" class="text-black">Indang Water District </option>
          <option value="Maragondon Water District" class="text-black">Maragondon Water District </option>
          <option value="Mendez Water District" class="text-black">Mendez Water District </option> 
          <option value="Silang Water District" class="text-black">Silang Water District </option>
          <option value="Tagaytay Water District" class="text-black">Tagaytay Water District </option>
          <option value="Tanza Water District" class="text-black">Tanza Water District </option>
          <option value="TMC Water District" class="text-black">TMC Water District </option>
          <option value="CAVITE STATE UNIVERSITY - MAIN CAMPUS" class="text-black">CAVITE STATE UNIVERSITY - MAIN CAMPUS </option>
          <option value="CAVITE STATE UNIVERSITY - NAIC CAMPUS" class="text-black">CAVITE STATE UNIVERSITY - NAIC CAMPUS </option>
          <option value="CAVITE STATE UNIVERSITY - ROSARIO CAMPUS" class="text-black">CAVITE STATE UNIVERSITY - ROSARIO CAMPUS </option> 
          <option value="DO-Provicial of Cavite" class="text-black">DO-Provicial of Cavite </option>
          <option value="DO-DepEd Bacoor City" class="text-black">DO-DepEd Bacoor City </option>
          <option value="DO-DepEd Cavite City" class="text-black">DO-DepEd Cavite City </option>
          <option value="DO-DepEd Dasmariñas City" class="text-black">DO-DepEd Dasmariñas City </option>
          <option value="DO-DepEd Gen. Trias City" class="text-black">DO-DepEd Gen. Trias City</option>
          <option value="DO-DepEd Imus City" class="text-black">DO-DepEd Imus City </option>
          <option value="DOH Tagaytay" class="text-black">DOH Tagaytay </option> 
          <option value="DENR-4B" class="text-black">DENR-4B </option>
          <option value="National Irrigation Administration (NIA)" class="text-black">National Irrigation Administration (NIA) </option>
</select>
        <label for="floating_agency" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Agency</label>
    </div>
  
      <div class="relative z-0 w-full mb-5 group">
            <input id="input_odc_number" name="odc_number" type="text" maxlength="6" id="floating_oc_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_oc_number" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ODC Number</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_received_records_unit" type="date" name="date_received_records_unit" id="floating_date_received_records_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_date_received_records_unit" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY RECORDS UNIT</label>
        </div>
       
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_received_hr_unit" type="date" name="date_received_hr_unit" id="floating_date_received_hr_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  /> 
    <label for="floating_date_received_hr_unit" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY HR UNIT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_school_district" type="text" name="school_district" id="floating_school_district" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_school_district" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SCHOOL/DISTRICT</label>
        </div>
        <!-- <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="number" maxlength="6" name="item_number" id="floating_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_item_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ITEM NUMBER </label>

    </div> -->
    <div class="relative z-0 w-full mb-5 group">
            <input id="input_name_incumbent" type="text" name="name_incumbent" id="floating_name_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " /> 
    <label for="floating_name_incumbent" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NAME OF INCUMBENT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select id="select_floating_sex" type="text" name="sex" id="floating_sex" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" "  >
                <option selected disabled>Select Sex</option>
                <option value="Male" class="text-black">Male</option>
                <option value="Female" class="text-black">Female</option>
                <option value="Others" class="text-black">Others</option>
                <option value="N/A" class="text-black">Prefer not to Say</option>
                
            </select>
            <label for="floating_sex" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SEX</label>
        </div>
        <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="input_date_of_birth" type="date" name="date_of_birth" id="floating_date_of_birth" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""   />
        <label for="floating_date_of_birth" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF BIRTH</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
            <input id="input_tin_number" type="text" maxlength="12" name="tin_number" id="floating_tin_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  /> 
    <label for="floating_tin_number" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TIN</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_original_appointment" type="date" name="date_original_appointment" id="floating_date_original_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  >

            <label for="floating_date_original_appointment" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF ORIGINAL APPOINTMENT</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_last_promotion" type="date" name="date_last_promotion" id="floating_date_last_promotion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  /> 
    <label for="floating_date_last_promotion" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF LAST PROMOTION</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <select id="select_eligibility_typez" type="text" name="eligibility" id="floating_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  >
        <option disabled selected>Select Type of Eligibility Used</option>
        <option value="CS-PROF" class="text-black">CS-PROF</option>
        <option value="CS-SUBPROF" class="text-black">CS-SUBPROF</option>
        <option value="PBET" class="text-black">PBET</option> 
        <option value="PD907" class="text-black">PD907</option>
        <option value="CSEE/MATB" class="text-black">CSEE/MATB</option>
        <option value="POLICE OFFICER" class="text-black">POLICE OFFICER</option>
        <option value="POLICE OFFICER I" class="text-black">POLICE OFFICER I</option> 
        <option value="FIRE OFFICER" class="text-black">FIRE OFFICER</option>
        <option value="PENOLOGY OFFICER" class="text-black">PENOLOGY OFFICER</option>
        <option value="SME" class="text-black">SME</option> 
        <option value="BOE" class="text-black">BOE</option>
        <option value="BNS" class="text-black">BNS</option>
        <option value="BHW" class="text-black">BHW</option>
        <option value="EDP SPECIALIST" class="text-black">EDP SPECIALIST</option> 
        <option value="STS" class="text-black">STS</option>
        <option value="RA1080" class="text-black">RA1080</option>
        <option value="APPROPRIATE LICENSE (CAT III)" class="text-black">APPROPRIATE LICENSE (CAT III)</option>
        </select>
        <label for="floating_eligibility" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type of Eligibity Used</label>
    </div>

        <div class="relative z-0 w-full mb-5 group">
                <input id="input_date_validity_eligibility" type="date" name="date_validity_eligibility" id="floating_date_validity_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "   /> 
        <label for="floating_date_validity_eligibility" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF VALIDITY OF ELIGIBILITY</label> 
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <select id="select_first_time_use_eligibility" name="first_time_use_eligibility" id="floating_first_time_use_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" ">
                    <option value="No" selected class="text-black">No</option>
                    <option value="Yes" class="text-black">Yes</option>
                </select>
                <label for="floating_first_time_use_eligibility" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FIRST TIME USED OF ELIGIBILITY?</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
        <select id="select_position_level"  name="position_level" id="floating_position_level" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" "  >
            <option selected disabled>Select Position Level</option>
            <option value="1st" class="text-black"> 1st</option>
            <option value="2nd" class="text-black"> 2nd</option>
            <option value="3rd" class="text-black"> 3rd</option>
            </select>
        <label for="floating_position_level" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">POSITION LEVEL</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_status_of_appointment" type="text"  name="status_of_appointment" id="floating_status_of_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_status_of_appointment" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS OF APPOINTMENT </label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
       <select id="select_pwd" name="pwd" id="floating_pwd" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " >
        <option value="No"selected >No</option>
        <option value="Yes">Yes</option>
       </select>
<label for="floating_pwd" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PWD</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_type_of_disability" type="text"  name="type_of_disability" id="floating_type_of_disability" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
        <label for="floating_type_of_disability" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TYPE OF DISABILITIY</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
       <input id="input_member_of_ip_group" type="text"   name="member_of_ip_group" id="floating_member_of_ip_group" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
<label for="floating_member_of_ip_group" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MEMBER OF IP GROUP</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="select_ethnicity"   name="ethnicity" id="floating_ethnicity" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " >
            <option disabled selected>ETHNICITY</option>
            <option value="Abaknon" class="text-black"> Abaknon </option>
            <option value="Aeta/Agta" class="text-black"> Aeta/Agta </option>
            <option value="Agutaynon" class="text-black"> Agutaynon </option> 
            <option value="Aklan" class="text-black"> Aklan </option>
            <option value="Ati" class="text-black"> Ati </option>
            <option value="B'laan" class="text-black"> B'laan </option>
            <option value="Badjao" class="text-black"> Badjao </option> 
            <option value="Bago" class="text-black"> Bago </option>
            <option value="Balangao" class="text-black"> Balangao </option>
            <option value="Banguingui" class="text-black"> Banguingui </option>
            <option value="Bantoanon" class="text-black"> Bantoanon </option> 
            <option value="Batak" class="text-black"> Batak </option>
            <option value="Bicolano" class="text-black"> Bicolano </option>
            <option value="Boholano" class="text-black"> Boholano </option>
            <option value="Bolinao" class="text-black"> Bolinao </option> 
            <option value="Bontoc" class="text-black"> Bontoc </option>
            <option value="Bukidnon" class="text-black"> Bukidnon </option>
            <option value="Butuanon" class="text-black"> Butuanon </option>
            <option value="Caluyanon" class="text-black"> Caluyanon </option> 
            <option value="Capiznon" class="text-black"> Capiznon </option>
            <option value="Caviteño" class="text-black"> Caviteño </option> 
            <option value="Cebuano" class="text-black"> Cebuano </option>
            <option value="Cotobateno" class="text-black"> Cotobateno </option>
            <option value="Cuyunon" class="text-black"> Cuyunon </option>
            <option value="Davaoeno" class="text-black"> Davaoeno </option> 
            <option value="Eskaya" class="text-black"> Eskaya </option>
            <option value="Ga'dang" class="text-black"> Ga'dang </option>
            <option value="Gaddang" class="text-black"> Gaddang </option>
            <option value="Giangan" class="text-black"> Giangan </option> 
            <option value="Higaonon" class="text-black"> Higaonon </option>
            <option value="Hiligaynon" class="text-black"> Hiligaynon </option>
            <option value="Ibaloy" class="text-black"> Ibaloy </option>
            <option value="Ibanag" class="text-black"> Ibanag </option> 
            <option value="Ifugao" class="text-black"> Ifugao </option>
            <option value="Ilocano" class="text-black"> Ilocano </option>
            <option value="Ilongot" class="text-black"> Ilongot </option>
            <option value="Inonhan" class="text-black"> Inonhan </option> 
            <option value="Iranun" class="text-black"> Iranun </option>
            <option value="Isnag" class="text-black"> Isnag </option>
            <option value="Itawis" class="text-black"> Itawis </option>
            <option value="Itneg" class="text-black"> Itneg </option> 
            <option value="Ivatan" class="text-black"> Ivatan </option>
            <option value="Iwak" class="text-black"> Iwak </option>
            <option value="Jama Mapun" class="text-black"> Jama Mapun </option>
            <option value="Kagayanen" class="text-black"> Kagayanen </option> 
            <option value="Kalagan" class="text-black"> Kalagan </option>
            <option value="Kalanguya" class="text-black"> Kalanguya </option>
            <option value="Kalinga" class="text-black"> Kalinga </option>
            <option value="Kamayo" class="text-black"> Kamayo </option> 
            <option value="Kamiguin" class="text-black"> Kamiguin </option>
            <option value="Kankanay" class="text-black"> Kankanay </option> 
            <option value="Kapampangan" class="text-black"> Kapampangan </option>
            <option value="Karao" class="text-black"> Karao </option>
            <option value="Karay-a" class="text-black"> Karay-a </option>
            <option value="Kasiguranin" class="text-black"> Kasiguranin </option> 
            <option value="Kolibugan Subanon" class="text-black"> Kolibugan Subanon </option>
            <option value="Magahat" class="text-black"> Magahat </option>
            <option value="Maguidanaon" class="text-black"> Maguidanaon </option>
            <option value="Malaweg" class="text-black"> Malaweg </option> 
            <option value="Mamanwa " class="text-black"> Mamanwa </option>
            <option value="Mandaya" class="text-black"> Mandaya </option>
            <option value="Manguwangan" class="text-black"> Manguwangan </option> 
            <option value="Mangya" class="text-black"> Mangyan </option>
            <option value="Manobo" class="text-black"> Manobo </option>
            <option value="Mansaka" class="text-black"> Mansaka </option>
            <option value="Maranao" class="text-black"> Maranao </option> 
            <option value="Masbateño" class="text-black"> Masbateño </option>
            <option value="Matigsalug" class="text-black"> Matigsalug </option>
            <option value="Molbog" class="text-black"> Molbog </option>
            <option value="Palanan" class="text-black"> Palanan </option> 
            <option value="Pangasinan" class="text-black"> Pangasinan </option>
            <option value="Porohanon" class="text-black"> Porohanon </option> 
            <option value="Romblomanon" class="text-black"> Romblomanon </option>
            <option value="Sama Dea" class="text-black"> Sama Dea </option>
            <option value="Sambal" class="text-black"> Sambal </option>
            <option value="Sangil" class="text-black"> Sangil </option> 
            <option value="Subanon" class="text-black"> Subanon </option>
            <option value="Sulodnon" class="text-black"> Sulodnon </option>
            <option value="Surigaonon" class="text-black"> Surigaonon </option>
            <option value="T'boli" class="text-black"> T'boli </option> 
            <option value="Taaw't Bato" class="text-black"> Taaw't Bato </option>
            <option value="Tagabawa" class="text-black"> Tagabawa </option>
            <option value="Tagakaulo" class="text-black"> Tagakaulo </option>
            <option value="Tagalog" class="text-black"> Tagalog </option> 
            <option value="Tagbanwa" class="text-black"> Tagbanwa </option>
            <option value="Talaandig" class="text-black"> Talaandig </option>
            <option value="Tasaday" class="text-black"> Tasaday </option>
            <option value="Tausug" class="text-black"> Tausug </option> 
            <option value="Tedura" class="text-black"> Teduray </option>
            <option value="Ternateño" class="text-black"> Ternateño </option> 
            <option value="Tigwahono" class="text-black"> Tigwahonon </option>
            <option value="Tinguian" class="text-black"> Tinguian </option>
            <option value="Umayamno" class="text-black"> Umayamnon </option>
            <option value="Waray" class="text-black"> Waray </option> 
            <option value="Yakan" class="text-black"> Yakan </option>
            <option value="Yogad" class="text-black"> Yogad </option>
            <option value="Zamboangueño" class="text-black"> Zamboangueño </option>
        </select>
        <label for="floating_ethnicity" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ETHNICITY</label>
    </div>
    
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_name_previous_incumbent" type="text" name="name_previous_incumbent" id="floating_name_previous_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_name_previous_incumbent" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Previous Incumbent</label>
    </div>
    <div class="relative z-0 w-full mb-5 group dark:text-white">
            <select id="select_pub_mode" type="text" name="pub_mode" id="floating_pub_mode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" "  >
                <option selected value="CSC Portal">CSC Portal</option>
                 <option value="N/A" class="text-black">N/A</option>
               <!-- <option value="Female" class="text-black">Female</option>
                <option value="Others" class="text-black">Others</option>
                <option value="N/A" class="text-black">Prefer not to Say</option> -->
                
            </select>
            <label for="floating_pub_mode" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Publication Mode</label>
        </div>
      </div>

    <h2 class="my-5 text-xl font-bold dark:text-white">For Control (For Encoding to PSIPOP)</h2>
    <div id="appointmentDataForm2" class="grid md:grid-cols-2 md:gap-6">
     <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_updating_psiop_online" type="date" name="date_updating_psiop_online" id="floating_date_updating_psiop_online" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_updating_psiop_online" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP ONLINE</label>
    </div>
    
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="input_date_updating_psiop_offline" type="date" name="date_updating_psiop_offline" id="floating_date_updating_psiop_offline" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
      <label for="floating_date_updating_psiop_offline" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP OFFLINE</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_process_ao" type="date" name="date_process_ao" id="floating_date_process_ao" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_process_ao" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATA PROCESSED (For signature to AO V/SDS/ASDS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_posted_fb_mess" type="date" name="date_posted_fb_mess" id="floating_date_posted-fb-mess" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_date_posted-fb-mess" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date Posted in messenger/fb group (For signature of appointee)</label>
    </div>
        
        
        <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_transmitted_to_csc" type="date" name="date_transmitted_to_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE TRANSMITTED TO CSC" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE TRANSMITTED TO CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_received_from_csc" type="date" name="date_received_from_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_DATE RECEIVED FROM CSC" class="peer-focus:font-medium absolute text-xl  text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED FROM CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
    <select id="select_approved" name="approved" id="floating_approved" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
        <option value="N/A">N/A</option>
        <option value="Approved" class="text-black">Approved</option>
        <option value="Disapproved" class="text-black">Disapproved</option>
      </select>
      <label for="floating_approved" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">APPROVED / DISAPPROVED</label>
</div>
<div class="relative z-0 w-full mb-5 group">
        <input id="input_processing_days" type="number" name="processing_days" id="floating_processing_days" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_processing_days" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PROCESSING TIME(DAYS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="input_status" name="status" id="floating_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_status" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="input_action_remarks" type="text" name="action_remarks" id="floating_action_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
            <label for="floating_action_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ACTION / REMARKS</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="input_final_action" name="final_action" id="floating_final_action" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
       
      <label for="floating_final_action" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FINAL ACTION (FOR DISAPPROVED APPOINTMENT ONLY)</label>
      </div>
    </div>
<!-- for No.33 -->
<h2 class="my-5 text-xl font-bold dark:text-white">For No.33-B AFA </h2>
<div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
            <input id="input_vice" type="text" name="vice" id="floating_vice" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_vice" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Vice ( For no.33 AFA Form)</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_position_pub_from" type="date" name="position_pub_from" id="floating_position_pub_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_from" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published from</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_position_pub_to" type="date" name="position_pub_to" id="floating_position_pub_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_position_pub_to" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published to</label>
        </div>
         <div class="relative z-0 w-full mb-5 group">
            <input id="input_deliberation" type="date" name="deliberation_held_on" id="floating_deliberation_held_on" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_deliberation_held_on" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deliberation Held on</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_placement_committe_chair" type="text" name="placement_committe_chair" id="floating_placement_committe_chair" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
            <label for="floating_placement_committe_chair" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chairperson, HRMPSB/Placement Committee</label>
        </div>
   
</div>

<!-- for RAI -->
<h2 class="my-5 text-xl font-bold dark:text-white">For RAI Form </h2>
<div   class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
    <select id="select_rai_month"  name="rai_month" id="floating_rai_month" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
            <option selected disabled >Select Month</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
            </select>
            <label for="floating_rai_month" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">For the Month of</label>
        </div>
</div>
  <!-- for checklist -->

  <h2 class="my-5 text-xl font-bold dark:text-white">For Appointment Processing Checklist</h2>
    <div id="appointmentDataForm3" class="grid md:grid-cols-2 md:gap-6">
        
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_education" type="text"  name="education" id="floating_education" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_education" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_education_remarks" type="text"  name="education_remarks" id="floating_education_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_education_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_daily_compensation" type="text"  name="daily_compensation" id="floating_daily_compensation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_daily_compensation" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Daily Compensation Rate</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_experience" type="text"  name="experience" id="floating_experience" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_experience" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Experience</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_training" type="text"  name="training" id="floating_training" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_training" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Training</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_eligibility_remarks" type="text"  name="eligibility_remarks" id="floating_eligibility_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_eligibility_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Eligibility Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_senior_high_remarks" type="text"  name="senior_high_remarks" id="floating_senior_high_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_senior_high_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Senior HS - Track/Strand Subjects (for DepEd appointments) Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_prov_appt_remarks" type="text"  name="prov_appt_remarks" id="floating_prov_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_prov_appt_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Provisional Appointment Notation for DepEd Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_nature_appt_remarks" type="text"  name="nature_appt_remarks" id="floating_nature_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_nature_appt_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appointment Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_signing_remarks" type="text"  name="date_signing_remarks" id="floating_date_signing_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_date_signing_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Signing Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_cert_vacabt_pos_remarks" type="text"  name="cert_vacabt_pos_remarks" id="floating_cert_vacabt_pos_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_cert_vacabt_pos_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cetification of Publication/Posting of VACANT Position Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group dark:text-white">
    <label for="floating_performace_rating_radio dark:text-white" >Performance Rating in the last period(Promotion or Transfer)</label>
        <div class="w-full flex justify-start items-center p-2 gap-2">    
    <input id="check_performace_rating_radio_yes" type="radio"  name="performace_rating_radio" id="floating_performace_rating_radio"  value="Yes" >
        Yes
        <input id="check_performace_rating_radio_no" type="radio"  name="performace_rating_radio" id="floating_performace_rating_radio"  value="No" >
        No
      </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_performace_rating_remarks" type="text"  name="performace_rating_remarks" id="floating_performace_rating_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_performace_rating_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Performance Rating in the last period(Promotion or Transfer) Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group dark:text-white">
    <label for="floating_justification_radio" >Justification(if the promotion is more than 3 SG)</label>
    <div class="w-full flex justify-start items-center p-2 gap-2">    
        <input id="check_justification_radio_yes" type="radio"  name="justification_radio" id="floating_justification_radio"  value="Yes" >
        Yes
        <input id="check_justification_radio_no" type="radio"   name="justification_radio" id="floating_justification_radio"  value="No" >
        No
      </div>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_justification_remarks" type="text"  name="justification_remarks" id="floating_justification_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
        <label for="floating_justification_remarks" class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Justification(if the promotion is more than 3 SG) Remarks</label>
    </div>
    </div>
    
    <div class="w-full items-center flex flex-wrap sm:justify-end justify-center gap-3 ">
     <button type="button" data-modal-hide="editpopup-modal" class="text-white bg-gray-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-times"></i> Cancel</button>
    <button type="submit"  class="text-white bg-green-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i class="fas fa-check"></i> Save Changes</button>
     </div>
  </form>
  </div>
  @endif