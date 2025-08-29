<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Profile;

class DrugDrugInteraction extends Controller
{
    // public function checkDrugInteractions(Request $request)
    // {
    //     // Get user_id from the request
    //     $userId = $request->input('user_id');

    //     // Fetch profile data from profiles table
    //     $profile = Profile::where('user_id', $userId)->first();

    //     // Ensure the profile exists
    //     if (!$profile) {
    //         return view('profile.drug_warnings', [
    //             'warnings' => [],
    //             'error' => 'Profile not found.'
    //         ]);
    //     }

    //     // Convert data from JSON strings to arrays
    //     $medications = is_string($profile->medications) ? json_decode($profile->medications, true) : ($profile->medications ?? []);
    //     $chronic_conditions = is_string($profile->chronic_conditions) ? json_decode($profile->chronic_conditions, true) : ($profile->chronic_conditions ?? []);
    //     $pregnancy_status = $profile->pregnancy_status ? 'Pregnant' : 'Not Pregnant';

    //     // Ensure medications are not empty
    //     if (empty($medications)) {
    //         return view('profile.drug_warnings', [
    //             'warnings' => [],
    //             'error' => 'No medications entered.'
    //         ]);
    //     }

    //     // Send POST request to Flask API
    //     $response = Http::post('http://127.0.0.1:5000/drug-interactions', [
    //         'medications' => $medications,
    //         'chronic_conditions' => $chronic_conditions,
    //         'pregnancy_status' => $pregnancy_status
    //     ]);

    //     // Check request success
    //     $error = null; // Define $error by default
    //     if ($response->successful()) {
    //         $warnings = $response->json()['warnings'] ?? [];
    //     } else {
    //         $warnings = [];
    //         $error = 'Failed to connect to the drug interaction service.';
    //     }

    //     // Return warnings to be displayed in the view
    //     return view('profile.drug_warnings', compact('warnings', 'error'));
    // }

    public function checkDrugInteractions(Request $request)
    {
        $userId = $request->input('user_id');
        $profile = Profile::where('user_id', $userId)->first();

        if (!$profile) {
            return response()->json([
                'warnings' => [],
                'error' => 'Profile not found.'
            ]);
        }

        $medications = is_string($profile->medications) ? json_decode($profile->medications, true) : ($profile->medications ?? []);
        $chronic_conditions = is_string($profile->chronic_conditions) ? json_decode($profile->chronic_conditions, true) : ($profile->chronic_conditions ?? []);
        $pregnancy_status = $profile->pregnancy_status ? 'Pregnant' : 'Not Pregnant';

        if (empty($medications)) {
            return response()->json([
                'warnings' => [],
                'error' => 'No medications entered.'
            ]);
        }

        $response = Http::post('http://127.0.0.1:5001/drug-interactions', [
            'medications' => $medications,
            'chronic_conditions' => $chronic_conditions,
            'pregnancy_status' => $pregnancy_status
        ]);

        if ($response->successful()) {
            return response()->json([
                'warnings' => $response->json()['warnings'] ?? []
            ]);
        }

        return response()->json([
            'warnings' => [],
            'error' => 'Failed to connect to the drug interaction service.'
        ]);
    }
}
