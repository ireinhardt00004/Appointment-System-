<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CheckEmailForVerificationController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\PrintFormController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransmittalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\CSCControlFormController;
use App\Http\Controllers\No33BAFAController;
use App\Http\Controllers\RaiController;
use App\Http\Controllers\AppointmentFormController;
use App\Http\Controllers\PSIPOPController;
use App\Http\Controllers\AppChecklistController;
use App\Http\Controllers\NoteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//test email verification
Route::get('/test-email', function() {
    return view('auth.verify-email');
});
Route::get('/app', function() {
    return view('pdf.Control (for encoding to PSIPOP)');
});



//CHECK DATABASE CONNECTION
Route::get('/test-db-connection', function () {
    try {
        DB::connection()->getPdo();
        return "Database connection established!";
    } catch (\Exception $e) {
        return "Could not connect to the database. Error: " . $e->getMessage();
    }
});
// Route::get('/test-419' ,function(){return view('errors.419');  });
      Route::get('/test-401' ,function(){return view('errors.401');  });
      //Route::get('/test-403' ,function(){return view('errors.403');  });
      Route::get('/pdf' ,function(){return view('pdf.Cs-Form-33');  });
      Route::get('/pdf/copy' ,function(){return view('pdf.CS-Form-33-Copy-ng-Copy-ng-latest');  });
      Route::get('/pdf-trans' ,function(){return view('pdf.transmittalsz');  });
      Route::get('/pdf-app' ,function(){return view('pdf.APC5');  });
    
 //SENDING MAIL FOR EMAIL VERIFICATION
 Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/check-email-for-verification', [CheckEmailForVerificationController::class, 'show'])
        ->name('verification.notice');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

    
