<x-modal formAction="update">
    <x-slot name="title">  
    <div class="w-full h-full">
    <h3 class="text-2xl dark:text-black sticky top-0">  Edit Appointment for {{$data->transaction_number}}</h3><br>
    <button class="bg-red-800 text-white" type="button" id="test"><i class="fas fa-save"></i> Save Changes</button>
    </div>   
    </x-slot>

    <input type="text" value="{{ $data->id }}" name="uid">
    <x-slot name="content">
        <div class="grid md:grid-cols-2 md:gap-6 text-black">
      <div class="relative z-0 w-full mb-5 group">
          <input id="Input_lname" type="text" name="lname" id="floating_lname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->lname }}" required />
          <label for="floating_lname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_fname" type="text" name="fname" id="floating_fname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->fname }}"required />
          <label for="floating_fname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First bbbbbb Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_mname" type="text" name="mname" id="floating_mname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->mname }}" required />
          <label for="floating_mname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle Name</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_extname" type="text" name="extname" id="floating_extname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->extname }}"  />
          <label for="floating_extname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Extension Name</label>
      </div>
      
      <div class="relative z-0 w-full mb-5 group ">
          <input id="input_postitle" type="text" name="postitle" id="floating_postitle" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->postitle }}" required />
          <label for="floating_postitle" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Title</label>
      </div>
      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="input_frompos" type="text" name="frompos" id="floating_frompos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->frompos }}"required />
        <label for="floating_frompos" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> Position From</label>
    </div>
      <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="input_topos" type="text" name="topos" id="floating_topos" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->topos }}" required />
        <label for="floating_topos" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position To</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
    <select id="select_salary_grade" type="text" name="salary_grade" id="floating_salary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
            <?php
        $parts = explode('-', $data->salary_grade);
        $grade = $parts[0] . (isset($parts[1]) ? '' : '-'. $parts[1]);
        ?>
        <option value="{{ $grade }}" selected>{{ $grade }}</option>

          <option value="1"> 1 </option>
          <option value="2"> 2 </option>
          <option value="3"> 3 </option> 
          <option value="4"> 4 </option>
          <option value="5"> 5 </option>
          <option value="6"> 6 </option>
          <option value="7"> 7 </option> 
          <option value="8"> 8 </option>
          <option value="9"> 9 </option>
          <option value="10"> 10 </option>
          <option value="11"> 11 </option> 
          <option value="12"> 12 </option>
          <option value="13"> 13 </option>
          <option value="14"> 14 </option>
          <option value="15"> 15 </option> 
          <option value="16"> 16 </option>
          <option value="17"> 17 </option>
          <option value="18"> 18 </option>
          <option value="19"> 19 </option> 
          <option value="20"> 20 </option>
          <option value="21"> 21 </option> 
          <option value="22"> 22 </option>
          <option value="23"> 23 </option>
          <option value="24"> 24 </option>
          <option value="25"> 25 </option> 
          <option value="26"> 26 </option>
          <option value="27"> 27 </option>
          <option value="28"> 28 </option>
          <option value="29"> 29 </option> 
          <option value="30"> 30 </option>
        </select>
        <label for="floating_salary" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary/Job/Pay Grade</label>
</div>
<div class="relative z-0 w-full mb-5 group">
    <select id="select_salary_increment" type="text" name="salary_increment" id="floating_salary_increment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option  value="{{$data->salary_increment }}" selected>{{ $data->salary_increment }}</option>
          <option value="1"> 1 </option>
          <option value="2"> 2 </option>
          <option value="3"> 3 </option> 
          <option value="4"> 4 </option>
          <option value="5"> 5 </option>
          <option value="6"> 6 </option>
          <option value="7"> 7 </option> 
          <option value="8"> 8 </option>
        </select>
        <label for="floating_salary_increment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Salary/Job/Pay Grade Increment</label>
