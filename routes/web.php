<?php

use App\Http\Controllers\FloatingChatbotController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\patientController;
use App\Http\Controllers\user\profileController;
use App\Http\Controllers\DrugImportController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\MedicationPlanController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\DrugInteractionController;
use App\Http\Controllers\MedicationSafetyController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\MedicalReportController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\SendSms;
use App\Http\Controllers\DrugDrugInteraction;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/welcomee', function () {
//     return view('welcomee.welcomee');
// });



Route::get('/login-register', function () {
    return view('custom_auth.loginRegister');
})->name('custom.login.register');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('patient', [patientController::class, 'index'])->name('test');
//Route::get('/', [DrugInteractionController::class, 'index']);
// Route::get('/drug-interaction-checker', [DrugInteractionController::class, 'index']);
// Route::post('/drug-interaction-checker', [DrugInteractionController::class, 'check']);

//=========================================================================================//
//REMINDER !! --> switch to this format to make it authenticated.
//=========================================================================================//
Route::middleware(['auth'])->group(function () {
    Route::get('/drug-interaction-checker', [DrugInteractionController::class, 'index']);
    Route::post('/drug-interaction-checker', [DrugInteractionController::class, 'check']);

});


Route::get('/autocomplete-check', [DrugInteractionController::class, 'autocompleteCheck'])->name('autocomplete-check');
//=========================================================================================//



Route::post('/check', [DrugInteractionController::class, 'check'])->name('check-interaction');
Route::middleware(['auth'])->group(function () {
    Route::get('/medication-checker', [MedicationSafetyController::class, 'index']);
    Route::post('/medication-checker', [MedicationSafetyController::class, 'check']);
    Route::get('/autocomplete', [MedicationSafetyController::class, 'autocomplete'])->name('drug.autocomplete');
});

Route::get('/test-autocomplete', function () {
    $controller = new App\Http\Controllers\MedicationSafetyController();
    return $controller->autocomplete(new Illuminate\Http\Request(['term' => 'asp']));
});

// Route::get('user/profile' , [App\Http\Controllers\user\profileController::class, 'index'])->name('user.profile')->middleware('auth');


//=========================================================================================//
//PROFILE
//=========================================================================================//
// middleware w prefix 3bara 3an keys
Route::group(['middleware' => ['auth', 'profile'], 'prefix' => 'profile'], function () {

    //profile controller
    Route::get('/', [ProfileController::class, 'index'])->name('profile');
    Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
});
//=========================================================================================//



Route::get('/import-drugs', [DrugImportController::class, 'showImportForm']);
Route::post('/import-drugs', [DrugImportController::class, 'import']);



// //=====
// Route::view('/chatbot', 'chatbot');
// Route::post('/chatbot', [ChatbotController::class, 'respond']);
// Route::get('/floating-chatbot', [FloatingChatbotController::class, 'index'])->name('floating-chatbot');
// //========





// Existing routes (updated)
Route::view('/chatbot', 'chatbot')->name('chatbot');  // Added ->name('chatbot')
Route::post('/chatbot', [ChatbotController::class, 'respond'])->name('chatbot.send');

// Floating chatbot route (keep this as is)
Route::get('/floating-chatbot', [FloatingChatbotController::class, 'index'])->name('floating-chatbot');












// Route::middleware(['auth'])->group(function () {
//     Route::get('/medication-plan', [MedicationPlanController::class, 'index'])->name('medication-plan.index');
//     Route::post('/medication-plan', [MedicationPlanController::class, 'store'])->name('medication-plan.store');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/medication-plan', [MedicationPlanController::class, 'index'])->name('medication-plan.index');
    Route::post('/medication-plan', [MedicationPlanController::class, 'store'])->name('medication-plan.store');
    Route::delete('/medication-plan/{medicationPlan}', [MedicationPlanController::class, 'destroy'])
        ->name('medication-plan.destroy');
});


Route::get('send-mail', [EmailController::class, 'sendWelcomeEmail']);



//==========================================================================================//
//Welcome
//==========================================================================================//
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/welcome', [WelcomeController::class, 'original']);
//==========================================================================================//


//==========================================================================================//
//Logout
//==========================================================================================//
Auth::routes(['logout' => false]); // Disables Laravel's default logout

