<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Barryvdh\DomPDF\Facade\Pdf;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Get and process data
        $rawChronicConditions = Profile::pluck('chronic_conditions')->flatten();
        $rawAllergies = Profile::pluck('allergies')->flatten();
        $rawMedications = Profile::pluck('medications')->flatten();

        // Process data for charts
        $topChronicConditions = $this->processData($rawChronicConditions);
        $topAllergies = $this->processData($rawAllergies);
        $topMedications = $this->processData($rawMedications);

        // Get high risk patients
        $highRiskPatients = Profile::with('user')
            ->get()
            ->filter(fn($profile) => $profile->calculateRiskScore() > 7)
            ->sortByDesc(fn($profile) => $profile->calculateRiskScore());

        return view('analytics.index', [
            'topChronicConditions' => $topChronicConditions,
            'topAllergies' => $topAllergies,
            'topMedications' => $topMedications,
            'highRiskPatients' => $highRiskPatients,
            'highRiskPatientsCount' => $highRiskPatients->count(),
            'totalPatients' => Profile::count(),
            'averageRiskScore' => number_format(Profile::all()->avg->calculateRiskScore(), 2)
        ]);
    }

    // public function exportPDF()
    // {
    //     $highRiskPatients = Profile::with('user')
    //         ->get()
    //         ->filter(fn($profile) => $profile->calculateRiskScore() > 7)
    //         ->sortByDesc(fn($profile) => $profile->calculateRiskScore());

    //     if ($highRiskPatients->isEmpty()) {
    //         return back()->with('error', 'No high-risk patients found');
    //     }

    //     $pdf = Pdf::loadView('analytics.report', [
    //         'highRiskPatients' => $highRiskPatients,
    //         'reportDate' => now()->format('F j, Y g:i a')
    //     ]);

    //     return $pdf->download('high_risk_report_' . now()->format('Y-m-d') . '.pdf');
    // }

    //last working one
    // public function exportPDF()
    // {
    //     try {
    //         // 1. Get and filter high-risk patients
    //         $highRiskPatients = Profile::with('user')
    //             ->get()
    //             ->filter(function ($profile) {
    //                 try {
    //                     return $profile->calculateRiskScore() > 7;
    //                 } catch (\Exception $e) {
    //                     \Log::error("Error calculating score for profile {$profile->id}: " . $e->getMessage());
    //                     return false;
    //                 }
    //             })
    //             ->sortByDesc(function ($profile) {
    //                 return $profile->calculateRiskScore();
    //             });

    //         // 2. Handle empty results
    //         if ($highRiskPatients->isEmpty()) {
    //             return response()->json(['error' => 'No high-risk patients found'], 404);
    //         }

    //         // 3. Generate PDF with error handling
    //         $pdf = Pdf::loadView('analytics.report', [
    //             'highRiskPatients' => $highRiskPatients,
    //             'reportDate' => now()->format('F j, Y g:i a')
    //         ]);

    //         // 4. Debugging output (temporary)
    //         \Log::info('PDF generated successfully for ' . $highRiskPatients->count() . ' patients');

    //         return $pdf->download('high_risk_report_' . now()->format('Y-m-d') . '.pdf');

    //     } catch (\Exception $e) {
    //         \Log::error('PDF Generation Failed: ' . $e->getMessage());
    //         return response()->json(['error' => 'PDF generation failed'], 500);
    //     }
    // }

    public function exportPDF()
    {
        try {
            // Get high-risk patients with error handling
            $highRiskPatients = Profile::with('user')
                ->get()
                ->filter(function ($profile) {
                    try {
                        return $profile->calculateRiskScore() > 7;
                    } catch (\Exception $e) {
                        \Log::error("Score calculation failed: " . $e->getMessage());
                        return false;
                    }
                })
                ->sortByDesc(fn($p) => $p->calculateRiskScore());

            if ($highRiskPatients->isEmpty()) {
                throw new \Exception("No high-risk patients found");
            }

            // Generate PDF
            $pdf = Pdf::loadView('analytics.report', [
                'highRiskPatients' => $highRiskPatients,
                'reportDate' => now()->format('F j, Y g:i a')
            ]);

            // Force download with proper headers
            return response()->make(
                $pdf->output(),
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="high_risk_report.pdf"',
                    'Cache-Control' => 'no-store, no-cache',
                    'X-Content-Type-Options' => 'nosniff'
                ]
            );

        } catch (\Exception $e) {
            \Log::error("PDF Export Failed: " . $e->getMessage());

            // Fallback: Return error as JSON if request expects it
            if (request()->wantsJson()) {
                return response()->json([
                    'error' => $e->getMessage(),
                    'success' => false
                ], 500);
            }

            // Otherwise return plain text error
            return response($e->getMessage(), 500);
        }
    }

    private function processData($data)
    {
        return $data->filter()
            ->map(fn($item) => ucfirst(strtolower(trim($item))))
            ->countBy()
            ->sortDesc()
            ->take(5);
    }
}