</div>
<!-- <div class="relative z-0 w-full mb-5 group ">
          <input id="input_salary_monthly" type="text" name="salary_monthly" id="floating_salary_monthly" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{ $data->salary_monthly }}" required />
          <label for="floating_salary_monthly" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Monthly Salary</label>
      </div> -->
<div class="relative z-0 w-full mb-5 group">
        <select id="select_appointment_status" type="text" name="appointment_status" id="floating_appointment_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option  value="{{$data->appointment_status }}" selected>{{ $data->appointment_status }}</option>
        <option value="Permanent">Permanent</option>
        <option value="Casual">Casual</option> 
        <option value="Temporary">Temporary</option> 
        <option value="Coterminous">Coterminous</option>
        <option value="Fixed Term">Fixed Term</option>
        <option value="Contractual">Contractual</option> 
        <option value="Substitute">Substitute</option> 
        <option value="Provisional">Provisional</option>
        </select>
        <label for="floating_appointment_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Employee Status</label>
    </div>
    <div class="relative z-0 w-full mb-5 group ">
          <input id="input_office_department" type="text" name="office_department_unit" id="floating_office" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->office_department_unit }}" required />
          <label for="floating_office" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Office/ Department/ Unit</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_compensation_rate_words" type="text" name="compensation_rate_words" id="floating_compensation_rate_words" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->compensation_rate_words }}" required />
          <label for="floating_compensation_rate_words" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month (in words ₱)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_compensation_rate_num" type="number" name="compensation_rate_num" id="floating_compensation_rate_num" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->compensation_rate_num }}" required />
          <label for="floating_compensation_rate_num" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Compensation Rate per month(in numbers ₱)</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="select_appointment_nature" type="text" name="appointment_nature" id="floating_appointment_nature" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
        <option value="{{$data->appointment_nature }}" selected>{{$data->appointment_nature}}</option>
        <option value="Original">Original</option>
        <option value="Promotional">Promotional</option> 
        <option value="Reemployment">Reemployment</option> 
        <option value="Reappointment">Reappointment</option>
        <option value="Reinstatement">Reinstatement</option>
        <option value="Reclassification">Reclassification</option> 
        <option value="Demotion">Demotion</option>
        </select>
        <label for="floating_appointment_nature" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appointment</label>
    </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="select_reason_title" type="text" name="reason_title" id="floating_reason_title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" required >
        <option selected value="{{$data->reason_title }}">{{ $data->reason_title }}</option>
          <option value="Transferred">Transferred</option>
          <option value="Retired">Retired</option>
          <option value="ETC">ETC</option>
          </select>
        <label for="floating_reason_title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Reason Title</label>
    </div>
   
    <div class="relative z-0 w-full mb-5 group">
          <input id="input_plantilla_item_number" type="text" name="plantilla_item_number" id="floating_plantilla_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->plantilla_item_number }}" required >
          
          <label for="cForm"  id="floating_plantilla_item_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Item Number</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
          <input id="input_plantilla_page_number" type="number" name="plantilla_page_number" id="floating_plantilla_page_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->plantilla_page_number }}" required />
          <label for="floating_plantilla_page_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Plantilla Page Number</label>
      </div>
      <div class="relative z-0 w-full mb-5 group">
        <select id="select_sector" type="text" name="sector" id="floating_Sector" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option  value="{{$data->sector }}" selected>{{$data->sector}}</option>
          <option value="LGU - MUNICIPALITY"> LGU - MUNICIPALITY </option>
          <option value="LGU - CITY"> LGU - CITY </option>
          <option value="LGU - PROVINCE"> LGU - PROVINCE </option> 
          <option value="EXECUTIVE - NGA"> EXECUTIVE - NGA </option>
          <option value="EXECUTIVE - LWD"> EXECUTIVE - LWD </option>
          <option value="EXECUTIVE ATTACHED"> EXECUTIVE ATTACHED </option>
          <option value="SUC"> SUC </option>