// Add this after Auth::routes()
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Keep this login-register route (your custom view)
Route::get('/login-register', function () {
    return view('custom_auth.loginRegister');
})->name('login-register');
//==========================================================================================//






// Chat Page
Route::view('/chat', 'chat')->name('chat');

// Chat Submission
Route::post('/chat', function (Request $request) {
    $userMessage = $request->input('user_message');

    // Load existing chat history
    $messages = session('chat_history', []);
    $messages[] = ['role' => 'user', 'content' => $userMessage];

    // Send to Groq API
    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . config('services.groq.api_key'),
        'Content-Type' => 'application/json',
    ])->post(config('services.groq.endpoint'), [
                'model' => 'llama3-8b-8192',
                'messages' => array_merge(
                    [['role' => 'system', 'content' => 'You are a helpful medical assistant.']],
                    $messages
                ),
                'temperature' => 0.5,
            ]);

    $result = $response->json();
    $assistantMessage = $result['choices'][0]['message']['content'] ?? '⚠️ No content returned.';
    $messages[] = ['role' => 'assistant', 'content' => $assistantMessage];

    // Save updated chat history
    session(['chat_history' => $messages]);

    return redirect()->route('chat');
})->name('chat.submit');

// Optional: Clear Chat History
Route::post('/chat/clear', function () {
    session()->forget('chat_history');
    return redirect()->route('chat');
})->name('chat.clear');


Route::get('/test-groq', function () {
    try {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.groq.api_key'),
            'Content-Type' => 'application/json',
        ])->post(config('services.groq.endpoint'), [
                    'model' => 'llama3-8b-8192',
                    'messages' => [
                        ['role' => 'system', 'content' => 'You are a helpful assistant'],
                        ['role' => 'user', 'content' => 'Hello']
                    ],
                    'temperature' => 0.5
                ]);

        return $response->json();
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});


Route::get('/check-config', function () {
    return [
        'api_key' => config('services.groq.api_key'),
        'endpoint' => config('services.groq.endpoint'),
        'is_api_key_set' => !empty(config('services.groq.api_key')),
        'is_endpoint_set' => !empty(config('services.groq.endpoint'))
    ];
});


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');
    Route::get('/analytics/export/pdf', [AnalyticsController::class, 'exportPDF'])->name('analytics.export.pdf');

});


Route::get('admin/dashboard/home', function () {
    $users = App\Models\User::select(['id', 'name', 'email', 'created_at'])
        ->orderBy('created_at', 'desc')
        ->get();
    return view('admin.home', compact('users'));
})->name('admin.dashboard.home');

Route::get('users/{user}/profile', [ProfileController::class, 'show'])
    ->name('users.profile.show');

// routes/web.php
// Route::get('/test-pdf', function () {
//     return PDF::loadHTML('<h1>Test PDF</h1><p>If you see this, PDF generation works!</p>')->stream();
// });

Route::get('/check-patient', function () {
    $patient = \App\Models\Profile::where('full_name', 'user5')->first();
    dd([
        'patient' => $patient,
        'calculated_score' => $patient->calculateRiskScore()
    ]);
});

Route::get('/more', function () {
    return view('more');
});


// // el routes bta3et el medical reports
// Route::view('/upload-report', 'medical_reports.upload');
// Route::post('/explain-report', [MedicalReportController::class, 'explain'])->name('explain.report');

// Show upload form
Route::get('/upload', [MedicalReportController::class, 'showForm'])->name('upload.form');
Route::post('/explain', [MedicalReportController::class, 'explain'])->name('explain.report');
Route::get('/results', [MedicalReportController::class, 'showResults'])->name('results');
Route::post('/reprocess', [MedicalReportController::class, 'reprocess']);

// el routes bta3et google
Route::get('auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);


// Add to routes/web.php
Route::get('/test-email', function () {
    try {
        Mail::raw('Test content', function ($message) {
            $message->to('irinieeid0@gmail.com')
                ->subject('SMTP Test');
        });
        return "Email sent! Check inbox/spam.";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/send-sms', [SendSms::class, 'showForm'])->name('send-sms.send-sms')->middleware('auth:admin');
Route::post('/send-sms', [SendSms::class, 'send'])->name('send-sms.send')->middleware('auth:admin');


Route::post('/check-drug-interactions', [DrugDrugInteraction::class, 'checkDrugInteractions'])->name('check.drug.interactions');



