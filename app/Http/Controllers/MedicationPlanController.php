<?php

namespace App\Http\Controllers;

use App\Models\MedicationPlan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MedicationPlanController extends Controller
{
    // public function index()
    // {
    //     $plans = MedicationPlan::where('user_id', auth()->id())
    //         ->orderByRaw("CASE WHEN note LIKE 'DAILY SCHEDULE%' THEN 0 ELSE 1 END") // Show daily medications first
    //         ->orderBy('date')
    //         ->orderBy('time')
    //         ->get();

    //     return view('medication_plan.index', compact('plans'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'medication_name' => 'required',
    //         'dosage' => 'nullable',
    //         'time' => 'required',
    //         'note' => 'nullable',
    //     ]);

    //     // Handle daily scheduling
    //     if ($request->has('frequency') && $request->frequency === 'daily') {
    //         $request->validate([
    //             'start_date' => 'required|date',
    //             'end_date' => 'required|date|after_or_equal:start_date',
    //         ]);

    //         // Format the note with schedule information
    //         $note = "DAILY SCHEDULE\n";
    //         $note .= "From: " . $request->start_date . "\n";
    //         $note .= "To: " . $request->end_date . "\n";
    //         $note .= $request->note ? "\n" . $request->note : '';

    //         MedicationPlan::create([
    //             'user_id' => auth()->id(),
    //             'medication_name' => $request->medication_name,
    //             'dosage' => $request->dosage,
    //             'time' => $request->time,
    //             'note' => trim($note),
    //             'date' => $request->start_date, // Store the start date
    //         ]);

    //         return redirect()->back()->with('success', 'Daily medication schedule added!');
    //     }

    //     // Handle single date
    //     $request->validate([
    //         'date' => 'required|date',
    //     ]);

    //     MedicationPlan::create([
    //         'user_id' => auth()->id(),
    //         'medication_name' => $request->medication_name,
    //         'dosage' => $request->dosage,
    //         'time' => $request->time,
    //         'note' => $request->note,
    //         'date' => $request->date,
    //     ]);

    //     return redirect()->back()->with('success', 'Medication added to your plan!');
    // }



    // In MedicationPlanController.php
    // public function index()
    // {
    //     $plans = MedicationPlan::where('user_id', auth()->id())
    //         ->orderByRaw("CASE WHEN note LIKE 'DAILY SCHEDULE%' THEN 0 ELSE 1 END")
    //         ->orderBy('date')
    //         ->orderBy('time')
    //         ->get()
    //         ->map(function ($plan) {
    //             // Add formatted dates for JavaScript
    //             $plan->formatted_date = \Carbon\Carbon::parse($plan->date)->format('Y-m-d');

    //             // Parse daily schedule if exists
    //             if (str_starts_with($plan->note, 'DAILY SCHEDULE')) {
    //                 $lines = explode("\n", $plan->note);
    //                 $plan->is_daily = true;
    //                 $plan->start_date = trim(str_replace('From:', '', $lines[1] ?? ''));
    //                 $plan->end_date = trim(str_replace('To:', '', $lines[2] ?? ''));
    //             } else {
    //                 $plan->is_daily = false;
    //             }
    //             return $plan;
    //         });

    //     return view('medication_plan.index', compact('plans'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'medication_name' => 'required|string|max:255',
    //         'dosage' => 'nullable|string|max:255',
    //         'time' => 'required|date_format:H:i',
    //         'note' => 'nullable|string',
    //     ]);

    //     if ($request->has('frequency') && $request->frequency === 'daily') {
    //         $request->validate([
    //             'start_date' => 'required|date',
    //             'end_date' => 'required|date|after_or_equal:start_date',
    //         ]);

    //         $note = "DAILY SCHEDULE\nFrom: {$request->start_date}\nTo: {$request->end_date}";
    //         if ($request->note) {
    //             $note .= "\n\n" . $request->note;
    //         }

    //         MedicationPlan::create([
    //             'user_id' => auth()->id(),
    //             'medication_name' => $request->medication_name,
    //             'dosage' => $request->dosage,
    //             'time' => $request->time,
    //             'note' => $note,
    //             'date' => $request->start_date,
    //         ]);

    //         return redirect()->back()->with('success', 'Daily medication schedule added!');
    //     }

    //     $request->validate(['date' => 'required|date']);

    //     MedicationPlan::create([
    //         'user_id' => auth()->id(),
    //         'medication_name' => $request->medication_name,
    //         'dosage' => $request->dosage,
    //         'time' => $request->time,
    //         'note' => $request->note,
    //         'date' => $request->date,
    //     ]);

    //     return redirect()->back()->with('success', 'Medication added to your plan!');
    // }


    //========
    // MedicationPlanController.php

    public function index()
    {
        $plans = MedicationPlan::where('user_id', auth()->id())
            ->orderBy('date')
            ->orderBy('time')
            ->get()
            ->map(function ($plan) {
                // Parse daily schedule if exists
                $isDaily = str_starts_with($plan->note ?? '', 'DAILY SCHEDULE');

                if ($isDaily) {
                    $lines = explode("\n", $plan->note);
                    $plan->is_daily = true;
                    $plan->start_date = trim(str_replace('From:', '', $lines[1] ?? ''));
                    $plan->end_date = trim(str_replace('To:', '', $lines[2] ?? ''));
                } else {
                    $plan->is_daily = false;
                }

                // Format dates consistently
                $plan->formatted_date = \Carbon\Carbon::parse($plan->date)->format('Y-m-d');
                return $plan;
            });

        return view('medication_plan.index', compact('plans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medication_name' => 'required|string|max:255',
            'dosage' => 'nullable|string|max:255',
            'time' => 'required|date_format:H:i',
            'note' => 'nullable|string',
        ]);

        if ($request->has('frequency') && $request->frequency === 'daily') {
            $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            $note = "DAILY SCHEDULE\nFrom: {$request->start_date}\nTo: {$request->end_date}";
            if ($request->note) {
                $note .= "\n\n" . $request->note;
            }

            MedicationPlan::create([
                'user_id' => auth()->id(),
                'medication_name' => $request->medication_name,
                'dosage' => $request->dosage,
                'time' => $request->time,
                'note' => $note,
                'date' => $request->start_date,
            ]);

            return redirect()->back()->with('success', 'Daily medication schedule added!');
        }

        $request->validate(['date' => 'required|date']);

        MedicationPlan::create([
            'user_id' => auth()->id(),
            'medication_name' => $request->medication_name,
            'dosage' => $request->dosage,
            'time' => $request->time,
            'note' => $request->note,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('success', 'Medication added to your plan!');
    }
    public function destroy(MedicationPlan $medicationPlan)
    {
        // Verify the medication belongs to the authenticated user
        if ($medicationPlan->user_id !== auth()->id()) {
            abort(403);
        }

        $medicationPlan->delete();

        return redirect()->back()->with('success', 'Medication removed from your plan!');
    }

    // Helper function to parse daily schedule from note
    public static function parseDailySchedule($note)
    {
        if (!str_starts_with($note, 'DAILY SCHEDULE')) {
            return null;
        }

        $lines = explode("\n", $note);
        if (count($lines) < 3) {
            return null;
        }

        try {
            return [
                'start_date' => trim(str_replace('From:', '', $lines[1])),
                'end_date' => trim(str_replace('To:', '', $lines[2])),
                'note' => count($lines) > 3 ? trim(implode("\n", array_slice($lines, 3))) : null
            ];
        } catch (\Exception $e) {
            return null;
        }
    }
}