</select>
<label for="floating_sector" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sector</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="select_name_agency" type="text" name="name_agency" id="floating_agency" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option  value="{{$data->name_agency }}" selected>{{ $data->name_agency }}</option>
          <option value="PGO - Cavite">PGO - Cavite </option>
          <option value="CGO - Bacoor">CGO - Bacoor </option>
          <option value="CGO - Dasmariñas">CGO - Dasmariñas </option> 
          <option value="CGO - Gen. Trias">CGO - Gen. Trias </option>
          <option value="CGO - Imus">CGO - Imus </option>
          <option value="CGO - Trece Martires">CGO - Trece Martires </option>
          <option value="CGO - Tagaytay">CGO - Tagaytay </option>
          <option value="MGO - Alfonso">MGO - Alfonso </option>
          <option value="MGO - Amadeo">MGO - Amadeo </option>
          <option value="MGO Carmon">MGO Carmona </option> 
          <option value="MGO - Gen. E. Aguinaldo">MGO - Gen. E. Aguinaldo </option>
          <option value="MGO - Gen. Mariano Alvarez">MGO - Gen. Mariano Alvarez </option>
          <option value="MGO - Indang">MGO - Indang </option>
          <option value="MGO - Kawit">MGO - Kawit </option>
          <option value="MGO - MAgallanes">MGO - MAgallanes </option>
          <option value="MGO - Maragondon">MGO - Maragondon </option>
          <option value="MGO - Mendez">MGO - Mendez </option> 
          <option value="MGO - Naic">MGO - Naic </option>
          <option value="MGO - Noveleta">MGO - Noveleta </option>
          <option value="MGO - Rosario">MGO - Rosario </option>
          <option value="MGO - Silang">MGO - Silang </option>
          <option value="MGO - Tanza">MGO - Tanza </option>
          <option value="MGO - Ternate">MGO - Ternate </option>
          <option value="Amadeo Water District">Amadeo Water District </option> 
          <option value="Carmona Water District">Carmona Water District </option>
          <option value="Dasmariñas Water District">Dasmariñas Water District </option>
          <option value="Gen. E. Aguinaldo Water Distric">Gen. E. Aguinaldo Water District </option>
          <option value="Gen. M. Alvarez Water District">Gen. M. Alvarez Water District </option>
          <option value="Indang Water District">Indang Water District </option>
          <option value="Maragondon Water District">Maragondon Water District </option>
          <option value="Mendez Water District">Mendez Water District </option> 
          <option value="Silang Water District">Silang Water District </option>
          <option value="Tagaytay Water District">Tagaytay Water District </option>
          <option value="Tanza Water District">Tanza Water District </option>
          <option value="TMC Water District">TMC Water District </option>
          <option value="CAVITE STATE UNIVERSITY - MAIN CAMPUS">CAVITE STATE UNIVERSITY - MAIN CAMPUS </option>
          <option value="CAVITE STATE UNIVERSITY - NAIC CAMPUS">CAVITE STATE UNIVERSITY - NAIC CAMPUS </option>
          <option value="CAVITE STATE UNIVERSITY - ROSARIO CAMPUS">CAVITE STATE UNIVERSITY - ROSARIO CAMPUS </option> 
          <option value="DO-Provicial of Cavite">DO-Provicial of Cavite </option>
          <option value="DO-DepEd Bacoor City">DO-DepEd Bacoor City </option>
          <option value="DO-DepEd Cavite City">DO-DepEd Cavite City </option>
          <option value="DO-DepEd Dasmariñas City">DO-DepEd Dasmariñas City </option>
          <option value="DO-DepEd Gen. Trias City">DO-DepEd Gen. Trias City</option>
          <option value="DO-DepEd Imus City">DO-DepEd Imus City </option>
          <option value="DOH Tagaytay">DOH Tagaytay </option> 
          <option value="DENR-4B">DENR-4B </option>
          <option value="National Irrigation Administration (NIA)">National Irrigation Administration (NIA) </option>