//USER ONLY ROUTE
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user-table',[UserController::class,'index'])->name('user.table');
    //register new user
    Route::post('/register-user',[UserController::class,'register'])->name('user.register');
    //search users on the table
    Route::get('/users-table/search', [UserController::class, 'search'])->name('users-table.search');
    //DELETE USER ACCOUNT
    Route::delete('/remove-user',[AdminController::class,'removeUserAccount'])->name('delete-user-account');
    //change user credential
    Route::post('/update-user',[AdminController::class,'updateUserAccount'])->name('update-user-account');
    //get users log
    Route::get('/users-logs',[ActivityLogController::class,'adminUserLogs'])->name('users.logs');
    //download all users log
    Route::get('/download-userslog',[ActivityLogController::class,'downloadAllActivityLogs'])->name('download.users-log');
    //clear cache
    Route::get('/clear-cache', [AdminController::class, 'clearCache'])->name('clearCache');
    Route::get('/export-all-data',[AppointmentFormController::class,'downloadAllData'])->name('export-all.appointments');
    // Route::get('/class-sport/{sport_id}',[UserController::class,'index'])->name('sport-page');

    //Route::post('/user-store/{id}',[UserController::class,'storeUserData'])->name('athlete-credentials');

});
Route::middleware('auth','verified')->group(function () {
    Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

    //Appontment Form
    //MONITOR
    Route::get('/appointment-form', [AppointmentFormController::class,'index'])->name('appointment.index');
    //search
    Route::get('/search-appointment', [AppointmentFormController::class,'search'])->name('appointment.search');
    //submit appointment
    Route::post('/submit-appointment',[AppointmentFormController::class,'submit'])->name('submit.appointment');
    Route::delete('/delete-appointment',[AppointmentFormController::class,'delete'])->name('delete.appointment');
    //restore appointment softdelete
    Route::put('/appointment/restore', [AppointmentFormController::class,'restore'])->name('appointment.restore');
    //delete permanently appointment
    Route::delete('/appointment/delete-permanently', [AppointmentFormController::class,'deletePermanently'])->name('appointment.delete-permanently');
   
    //export xlsx of PSIPOP
    Route::post('/export-psipop-control-form',[PSIPOPController::class,'downloadPSIPOPExcelFile'])->name('export.psipop');
    //export xlsx of transmittal of Appointee
    Route::post('/download-excel-transmittal', [AppointmentFormController::class,'downloadTransmittalExcelFile'])->name('export.transmittal');
    //export excel of rai 
    Route::post('/export-excel-RAI', [RaiController::class,'downloadRaiExcelFile'])->name('export-excel.rai');

    //export xlsx of control form csc
     Route::post('/export-control-form-csc',[CSCControlFormController::class,'downloadControlCSCFExcelFile'])->name('export.control-csc');
   
    //ex[prt xlsx of checklist appointment
    Route::get('/export-excel-checklist/{id}',[AppChecklistController::class,'downloadChecklistExcelFile'])->name('export-excel.checklist');
    //Route::get('/export-transmittal-of-appointee',[AppointmentFormController::class,'exportTransmittal'])->name('export.transmittal');
    //appointment row fetch data
    Route::post('/fetch-data-check',[AppointmentFormController::class, 'fetchData']); 
    //edit appointment
    Route::put('/update-appointment',[AppointmentFormController::class,'update'])->name('update.appointment'); 
    //fetch appointment data
    Route::get('/get-appointment-data/{id}', [AppointmentFormController::class, 'getAppointmentData'])->name('appointment.ajax');
    
    //backup
   // Route::get('/export-control-form-csc',[AppointmentFormController::class,'exportControlFormCSC'])->name('export.control-csc');
    
    
    
    //saved note
    Route::post('save-note',[NoteController::class,'submit'])->name('note.store');
    //update note
    Route::put('/notes/{note}', [NoteController::class, 'updateNote'])->name('note.update');
    //delete note
    Route::post('/delete-note', [NoteController::class, 'deleteNote'])->name('note.delete');
    Route::get('/notes/ajax', [NoteController::class, 'getNotesAjax'])->name('notes.ajax');
    

    
//     //FORMS
 Route::get('/no-33-B-A-F-A', [FormController::class,'formOne'])->name('form.one');
   //submit  No33BAFA form
 //  Route::post('/post-no33B-AFAForm',[No33BAFAController::class,'store'])->name('store.no33-BAFA-form');
// //     //PDF VIEWER

     Route::get('/pdf/{id}',[No33BAFAController::class,'pdf'])->name('view.no33pdf');
// //  Route::delete('/delete-no33AFA{id}',[No33BAFAController::class,'delete'])->name('delete.no-33');
// //     //restore transmittal softdelete
// //     Route::put('/no33/{id}/restore', [No33BAFAController::class,'restoreDeleted'])->name('no-33.restore');
// //     //delete permanently transmittal 
// //     Route::delete('/no33/{id}/delete-permanently', [No33BAFAController::class,'deletePermanently'])->name('no-33.delete-permanently');
// //       //Search no.33
// //     Route::get('/no.33-table/search', [No33BAFAController::class, 'search'])->name('no.33-table.search');
// //     //export as csv
// //     Route::get('/export-csv-no33',[No33BAFAController::class,'downloadNo33'])->name('export-csv.no33');

//     //MONITOR
//     Route::get('/monitor-table', [MonitorController::class,'index'])->name('monitor.index');
    
//     //Control (For Encoding to PSIPOP)
    Route::get('/Control-For-Encoding-to-PSIPOP',[FormController::class,'ControlPSIPOP'])->name('control.psipop');
//     //submit control psipop form
//     Route::post('/submit-psipop',[PSIPOPController::class,'submit'])->name('store.control-psiop');
//     //delete control psipop
//     Route::delete('/delete-control-psipop{id}',[PSIPOPController::class,'delete'])->name('delete.control-psipop');
//     //restore control psipop softdelete
//     Route::put('/control-psipop/{id}/restore', [PSIPOPController::class,'restore'])->name('control-psipop.restore');
//     //delete control psipop rai 
//     Route::delete('/control-psipop/{id}/delete-permanently', [PSIPOPController::class,'deletePermanently'])->name('control-psipop.delete-permanently');
//     //search psipop
//     Route::get('/search-control-psipop',[PSIPOPController::class,'search'])->name('search.control-psipop');
//     //export as csv
//     Route::get('/export-data-control-psipop',[PSIPOPController::class,'downloadPSIPOP'])->name('export.control-psipop');
    
//     // try
//     Route::get('/view-con-psipop',[PSIPOPController::class,'view'])->name('view.psipop');
//     Route::get('/get-pdf-conpsipop',[PSIPOPController::class,'exportToPDF'])->name('pdf.psipop');

//     //Checklist
     Route::get('/checklist',[FormController::class,'checkList'])->name('checklist.index');
    
    
//     //RAI Form
    Route::get('/RAI-form',[FormController::class,'rai'])->name('rai.index');
//     Route::post('/store-rai',[RaiController::class,'submit'])->name('rai.store');
//     //delete transmittal row
//     Route::delete('/delete-rai{id}',[RaiController::class,'delete'])->name('delete.rai');
//     //restore rai softdelete
//     Route::put('/rai/{id}/restore', [RaiController::class,'restore'])->name('rai.restore');
//     //delete permanently rai 
//     Route::delete('/rai/{id}/delete-permanently', [RaiController::class,'deletePermanently'])->name('rai.delete-permanently');
//     Route::get('/search-rai',[RaiController::class,'search'])->name('search.rai');
//     //export csv
//     Route::get('/export-csv-rai',[RaiController::class,'downloadRai'])->name('export.rai');
//     //view rai excel
//     Route::get('/get-rai',[RaiController::class,'getPDF'])->name('get.rai');

//     //Transmittal of Appointee
     Route::get('/transmittal-of-appointee',[FormController::class,'transmittal'])->name('transmittal.index');
//     //submitting trasnmittal of Appointee form
//     Route::post('/save-transmittal',[TransmittalController::class,'submit'])->name('store.transmittal');
//     //save transmittal table
//     Route::get('/download-transmittal-table',[TransmittalController::class,'downloadTransmittal'])->name('download.transmittal-table');
//     //delete transmittal row
//     Route::delete('/delete-transmittal{id}',[TransmittalController::class,'delete'])->name('delete.transmittal');
//     //restore transmittal softdelete
//     Route::put('/transmittals/{id}/restore', [TransmittalController::class,'restoreTransmittal'])->name('transmittals.restore');
//     //delete permanently transmittal 
//     Route::delete('/transmittals/{id}/delete-permanently', [TransmittalController::class,'deletePermanently'])->name('transmittals.delete-permanently');
//     Route::get('/search-transmittal',[TransmittalController::class,'search'])->name('search.transmittal');
//     //download blank transmittal
//     Route::get('/download-transmittal/{filename}', [DownloadController::class,'download'])->name('download.file');
//     Route::get('/export-trans',[TransmittalController::class,'exportTrans'])->name('export.trans');

//     //Control Form (CSC FO Cavite) (Blank)
    Route::get('/Control-Form-CSC-FO-Cavite',[FormController::class,'controlFormCSC'])->name('controlFormCSC.index');
//     // preview control form csc
//     Route::get('/csc-control',[CSCControlFormController::class,'index'])->name('preview-csc-control');
//     //export as pdf
//     Route::get('/export-csc-control',[CSCControlFormController::class,'export'])->name('export-csc-control-form');
//      //restore transmittal softdelete
//      Route::put('/csc-control/{id}/restore', [CSCControlFormController::class,'restore'])->name('csc-control.restore');
//      //delete permanently transmittal 
//      Route::delete('/control-form/{id}/delete-permanently', [CSCControlFormController::class,'deletePermanently'])->name('csc-control.delete-permanently');
//      Route::get('/search-control-form',[CSCControlFormController::class,'search'])->name('search.csc-control');
    
//     //activity log
    Route::get('/activity-logs',[ActivityLogController::class, 'index'])->name('logs.index');
    Route::delete('/clear-logs',[ActivityLogController::class,'clearLogs'])->name('clear.logs');
    Route::get('/download-csv', [ActivityLogController::class,'downloadActivityLogs'])->name('download-activity-logs');
    Route::delete('/delete-logs{id}',[ActivityLogController::class,'destroy'])->name('delete.log');
    
//     //SAVE FORM
//     Route::post('/store-csc-form',[PrintFormController::class, 'storeCSCControl'])->name('store.control-csc-form');
//     //DOWNLOAD FORM
//     Route::get('/download-csc-form',[PrintFormController::class, 'downloadAllCSC'])->name('download.control-csc-form');
//     //Search
//     Route::get('/csc-table/search', [FormController::class, 'search'])->name('csc-table.search');
//     //delete row on csc control table
//     Route::delete('delete-csc-row/{id}',[FormController::class, 'deleteCSC'])->name('delete.csc-form');
        

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
