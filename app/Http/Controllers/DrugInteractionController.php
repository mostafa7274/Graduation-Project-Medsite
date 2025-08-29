<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Cache;

class DrugInteractionController extends Controller
{
    // Show the form where users input drug names
    public function index()
    {
        return view('drug-interaction');
    }

    // Check if two drugs interact
    // public function check(Request $request)
    // {
    //     // Get the drug names from the form
    //     $drug1 = $request->input('drug1');
    //     $drug2 = $request->input('drug2');

    //     // Load the Excel file containing drug data
    //     $filePath = storage_path('app/public/cleaned_data.xlsx'); // adjust the path to your Excel file
    //     $spreadsheet = IOFactory::load($filePath);
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $data = $sheet->toArray();

    //     // Initialize flag to check for interaction
    //     $interactionFound = false;
    //     $message = '';

    //     // Check for drug-drug interaction
    //     foreach ($data as $row) {
    //         $genericName = $row[0];  // assuming Generic name is in the first column
    //         $tradeName = $row[1];    // assuming Trade name is in the second column
    //         $interactsWith = $row[2]; // assuming Interaction data is in the third column

    //         // Match either drug by generic name or trade name
    //         if (($genericName == $drug1 || $tradeName == $drug1) && strpos($interactsWith, $drug2) !== false) {
    //             $interactionFound = true;
    //             $message = "Warning: {$drug1} interacts with {$drug2}. They should not be administered together.";
    //             break;
    //         }

    //         if (($genericName == $drug2 || $tradeName == $drug2) && strpos($interactsWith, $drug1) !== false) {
    //             $interactionFound = true;
    //             $message = "Warning: {$drug2} interacts with {$drug1}. They should not be administered together.";
    //             break;
    //         }
    //     }

    //     // If no interaction was found
    //     if (!$interactionFound) {
    //         $message = "No interaction found between {$drug1} and {$drug2}. They can be administered together.";
    //     }

    //     // Return the result to the view
    //     return view('drug-interaction', ['message' => $message]);
    // }


    // public function check(Request $request)
    // {
    //     // Get the drug names from the form
    //     $drug1 = $request->input('drug1');
    //     $drug2 = $request->input('drug2');

    //     // Load the Excel file containing drug data
    //     $filePath = storage_path('app/public/cleaned_data.xlsx');
    //     $spreadsheet = IOFactory::load($filePath);
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $data = $sheet->toArray();

    //     // Initialize variables
    //     $interactionFound = false;
    //     $message = '';

    //     // Check for drug-drug interaction
    //     foreach ($data as $row) {
    //         $genericName = $row[0];
    //         $tradeName = $row[1];
    //         $interactsWith = $row[2];

    //         // Match either drug by generic name or trade name
    //         if (($genericName == $drug1 || $tradeName == $drug1) && strpos($interactsWith, $drug2) !== false) {
    //             $interactionFound = true;
    //             $message = "Warning: {$drug1} interacts with {$drug2}. They should not be administered together.";
    //             break;
    //         }

    //         if (($genericName == $drug2 || $tradeName == $drug2) && strpos($interactsWith, $drug1) !== false) {
    //             $interactionFound = true;
    //             $message = "Warning: {$drug2} interacts with {$drug1}. They should not be administered together.";
    //             break;
    //         }
    //     }

    //     // If no interaction was found
    //     if (!$interactionFound) {
    //         $message = "No interaction found between {$drug1} and {$drug2}. They can be administered together.";
    //     }

    //     // For AJAX requests
    //     if ($request->ajax()) {
    //         return response()->json([
    //             'message' => $message,
    //             'hasInteraction' => $interactionFound,
    //             'drug1' => $drug1,
    //             'drug2' => $drug2
    //         ]);
    //     }

    //     // For regular form submissions
    //     return view('drug-interaction', [
    //         'message' => $message,
    //         'hasInteraction' => $interactionFound,
    //         'drug1' => $drug1,
    //         'drug2' => $drug2
    //     ]);
    // }