</select>
        <label for="floating_agency" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Agency</label>
    </div>
  
      <div class="relative z-0 w-full mb-5 group">
            <input id="input_odc_number" name="odc_number" type="text" maxlength="12" id="floating_oc_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->odc_number }}" required>
            <label for="floating_oc_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ODC Number</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_received_records_unit" type="date" name="date_received_records_unit" id="floating_date_received_records_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->date_received_records_unit }}" />
            <label for="floating_date_received_records_unit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY RECORDS UNIT</label>
        </div>
       
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_received_hr_unit" type="date" name="date_received_hr_unit" id="floating_date_received_hr_unit" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{ $data->date_received_hr_unit }}" required /> 
    <label for="floating_date_received_hr_unit" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED BY HR UNIT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_school_district" type="text" name="school_district" id="floating_school_district" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{ $data->school_district }}" required />
            <label for="floating_school_district" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SCHOOL/DISTRICT</label>
        </div>
        <!-- <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="cForm" type="number" maxlength="6" name="item_number" id="floating_item_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=""  />
        <label for="floating_item_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ITEM NUMBER </label>

    </div> -->
    <div class="relative z-0 w-full mb-5 group">
            <input id="input_name_incumbent" type="text" name="name_incumbent" id="floating_name_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->name_incumbent  }}" required/> 
    <label for="floating_name_incumbent" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NAME OF INCUMBENT</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <select id="select_floating_sex" type="text" name="sex" id="floating_sex" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required >
                <option value="{{ $data->sex  }}" selected >{{$data->sex}}</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
                <option value="N/A">Prefer not to Say</option>
                
            </select>
            <label for="floating_sex" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SEX</label>
        </div>
        <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
        <input id="input_date_of_birth" type="date" name="date_of_birth" id="floating_date_of_birth" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->date_of_birth  }}" required  />
        <label for="floating_date_of_birth" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF BIRTH</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
            <input id="input_tin_number" type="text" maxlength="12" name="tin_number" id="floating_tin_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->tin_number }}" required /> 
    <label for="floating_tin_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TIN</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_original_appointment" type="date" name="date_original_appointment" id="floating_date_original_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->date_original_appointment  }}" required >

            <label for="floating_date_original_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF ORIGINAL APPOINTMENT</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="input_date_last_promotion" type="date" name="date_last_promotion" id="floating_date_last_promotion" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->date_last_promotion  }}" required /> 
    <label for="floating_date_last_promotion" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF LAST PROMOTION</label> 
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <select id="select_eligibility" type="text" name="eligibility" id="floating_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required >
        <option value="{{ $data->eligibility  }}"selected>{{ $data->eligibility  }}</option>
        <option value="CS-PROF">CS-PROF</option>
        <option value="CS-SUBPROF">CS-SUBPROF</option>
        <option value="PBET">PBET</option> 
        <option value="PD907">PD907</option>
        <option value="CSEE/MATB">CSEE/MATB</option>
        <option value="POLICE OFFICER">POLICE OFFICER</option>
        <option value="POLICE OFFICER I">POLICE OFFICER I</option> 
        <option value="FIRE OFFICER">FIRE OFFICER</option>
        <option value="PENOLOGY OFFICER">PENOLOGY OFFICER</option>
        <option value="SME">SME</option> 
        <option value="BOE">BOE</option>
        <option value="BNS">BNS</option>
        <option value="BHW">BHW</option>
        <option value="EDP SPECIALIST">EDP SPECIALIST</option> 
        <option value="STS">STS</option>
        <option value="RA1080">RA1080</option>
        <option value="APPROPRIATE LICENSE (CAT III)">APPROPRIATE LICENSE (CAT III)</option>
        </select>
        <label for="floating_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type of Eligibity Used</label>
    </div>

        <div class="relative z-0 w-full mb-5 group">
                <input id="input_date_validity_eligibility" type="date" name="date_validity_eligibility" id="floating_date_validity_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"value="{{ $data-> date_validity_eligibility }}" required  /> 
        <label for="floating_date_validity_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF VALIDITY OF ELIGIBILITY</label> 
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <select id="select_first_time_use_eligibility" name="first_time_use_eligibility" id="floating_first_time_use_eligibility" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" ">
                <option value="{{ $data->first_time_use_eligibility  }}" selected> {{$data->first_time_use_eligibility}}</option>    
                <option value="No" selected>No</option>
                    <option value="Yes">Yes</option>
                </select>
                <label for="floating_first_time_use_eligibility" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FIRST TIME USED OF ELIGIBILITY?</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
        <select id="select_position_level"  name="position_level" id="floating_position_level" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required >
            <option selected value="{{ $data->position_level  }}">{{$data->position_level }}</option>
            <option value="1st">1st</option>
            <option value="2nd">2nd</option>
            <option value="3rd">3rd</option>
            </select>
        <label for="floating_position_level" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">POSITION LEVEL</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_status_of_appointment" type="text"  name="status_of_appointment" id="floating_status_of_appointment" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"value="{{ $data->status_of_appointment }}" >
        <label for="floating_status_of_appointment" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS OF APPOINTMENT </label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
       <select id="select_pwd" name="pwd" id="floating_pwd" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " >
        <option value="{{ $data->pwd  }}" selected>{{$data->pwd}}</option>
        <option value="No"selected >No</option>
        <option value="Yes">Yes</option>
       </select>
