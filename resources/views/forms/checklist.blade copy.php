@extends('layouts.app')
@section('content')

<div class="w-full h-full flex flex-col">
    <a href="{{ route('download.file', ['filename' => 'APPOINTMENT PROCESSING CHECKLIST.xlsx']) }}"> <button type="button"  class="text-white bg-black hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/2  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <i class="fas fa-download"></i>  Download APPOINTMENT PROCESSING CHECKLIST (Blank)</button></a>
    <h1>APPOINTMENT PROCESSING CHECKLIST</h1>
    
    <form action="" class="w-full" >
        <table class="border-2 border-black table-auto  w-full">
            <tbody id="Checklist" class="*:border-2 *:border-black *:py-5">
            <tr class="*:border-2 *:border-black *:py-5">
                <td class=" border-2 border-black">Name</td>
                <td colspan="11" class="h-full border-2 border-black"><input class="w-full h-full" type="text" value="sample name"></td>
            </tr>
            <tr class="*:border-2 *:border-black *:py-5 text-center w-full">
                <td class=" border-2 border-black"  >Position Title</td>
                <td class=" border-2 border-black" colspan="5"><input type="text" value="sample title"></td>
                <td class=" border-2 border-black">SG/Steps</td>
                <td class=" border-2 border-black w-full h-full" colspan="5"><input type="text" value="sanple step"></td>
            </tr>
            <tr class="border-2 border-black text-center">
                <td>Monthly Compensation</td>
                <td class=" border-2 border-black" colspan="5"><input type="text" value="sample compensation"></td>
                <td >daily Compensation</td>
                <td colspan="5"><input type="text" value="sample daily"></td>
            </tr>
            <tr class="border-2 border-black text-center w-full">
                <td class="w-full">Agency</td>
                <td class="border-2 border-black w-full">DepED - Cavite</td>
                <td colspan="2">Sector:</td>
                <td colspan="5">LGU GOCC NGA SUC</td>
                
            </tr>
            <tr class="border-2 border-black text-center">
                <td></td>
            </tr>
            <tr class="border-2 border-black text-center *:p-4">
                <td>Area</td>
                <td class=" border-2 border-black">Criteria</td>
                <td>Yes</td>
                <td>No</td>
                <td colspan="5">Remarks(provide specific details)</td>
            </tr>
            <tr class="border-2 border-black text-center">
                <td>Qualification Standards</td>
                <td class=" border-2 border-black">1 Education Bachelor's degree majoring in the relevant strand/subject; or any Bachelor's degree with at least 15 units of spcialization  in relevant  strand /subject 
                    
                </td>
                <td><input type="text"></td>
                <td><input type="text"></td>
               
                <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr class="border-2 border-black text-center">
                <td rowspan="5">Does the appointee meet the minimum qualification requirements of the position at the time of issuance of appointment</td>
                <td class=" border-2 border-black">2 experience: <input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr class="border-2 border-black text-center">
                <td class=" border-2 border-black">3 Training: <input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr class="border-2 border-black text-center">
            <tr class="border-2 border-black text-center">
                <td class=" border-2 border-black">4 Eligibility: <input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr class="border-2 border-black text-center">
                <td class=" border-2 border-black">5 Other Requirements(e.g. Age/Residency for LGU DEpt. Heads; Term of Office for SUC President): <input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr class="border-2 border-black text-center">
                <td class=" border-2 border-black"> senior HS-Track/Strand Subjects(for DepEd Appointment) <input type="text"></td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr class="border-2 border-black text-center">
                <td rowspan="20">
                    Common Requirements for Regular Appointments Are the following requirements provide?
                </td>
                <td class=" border-2 border-black">6 Oroginal/ies Appointment(3 copies)</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">6 Oroginal/ies Appointment(3 copies)</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">6 Oroginal/ies Appointment(3 copies)</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">6 Oroginal/ies Appointment(3 copies)</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">6 Oroginal/ies Appointment(3 copies)</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">6 Oroginal/ies Appointment(3 copies)</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">6 Oroginal/ies Appointment(3 copies)</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">6 Oroginal/ies Appointment(3 copies)</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">6 Oroginal/ies Appointment(3 copies)</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
           
            <tr>
                <td class=" border-2 border-black">7 Employment Status</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
                    
            </tr>
            <tr>
                <td class=" border-2 border-black">7 Employment Status</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
                    
            </tr>
            <tr>
                <td class=" border-2 border-black">7 Employment Status</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
                    
            </tr>
            <tr>
                <td class=" border-2 border-black">8 Nature of appointment</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">9 Signature of Appointing Authority</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">10 Date of signing</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">10 Date of signing</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">10 Date of signing</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">10 Date of signing</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">10 Date of signing</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">10 Date of signing</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td rowspan="3">Submission and Effectivity of appointment</td>
                <td class=" border-2 border-black">15 is  the agency accredited</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black"15 is  the agency accredited>15 is  the agency accredited</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
            </tr>
            <tr>
            <td class=" border-2 border-black">15 is  the agency accredited</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5"d><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td rowspan="8">Additional  Requirements in specific  Cases are the following cases applicable</td>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5"d><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">17 With decided administrative/criminal case </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5"d><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">18 Discrepancy in name, date/place of birth </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5"d><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">19 Change of Civil Status on account of:</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5"d><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">i. Marriage - Original Marriage Contract/ Certificate duly authenticated by 
           the Philippine Statistics Authority or the Local Civil Registrar of the 
           municipality /city where the marriage was registered or recorded</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5"d><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">ii. Annulment or Declaration of Nullity of the same - Authenticated copy of 
           the Court Order and Marriage Certificate/Contract with annotation</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5"d><input type="text" value="sample remarks"></td>
            </tr>
            
            <tr>
                <td class=" border-2 border-black">20 Appointments issued by the SUCs under National Budget Circular (NBC) No. 461       * Copy of DBM-approved NOSCA on the reclassification of position based on 
          NBC NO. 461 and SUC Board Resolution approving the same</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">21 Appointment issued for faculty positions/ranks in fields/courses/colleges in SUCs and LUCs where there is dearth of holders of Master's degree in specific fields 
      * Certification issued by CHED that there is dearth of holders of
         Master's degree in specific fields</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td rowspan="14">Additional  Requirements in specific  Cases are the following cases applicable</td>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">17 With decided administrative/criminal case </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">18 Discrepancy in name, date/place of birth </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">16 Erasure or Alternating on the appointment *Certification of Erasure/Alteration on appointment Form(CS.Form no.3,s.2017)signed by the appointing officer/authority or any  authorized official </td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td rowspan="8">Documents submitted </td>
                <td class=" border-2 border-black">28 ORIGINAL COPY OF AUTHENICATED CERTIFICATE OF ELIGIBILITY/RATING/LICENSE- Exept if the ekigibility has been perviously aythenticated in 2004 or onward and recoreded by the CSC</td>
                <td><input type="text"></td>
                <td><input type="text"></td>
                        <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">28 ORIGINAL COPY OF AUTHENICATED CERTIFICATE OF ELIGIBILITY/RATING/LICENSE- Exept if the ekigibility has been perviously aythenticated in 2004 or onward and recoreded by the CSC</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                            <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">28 ORIGINAL COPY OF AUTHENICATED CERTIFICATE OF ELIGIBILITY/RATING/LICENSE- Exept if the ekigibility has been perviously aythenticated in 2004 or onward and recoreded by the CSC</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                            <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">28 ORIGINAL COPY OF AUTHENICATED CERTIFICATE OF ELIGIBILITY/RATING/LICENSE- Exept if the ekigibility has been perviously aythenticated in 2004 or onward and recoreded by the CSC</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                            <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">28 ORIGINAL COPY OF AUTHENICATED CERTIFICATE OF ELIGIBILITY/RATING/LICENSE- Exept if the ekigibility has been perviously aythenticated in 2004 or onward and recoreded by the CSC</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                            <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">28 ORIGINAL COPY OF AUTHENICATED CERTIFICATE OF ELIGIBILITY/RATING/LICENSE- Exept if the ekigibility has been perviously aythenticated in 2004 or onward and recoreded by the CSC</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                            <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black">28 ORIGINAL COPY OF AUTHENICATED CERTIFICATE OF ELIGIBILITY/RATING/LICENSE- Exept if the ekigibility has been perviously aythenticated in 2004 or onward and recoreded by the CSC</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                            <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td class=" border-2 border-black" >28 ORIGINAL COPY OF AUTHENICATED CERTIFICATE OF ELIGIBILITY/RATING/LICENSE- Exept if the ekigibility has been perviously aythenticated in 2004 or onward and recoreded by the CSC</td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td colspan="5" ><input type="text" value="sample remarks"></td>
            </tr>
            <tr>
                <td> CSC FO Recommendation</td>
            </tr>
            <tr>
                <td><input type="checkbox"></td>
            </tr>
            </tbody>
            
        </table>
    </form>
   
    <script type="module" src="{{asset('js/checklist.js')}}"></script>
@endsection
@section('title', 'Checklist')