    public function check(Request $request)
    {
        // Get the drug names from the form
        $drug1 = strtolower($request->input('drug1')); // Convert to lowercase
        $drug2 = strtolower($request->input('drug2')); // Convert to lowercase

        // Load the Excel file containing drug data
        $filePath = storage_path('app/public/cleaned_data.xlsx');
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        // Initialize variables
        $interactionFound = false;
        $message = '';
        $originalDrug1 = $request->input('drug1'); // Preserve original casing for display
        $originalDrug2 = $request->input('drug2'); // Preserve original casing for display

        // Check for drug-drug interaction
        foreach ($data as $row) {
            $genericName = strtolower($row[0]); // Convert to lowercase for comparison
            $tradeName = strtolower($row[1]);   // Convert to lowercase for comparison
            $interactsWith = strtolower($row[2]); // Convert to lowercase for comparison

            // Match either drug by generic name or trade name (case-insensitive)
            if (
                (strtolower($genericName) == $drug1 || strtolower($tradeName) == $drug1) &&
                strpos($interactsWith, $drug2) !== false
            ) {
                $interactionFound = true;
                $message = "Warning: {$originalDrug1} interacts with {$originalDrug2}. They should not be taken together.";
                break;
            }

            if (
                (strtolower($genericName) == $drug2 || strtolower($tradeName) == $drug2) &&
                strpos($interactsWith, $drug1) !== false
            ) {
                $interactionFound = true;
                $message = "Warning: {$originalDrug2} interacts with {$originalDrug1}. They should not be taken together.";
                break;
            }
        }

        // If no interaction was found
        if (!$interactionFound) {
            $message = "No interaction found between {$originalDrug1} and {$originalDrug2}. They can be taken together.";
        }

        // For AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'message' => $message,
                'hasInteraction' => $interactionFound,
                'drug1' => $originalDrug1,
                'drug2' => $originalDrug2
            ]);
        }

        // For regular form submissions
        return view('drug-interaction', [
            'message' => $message,
            'hasInteraction' => $interactionFound,
            'drug1' => $originalDrug1,
            'drug2' => $originalDrug2
        ]);
    }

    public function autocompleteCheck(Request $request)
    {
        $query = trim(strtolower($request->input('query')));

        if (empty($query)) {
            return response()->json([]);
        }

        // Cache the Excel data for 1 hour
        $data = Cache::remember('cleaned_data_excel', 3600, function () {
            $filePath = storage_path('app/public/cleaned_data.xlsx');
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            return $sheet->toArray();
        });

        $headers = array_map('strtolower', array_map('trim', $data[0]));
        $rows = array_slice($data, 1);

        // Find column indexes - adjust these based on your cleaned_data.xlsx structure
        $drugNameIndex = array_search('generic name', $headers) ?? 0;
        $tradeNameIndex = array_search('trade name', $headers) ?? 1;
        $interactionsIndex = array_search('interacts with', $headers) ?? 2;

        $suggestions = [];
        $addedValues = [];

        foreach ($rows as $row) {
            // Search in Generic Name column
            if (isset($row[$drugNameIndex])) {
                $drugName = trim(strtolower($row[$drugNameIndex]));
                if (!empty($drugName) && str_contains($drugName, $query) && !in_array($drugName, $addedValues)) {
                    $suggestions[] = [
                        'value' => ucwords($drugName),
                        'type' => 'Generic Name'
                    ];
                    $addedValues[] = $drugName;
                }
            }

            // Search in Trade Name column
            if (isset($row[$tradeNameIndex])) {
                $tradeNames = array_map('trim', explode(',', strtolower($row[$tradeNameIndex])));
                foreach ($tradeNames as $tradeName) {
                    if (!empty($tradeName) && str_contains($tradeName, $query) && !in_array($tradeName, $addedValues)) {
                        $suggestions[] = [
                            'value' => ucwords($tradeName),
                            'type' => 'Brand Name'
                        ];
                        $addedValues[] = $tradeName;
                    }
                }
            }

            // Search in Interactions column (if you want to include these in suggestions)
            if (isset($row[$interactionsIndex])) {
                $interactions = array_map('trim', explode(',', strtolower($row[$interactionsIndex])));
                foreach ($interactions as $interaction) {
                    if (!empty($interaction) && str_contains($interaction, $query) && !in_array($interaction, $addedValues)) {
                        $suggestions[] = [
                            'value' => ucwords($interaction),
                            'type' => 'Interaction'
                        ];
                        $addedValues[] = $interaction;
                    }
                }
            }
        }

        // Sort suggestions alphabetically
        usort($suggestions, function ($a, $b) {
            return strcmp($a['value'], $b['value']);
        });

        return response()->json(array_slice($suggestions, 0, 15));
    }



}