<label for="floating_pwd" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PWD</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_type_of_disability" type="text"  name="type_of_disability" id="floating_type_of_disability" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"value="{{ $data->type_of_disability  }}" >
        <label for="floating_type_of_disability" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TYPE OF DISABILITIY</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
       <input id="input_member_of_ip_group" type="text"   name="member_of_ip_group" id="floating_member_of_ip_group" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->member_of_ip_group  }}" >
<label for="floating_member_of_ip_group" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MEMBER OF IP GROUP</label> 
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <select id="select_ethnicity"   name="ethnicity" id="floating_ethnicity" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer dark:*:text-black" placeholder=" " required>
            <option value="{{ $data->ethnicity  }}" selected>{{ $data->ethnicity  }}</option>
            <option value="Abaknon"> Abaknon </option>
            <option value="Aeta/Agta"> Aeta/Agta </option>
            <option value="Agutaynon"> Agutaynon </option> 
            <option value="Aklan"> Aklan </option>
            <option value="Ati"> Ati </option>
            <option value="B'laan"> B'laan </option>
            <option value="Badjao"> Badjao </option> 
            <option value="Bago"> Bago </option>
            <option value="Balangao"> Balangao </option>
            <option value="Banguingui"> Banguingui </option>
            <option value="Bantoanon"> Bantoanon </option> 
            <option value="Batak"> Batak </option>
            <option value="Bicolano"> Bicolano </option>
            <option value="Boholano"> Boholano </option>
            <option value="Bolinao"> Bolinao </option> 
            <option value="Bontoc"> Bontoc </option>
            <option value="Bukidnon"> Bukidnon </option>
            <option value="Butuanon"> Butuanon </option>
            <option value="Caluyanon"> Caluyanon </option> 
            <option value="Capiznon"> Capiznon </option>
            <option value="Caviteño"> Caviteño </option> 
            <option value="Cebuano"> Cebuano </option>
            <option value="Cotobateno"> Cotobateno </option>
            <option value="Cuyunon"> Cuyunon </option>
            <option value="Davaoeno"> Davaoeno </option> 
            <option value="Eskaya"> Eskaya </option>
            <option value="Ga'dang"> Ga'dang </option>
            <option value="Gaddang"> Gaddang </option>
            <option value="Giangan"> Giangan </option> 
            <option value="Higaonon"> Higaonon </option>
            <option value="Hiligaynon"> Hiligaynon </option>
            <option value="Ibaloy"> Ibaloy </option>
            <option value="Ibanag"> Ibanag </option> 
            <option value="Ifugao"> Ifugao </option>
            <option value="Ilocano"> Ilocano </option>
            <option value="Ilongot"> Ilongot </option>
            <option value="Inonhan"> Inonhan </option> 
            <option value="Iranun"> Iranun </option>
            <option value="Isnag"> Isnag </option>
            <option value="Itawis"> Itawis </option>
            <option value="Itneg"> Itneg </option> 
            <option value="Ivatan"> Ivatan </option>
            <option value="Iwak"> Iwak </option>
            <option value="Jama Mapun"> Jama Mapun </option>
            <option value="Kagayanen"> Kagayanen </option> 
            <option value="Kalagan"> Kalagan </option>
            <option value="Kalanguya"> Kalanguya </option>
            <option value="Kalinga"> Kalinga </option>
            <option value="Kamayo"> Kamayo </option> 
            <option value="Kamiguin"> Kamiguin </option>
            <option value="Kankanay"> Kankanay </option> 
            <option value="Kapampangan"> Kapampangan </option>
            <option value="Karao"> Karao </option>
            <option value="Karay-a"> Karay-a </option>
            <option value="Kasiguranin"> Kasiguranin </option> 
            <option value="Kolibugan Subanon"> Kolibugan Subanon </option>
            <option value="Magahat"> Magahat </option>
            <option value="Maguidanaon"> Maguidanaon </option>
            <option value="Malaweg"> Malaweg </option> 
            <option value="Mamanwa "> Mamanwa </option>
            <option value="Mandaya"> Mandaya </option>
            <option value="Manguwangan"> Manguwangan </option> 
            <option value="Mangya"> Mangyan </option>
            <option value="Manobo"> Manobo </option>
            <option value="Mansaka"> Mansaka </option>
            <option value="Maranao"> Maranao </option> 
            <option value="Masbateño"> Masbateño </option>
            <option value="Matigsalug"> Matigsalug </option>
            <option value="Molbog"> Molbog </option>
            <option value="Palanan"> Palanan </option> 
            <option value="Pangasinan"> Pangasinan </option>
            <option value="Porohanon"> Porohanon </option> 
            <option value="Romblomanon"> Romblomanon </option>
            <option value="Sama Dea"> Sama Dea </option>
            <option value="Sambal"> Sambal </option>
            <option value="Sangil"> Sangil </option> 
            <option value="Subanon"> Subanon </option>
            <option value="Sulodnon"> Sulodnon </option>
            <option value="Surigaonon"> Surigaonon </option>
            <option value="T'boli"> T'boli </option> 
            <option value="Taaw't Bato"> Taaw't Bato </option>
            <option value="Tagabawa"> Tagabawa </option>
            <option value="Tagakaulo"> Tagakaulo </option>
            <option value="Tagalog"> Tagalog </option> 
            <option value="Tagbanwa"> Tagbanwa </option>
            <option value="Talaandig"> Talaandig </option>
            <option value="Tasaday"> Tasaday </option>
            <option value="Tausug"> Tausug </option> 
            <option value="Tedura"> Teduray </option>
            <option value="Ternateño"> Ternateño </option> 
            <option value="Tigwahono"> Tigwahonon </option>
            <option value="Tinguian"> Tinguian </option>
            <option value="Umayamno"> Umayamnon </option>
            <option value="Waray"> Waray </option> 
            <option value="Yakan"> Yakan </option>
            <option value="Yogad"> Yogad </option>
            <option value="Zamboangueño"> Zamboangueño </option>
        </select>
        <label for="floating_ethnicity" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ETHNICITY</label>
    </div>
    
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_name_previous_incumbent" type="text" name="name_previous_incumbent" id="floating_name_previous_incumbent" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->name_previous_incumbent  }}">
            <label for="floating_name_previous_incumbent" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Previous Incumbent</label>
    </div>
      </div>

    <h2 class="my-5 text-xl font-bold">For Control (For Encoding to PSIPOP)</h2>
    <div id="appointmentDataForm2" class="grid md:grid-cols-2 md:gap-6">
     <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_updating_psiop_online" type="date" name="date_updating_psiop_online" id="floating_date_updating_psiop_online" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->date_updating_psiop_online }}">
            <label for="floating_date_updating_psiop_online" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP ONLINE</label>
    </div>
    
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="input_date_updating_psiop_offline" type="date" name="date_updating_psiop_offline" id="floating_date_updating_psiop_offline" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->date_updating_psiop_offline }}"/>
      <label for="floating_date_updating_psiop_offline" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE OF UPDATING TO PSIPOP OFFLINE</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_process_ao" type="date" name="date_process_ao" id="floating_date_process_ao" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"value="{{ $data->date_process_ao }}">
            <label for="floating_date_process_ao" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATA PROCESSED (For signature to AO V/SDS/ASDS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_posted_fb_mess" type="date" name="date_posted_fb_mess" id="floating_date_posted-fb-mess" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->date_posted_fb_mess }}">
            <label for="floating_date_posted-fb-mess" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date Posted in messenger/fb group (For signature of appointee)</label>
    </div>
        
        
        <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_transmitted_to_csc" type="date" name="date_transmitted_to_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->date_transmitted_to_csc }}">
            <label for="floating_DATE TRANSMITTED TO CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE TRANSMITTED TO CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="input_date_received_from_csc" type="date" name="date_received_from_csc" id="floating_DATE RECEIVED FROM CSC" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{ $data->date_received_from_csc }}">
            <label for="floating_DATE RECEIVED FROM CSC" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE RECEIVED FROM CSC</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
    <select id="select_approved" name="approved" id="floating_approved" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" >
        <option value="{{ $data->approved }}" selected>{{ $data->approved }}</option>
        <option value="Approved">Approved</option>
        <option value="Disapproved">Disapproved</option>
      </select>
      <label for="floating_approved" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">APPROVED / DISAPPROVED</label>
