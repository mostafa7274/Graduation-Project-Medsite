<?php


namespace App\Http\Controllers\user;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user() ?? null;
        return view('profile.index', compact('user')); //compact('user')
        //This is a PHP function that takes a variable name as a string and creates an associative array using the variable.

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = auth()->user();

        // Check if user exists first
        if (!$user) {
            return redirect()->route('login')->with('error', 'Please log in to view your profile.');
        }

        $profile = $user->profile;

        if (!$profile) {
            return redirect()->route('profile.create')->with('error', 'Profile not found. Please create one.');
        }

        return view('profile.show', compact('profile'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female,other',
            'date_of_birth' => 'nullable|date',
            'phone_number' => 'nullable|string|max:20',
            'blood_type' => 'nullable|string|max:3',
            'allergies' => 'nullable|string', // Will be exploded into array
            'chronic_conditions' => 'nullable|string',
            'medications' => 'nullable|string',
            'prescription' => 'nullable|string',
            'pregnancy_status' => 'nullable|in:0,1',//
            'weight' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'notes' => 'nullable|string'
        ]);

        $profile = $user->profile ?: new Profile(['user_id' => $user->id]);
        $profile->user_id = $user->id;
        $profile->full_name = $validatedData['full_name'];
        $profile->gender = $validatedData['gender'];
        $profile->date_of_birth = $validatedData['date_of_birth'];
        $profile->phone_number = $validatedData['phone_number'];
        $profile->blood_type = $validatedData['blood_type'];

        // Convert comma-separated strings to arrays, then JSON encode
        $profile->allergies = $request->allergies ? explode(',', $request->allergies) : [];
        $profile->chronic_conditions = $request->chronic_conditions ? explode(',', $request->chronic_conditions) : [];
        $profile->medications = $request->medications ? explode(',', $request->medications) : [];
        $profile->prescription = $request->prescription ? explode(',', $request->prescription) : [];

        // $profile->pregnancy_status = $validatedData['pregnancy_status'];
        $profile = $user->profile ?: new Profile(['user_id' => $user->id]);

        // Handle pregnancy_status: set to null for male users or if not provided
        $profile->pregnancy_status = ($validatedData['gender'] === 'male' || !isset($validatedData['pregnancy_status'])) ? null : $validatedData['pregnancy_status'];

        $profile->weight = $validatedData['weight'];
        $profile->height = $validatedData['height'];
        $profile->notes = $validatedData['notes'];

        $profile->save();

        return redirect()->route('home')->with('success', 'Profile saved successfully.');

    }


    // public function update(Request $request)
    // {
    //     $user = auth()->user();

    //     $validatedData = $request->validate([
    //         'full_name' => 'required|string|max:255',
    //         'gender' => 'nullable|in:male,female,other',
    //         'date_of_birth' => 'nullable|date',
    //         // ... (keep your existing validation rules)
    //     ]);

    //     try {
    //         $profile = $user->profile ?: new Profile(['user_id' => $user->id]);

    //         // Update profile fields
    //         $profile->fill([
    //             'user_id' => $user->id,
    //             'full_name' => $validatedData['full_name'],
    //             'gender' => $validatedData['gender'],
    //             // ... (other fields)
    //         ]);

    //         // Handle array fields
    //         $arrayFields = ['allergies', 'chronic_conditions', 'medications', 'prescription'];
    //         foreach ($arrayFields as $field) {
    //             $profile->$field = $request->$field ? explode(',', $request->$field) : [];
    //         }

    //         $profile->save();

    //         // Return JSON response for AJAX, redirect for normal requests
    //         if ($request->wantsJson() || $request->ajax()) {
    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Profile updated successfully',
    //                 'profile' => $profile
    //             ]);
    //         }

    //         return redirect()->route('profile.show')->with('success', 'Profile saved successfully.');

    //     } catch (\Exception $e) {
    //         if ($request->wantsJson() || $request->ajax()) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Error updating profile: ' . $e->getMessage()
    //             ], 500);
    //         }

    //         return back()->with('error', 'Error updating profile: ' . $e->getMessage());
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