</div>
<div class="relative z-0 w-full mb-5 group">
        <input id="input_processing_days" type="number" name="processing_days" id="floating_processing_days" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->processing_days}}">
            <label for="floating_processing_days" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PROCESSING TIME(DAYS)</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="input_status" name="status" id="floating_status" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->status}}" >
       
      <label for="floating_status" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">STATUS</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
        <input id="input_action_remarks" type="text" name="action_remarks" id="floating_action_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->final_action}}">
            <label for="floating_action_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ACTION / REMARKS</label>
    </div>
    <div class="relative z-0 w-full mb-5 group " data-tooltip-target="tooltip-default">
      <input id="input_final_action" name="final_action" id="floating_final_action" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value="{{$data->final_action}}"  >
       
      <label for="floating_final_action" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FINAL ACTION (FOR DISAPPROVED APPOINTMENT ONLY)</label>
      </div>
    </div>
<!-- for No.33 -->
<h2 class="my-5 text-xl font-bold">For No.33-B AFA </h2>
<div awawawaw  class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="vice" id="floating_vice" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->vice}}" >
            <label for="floating_vice" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Vice ( For no.33 AFA Form)</label>
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_from" id="floating_position_pub_from" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->position_pub_from}}" />
            <label for="floating_position_pub_from" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published from</label>
        </div>

        <!-- dito na ako -->
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="position_pub_to" id="floating_position_pub_to" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->position_pub_to}}"  />
            <label for="floating_position_pub_to" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position Published to</label>
        </div>
        <!-- <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="date" name="deliberation_held_on" id="floating_deliberation_held_on" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
            <label for="floating_deliberation_held_on" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deliberation Held on</label>
        </div> -->
        <div class="relative z-0 w-full mb-5 group">
            <input id="cForm" type="text" name="placement_committe_chair" id="floating_placement_committe_chair" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->placement_committe_chair}}" >
            <label for="floating_placement_committe_chair" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Chairperson, HRMPSB/Placement Committee</label>
        </div>
   
</div>
  <!-- for checklist -->

  <h2 class="my-5 text-xl font-bold">For Appointment Processing Checklist</h2>
    <div id="appointmentDataForm3" class="grid md:grid-cols-2 md:gap-6">
        
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="education" id="floating_education" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->education_remarks}}" >
        <label for="floating_education" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="education_remarks" id="floating_education_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->education_remarks}}">
        <label for="floating_education_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Education Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="daily_compensation" id="floating_daily_compensation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->daily_compensation}}" >
        <label for="floating_daily_compensation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Daily Compensation Rate</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="experience" id="floating_experience" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->experience}}" >
        <label for="floating_experience" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Experience</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="training" id="floating_training" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->training}}" >
        <label for="floating_training" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Training</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="eligibility_remarks" id="floating_eligibility_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->eligibility_remarks}}" >
        <label for="floating_eligibility_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Eligibility Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="senior_high_remarks" id="floating_senior_high_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->senior_high_remarks}}" >
        <label for="floating_senior_high_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Senior HS - Track/Strand Subjects (for DepEd appointments) Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="prov_appt_remarks" id="floating_prov_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->prov_appt_remarks}}" >
        <label for="floating_prov_appt_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Provisional Appointment Notation for DepEd Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="nature_appt_remarks" id="floating_nature_appt_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->nature_appt_remarks}}" >
        <label for="floating_nature_appt_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nature of Appointment Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="date_signing_remarks" id="floating_date_signing_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->date_signing_remarks}}" >
        <label for="floating_date_signing_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Signing Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="cert_vacabt_pos_remarks" id="floating_cert_vacabt_pos_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="{{$data->cert_vacabt_pos_remarks}}">
        <label for="floating_cert_vacabt_pos_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cetification of Publication/Posting of VACANT Position Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
    <label for="floating_performace_rating_radio" >Performance Rating in the last period(Promotion or Transfer)</label>
    <div class="w-full flex justify-start items-center p-2 gap-2">    
    <input id="floating_performace_rating_radio_yes" type="radio" name="performace_rating_radio" value="Yes" {{ $data->performace_rating_radio === "Yes" ? 'checked' : '' }}>
    <label for="floating_performace_rating_radio_yes">Yes</label>
    <input id="floating_performace_rating_radio_no" type="radio" name="performace_rating_radio" value="No" {{ $data->performace_rating_radio === "No" ? 'checked' : '' }}>
    <label for="floating_performace_rating_radio_no">No</label>
</div>

    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="performace_rating_remarks" id="floating_performace_rating_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"  value=" {{$data->performace_rating_remarks}}">
        <label for="floating_performace_rating_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Performance Rating in the last period(Promotion or Transfer) Remarks</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
    <label for="floating_justification_radio" >Justification(if the promotion is more than 3 SG)</label>
    <div class="w-full flex justify-start items-center p-2 gap-2">    
    <input id="floating_justification_radio_yes" type="radio" name="justification_radio" value="Yes" {{ $data->justification_radio === "Yes" ? 'checked' : '' }}>
    Yes
    <input id="floating_justification_radio_no" type="radio" name="justification_radio" value="No" {{ $data->justification_radio === "No" ? 'checked' : '' }}>
    No
    </div>

    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input id="cForm" type="text"  name="justification_remarks" id="floating_justification_remarks" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value=" {{$data->justification_remarks}}" >
        <label for="floating_justification_remarks" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Justification(if the promotion is more than 3 SG) Remarks</label>
        

    </div>
    </x-slot>

    <x-slot name="buttons">
       
    </x-slot>
</x-modal>
@script
    <script>
        const test = document.getElementById('test')
        tes
        const test = ()=>{
            console.log('fire')
        }
    </script>
@endscript