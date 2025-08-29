<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class MedicationSafetyController extends Controller
{
    public function index()
    {
        return view('medication-checker');
    }

    //new one i made
    // public function check(Request $request)
    // {
    //     $user = Auth::user();
    //     $profile = $user->profile;

    //     if (!$profile) {
    //         return view('medication-checker', [
    //             'message' => 'Please complete your health profile before checking medications. This helps us provide accurate safety information.',
    //             'status' => 'error'
    //         ]);
    //     }

    //     $drugInput = strtoupper(preg_replace('/\s+/', '', $request->input('drug_name')));

    //     $age = \Carbon\Carbon::parse($profile->date_of_birth)->age;
    //     $gender = strtolower($profile->gender);
    //     $pregnant = $profile->pregnancy_status;
    //     $allergies = array_map('strtolower', $profile->allergies ?? []);
    //     $conditions = array_map('strtolower', $profile->chronic_conditions ?? []);
    //     $medications = is_array($profile->medications)
    //         ? array_map('strtolower', array_map('trim', $profile->medications))
    //         : array_map('strtolower', array_map('trim', explode(',', $profile->medications ?? '')));

    //     $drugFiles = [
    //         storage_path('app/public/Drugss.xlsx'),
    //     ];

    //     $matchedDrugs = [];
    //     $sourceFiles = [];
    //     $allInteractions = [];

    //     foreach ($drugFiles as $filePath) {
    //         if (!file_exists($filePath)) {
    //             Log::warning("Drug database file not found: " . basename($filePath));
    //             continue;
    //         }

    //         try {
    //             $spreadsheet = IOFactory::load($filePath);
    //             $sheet = $spreadsheet->getActiveSheet();
    //             $data = $sheet->toArray(null, true, true, true);
    //             $headers = array_map('strtolower', $data[1]);
    //             $rows = array_slice($data, 2);

    //             foreach ($rows as $row) {
    //                 $rowData = array_combine($headers, $row);
    //                 $drugName = strtoupper(preg_replace('/\s+/', '', $rowData['drug name'] ?? ''));
    //                 $tradeName = strtoupper(preg_replace('/\s+/', '', $rowData['trade name'] ?? ''));
    //                 $interactions = array_map('strtoupper', array_map('trim', explode(',', $rowData['drug interactions'] ?? '')));

    //                 if ($drugName === $drugInput || $tradeName === $drugInput) {
    //                     $matchedDrugs[] = $rowData;
    //                     $sourceFiles[] = basename($filePath);
    //                 }

    //                 if (in_array($drugInput, $interactions)) {
    //                     $allInteractions[] = [
    //                         'primary_drug' => $drugName,
    //                         'interaction_type' => $rowData['drug interactions'] ?? ''
    //                     ];
    //                 }
    //             }
    //         } catch (\Exception $e) {
    //             Log::error("Error reading drug file " . basename($filePath) . ": " . $e->getMessage());
    //             continue;
    //         }
    //     }

    //     $issues = [];
    //     $status = 'safe';
    //     $messages = [];

    //     foreach ($matchedDrugs as $matchedDrug) {
    //         $ageGroup = strtolower(preg_replace('/\s+/', '', $matchedDrug['applicable age groups'] ?? ''));
    //         if (!preg_match('/allage|allages|allagegroups/', $ageGroup)) {
    //             if ($age >= 18 && !preg_match('/adult|elderly|geriatric/', $ageGroup)) {
    //                 $issues[] = "This medication is typically not recommended for adults (age 18+).";
    //             } elseif ($age < 18 && !preg_match('/child|pediatric/', $ageGroup)) {
    //                 $issues[] = "This medication is typically not recommended for children.";
    //             }
    //         }

    //         if ($gender == 'female' && $pregnant) {
    //             $pregnancyInfo = strtolower(preg_replace('/\s+/', '', $matchedDrug['pregnancy and lactation safety'] ?? ''));
    //             if (!preg_match('/safeforpregnancy|safeduringpregnancy/', $pregnancyInfo)) {
    //                 $issues[] = "Potential risk during pregnancy - consult your doctor before use.";
    //             }
    //         }

    //         $allergyWarnings = array_map('strtolower', array_map('trim', explode(',', $matchedDrug['allergy warnings'] ?? '')));
    //         foreach (array_intersect($allergies, $allergyWarnings) as $allergy) {
    //             $issues[] = "Warning: May cause allergic reactions if you're sensitive to $allergy.";
    //         }

    //         $contraindications = array_map('strtolower', array_map('trim', explode(',', $matchedDrug['contraindications'] ?? '')));
    //         foreach (array_intersect($conditions, $contraindications) as $condition) {
    //             $issues[] = "Not recommended for patients with $condition - consult your healthcare provider.";
    //         }
    //     }

    //     foreach ($allInteractions as $interaction) {
    //         foreach ($medications as $userMed) {
    //             if (str_contains(strtolower($interaction['primary_drug']), strtolower($userMed))) {
    //                 $issues[] = "Important: Potential interaction between {$request->input('drug_name')} and $userMed.";
    //             }
    //         }
    //     }

    //     if (empty($matchedDrugs) && empty($allInteractions)) {
    //         Log::warning("Drug not found: $drugInput");
    //         return view('medication-checker', [
    //             'message' => "We couldn't find information about {$request->input('drug_name')} in our databases. Please check the spelling or consult your healthcare provider for information about this medication.",
    //             'status' => 'error',
    //             'drugInput' => $request->input('drug_name')
    //         ]);
    //     }

    //     if (!empty($issues)) {
    //         $status = 'warning';
    //         $messages[] = "Important Safety Information for {$request->input('drug_name')}:";
    //         $messages = array_merge($messages, array_map(fn($issue) => "• $issue", $issues));
    //         $messages[] = "\nPlease consult your doctor or pharmacist before using this medication.";
    //     } else {
    //         $messages[] = "Safety Check Complete: {$request->input('drug_name')} appears appropriate for your profile based on our analysis.";
    //         $messages[] = "As always, consult your healthcare provider with any questions about your medications.";
    //     }

    //     return view('medication-checker', [
    //         'message' => implode("\n", $messages),
    //         'status' => $status,
    //         'drugInput' => $request->input('drug_name'),
    //         'matchedDrug' => $matchedDrugs[0] ?? null,
    //         'interactions' => $allInteractions
    //     ]);
    // }


    //old one
    // public function check(Request $request)
    // {
    //     $user = Auth::user();

    //     // Get profile
    //     $profile = $user->profile;

    //     if (!$profile) {
    //         return view('medication-checker', [
    //             'message' => 'No profile data found. Please complete your profile first.',
    //             'status' => 'error'
    //         ]);
    //     }

    //     // Extract info from profile
    //     $drugInput = strtoupper(trim($request->input('drug_name')));
    //     $age = \Carbon\Carbon::parse($profile->date_of_birth)->age;
    //     $gender = strtolower($profile->gender);
    //     $pregnant = $profile->pregnancy_status; // boolean
    //     $allergies = array_map('strtolower', $profile->allergies ?? []);
    //     $conditions = array_map('strtolower', $profile->chronic_conditions ?? []);
    //     if (is_array($profile->medications)) {
    //         // If already an array, no need to explode
    //         $medications = array_map('strtolower', array_map('trim', $profile->medications));
    //     } else {
    //         // Otherwise, explode string into array
    //         $medications = array_map('strtolower', array_map('trim', explode(',', $profile->medications ?? '')));
    //     }

    //     // Load Excel file
    //     $filePath = storage_path('app/public/Drugss.xlsx');
    //     $spreadsheet = IOFactory::load($filePath);
    //     $sheet = $spreadsheet->getActiveSheet();
    //     $data = $sheet->toArray();

    //     $headers = array_map('strtolower', $data[0]);
    //     $rows = array_slice($data, 1);

    //     $matchedDrug = null;
    //     $issues = [];

    //     foreach ($rows as $row) {
    //         $drugName = strtoupper(trim($row[0]));  // Drug Name
    //         $tradeName = strtoupper(trim($row[1])); // Trade Name

    //         if ($drugName === $drugInput || $tradeName === $drugInput) {
    //             $matchedDrug = array_combine($headers, $row);

    //             // Age group check
    //             $ageGroup = strtolower(trim($matchedDrug['applicable age groups'] ?? ''));
    //             $userIsAdult = $age >= 18;

    //             if (!preg_match('/all age|all ages|all age groups/', $ageGroup)) {
    //                 if ($userIsAdult && !preg_match('/adult(s)?|elderly|geriatric/', $ageGroup)) {
    //                     $issues[] = "This drug may not be suitable for adult patients.";
    //                 } elseif (!$userIsAdult && !preg_match('/child|children|pediatric/', $ageGroup)) {
    //                     $issues[] = "This drug may not be suitable for pediatric patients.";
    //                 }
    //             }


    //             // Pregnancy check
    //             $pregnancyInfo = strtolower(trim($matchedDrug['pregnancy and lactation safety'] ?? ''));

    //             if ($gender == 'female' && $pregnant) {
    //                 if (!preg_match('/safe for pregnancy and lactation|safe during pregnancy|safe in pregnancy and lactation/', $pregnancyInfo)) {
    //                     $issues[] = "This drug may not be suitable for use during pregnancy.";
    //                 }

    //             }









    //             // Medication interaction check
    //             $interactions = array_map('trim', explode(',', strtolower($matchedDrug['drug interactions'] ?? '')));
    //             $interactions = array_map('strtolower', $interactions); // normalize interactions

    //             $intersectingMeds = array_intersect($medications, $interactions);

    //             foreach ($intersectingMeds as $problemMed) {
    //                 $issues[] = "Interacts with your medication: $problemMed.";
    //             }
    //             \Log::info('User Medications:', $medications);
    //             \Log::info('Drug Interactions:', $interactions);



    //             break;
    //         }
    //     }

    //     if (!$matchedDrug) {
    //         return view('medication-checker', [
    //             'message' => "Drug '{$drugInput}' not found in the database.",
    //             'status' => 'error'
    //         ]);
    //     }

    //     $status = count($issues) > 0 ? 'warning' : 'safe';
    //     $message = count($issues) > 0
    //         ? "Caution for '{$drugInput}':\n- " . implode("\n- ", $issues)
    //         : "The drug '{$drugInput}' appears to be safe based on your profile.";

    //     return view('medication-checker', compact('message', 'status', 'matchedDrug'));
    // }

    //working
    // public function check(Request $request)
    // {
    //     $user = Auth::user();
    //     $profile = $user->profile;

    //     if (!$profile) {
    //         return view('medication-checker', [
    //             'message' => 'No profile data found. Please complete your profile first.',
    //             'status' => 'error'
    //         ]);
    //     }

    //     // Extract user information
    //     $drugInput = trim(strtolower($request->input('drug_name')));
    //     $age = \Carbon\Carbon::parse($profile->date_of_birth)->age;
    //     $gender = strtolower($profile->gender);
    //     $pregnant = $profile->pregnancy_status;

    //     // Normalize user medications
    //     $medications = is_array($profile->medications)
    //         ? array_map('trim', array_map('strtolower', $profile->medications))
    //         : array_map('trim', array_map('strtolower', explode(',', $profile->medications ?? '')));

    //     \Log::info('Checking drug:', [$drugInput]); // Log input drug

    //     try {
    //         // Load the spreadsheet
    //         $filePath = storage_path('app/public/Drugss.xlsx');
    //         $spreadsheet = IOFactory::load($filePath);
    //         $sheet = $spreadsheet->getActiveSheet();
    //         $data = $sheet->toArray();

    //         // Extract headers and rows
    //         $headers = array_map('strtolower', array_map('trim', $data[0]));
    //         $rows = array_slice($data, 1);

    //         \Log::info('Headers:', $headers);

    //         $matchedDrug = null;
    //         $issues = [];
    //         $interactionMap = [];

    //         // Create interaction map
    //         foreach ($rows as $row) {
    //             $drugName = trim(strtolower($row[array_search('drug name', $headers) ?? '']));
    //             $tradeName = trim(strtolower($row[array_search('trade name', $headers) ?? '']));
    //             $interactionColumnIndex = array_search('drug interactions', $headers);

    //             if ($interactionColumnIndex === false) {
    //                 \Log::error('Drug interactions column not found.');
    //                 continue; // Ensure key column exists
    //             }

    //             $interactions = array_map('trim', explode(',', strtolower($row[$interactionColumnIndex] ?? '')));

    //             \Log::info("Processing drug: $drugName with interactions:", $interactions);

    //             foreach ($interactions as $interaction) {
    //                 $interactionMap[$drugName][] = $interaction;
    //                 $interactionMap[$interaction][] = $drugName;
    //             }

    //             if ($drugName === $drugInput || $tradeName === $drugInput) {
    //                 $matchedDrug = array_combine($headers, $row);

    //                 if ($matchedDrug) {
    //                     // Age group check
    //                     $ageGroupIndex = array_search('applicable age groups', $headers);
    //                     $ageGroup = strtolower(trim($matchedDrug['applicable age groups'] ?? ''));
    //                     if ($age < 18 && !preg_match('/child|children|pediatric/', $ageGroup)) {
    //                         $issues[] = "This drug may not be suitable for pediatric patients.";
    //                     }

    //                     // Pregnancy safety check
    //                     $pregnancyInfoIndex = array_search('pregnancy and lactation safety', $headers);
    //                     $pregnancyInfo = strtolower(trim($matchedDrug['pregnancy and lactation safety'] ?? ''));
    //                     if ($gender == 'female' && $pregnant) {
    //                         if (!preg_match('/safe|caution/', $pregnancyInfo)) {
    //                             $issues[] = "This drug may not be suitable during pregnancy.";
    //                         }
    //                     }

    //                     // Check for drug interactions
    //                     $interactingDrugs = $interactionMap[$drugName] ?? [];
    //                     foreach ($medications as $userMedication) {
    //                         if (in_array($userMedication, $interactingDrugs)) {
    //                             $issues[] = "Interacts with your medication: $userMedication.";
    //                         }
    //                     }

    //                     \Log::info('Matched and processed drug:', $matchedDrug);
    //                     break;
    //                 }
    //             }
    //         }

    //         if (!$matchedDrug) {
    //             \Log::warning("Drug not found: '{$drugInput}'", ['All drugs processed' => $interactionMap]);
    //             return view('medication-checker', [
    //                 'message' => "Drug '{$drugInput}' not found in the database.",
    //                 'status' => 'error'
    //             ]);
    //         }

    //         $status = count($issues) > 0 ? 'warning' : 'safe';
    //         $message = count($issues) > 0
    //             ? "Caution for '{$drugInput}':\n- " . implode("\n- ", $issues)
    //             : "The drug '{$drugInput}' appears to be safe based on your profile.";

    //         return view('medication-checker', compact('message', 'status', 'matchedDrug'));
    //     } catch (\Exception $e) {
    //         \Log::error('Error processing medication check', ['exception' => $e->getMessage()]);
    //         return view('medication-checker', [
    //             'message' => 'There was an error processing your request. Please try again later.',
    //             'status' => 'error'
    //         ]);
    //     }
    // }

    //=======================

    // public function check(Request $request)
    // {
    //     $user = Auth::user();
    //     $profile = $user->profile;

    //     if (!$profile) {
    //         return view('medication-checker', [
    //             'message' => 'No profile data found. Please complete your profile first.',
    //             'status' => 'error'
    //         ]);
    //     }

    //     // Normalize input drug name
    //     $drugInput = trim(strtolower($request->input('drug_name')));

    //     // Process user's medications (handles both array and comma-separated strings)
    //     $medications = is_array($profile->medications)
    //         ? array_map('trim', array_map('strtolower', $profile->medications))
    //         : array_map('trim', array_map('strtolower', explode(',', $profile->medications ?? '')));

    //     Log::info('Checking drug for interactions:', [$drugInput]);

    //     // Check interactions for the input drug (now bidirectional)
    //     $inputDrugInteractions = $this->checkDrugInteractions($drugInput);

    //     $issues = [];
    //     $interactingMeds = [];

    //     // Check interactions in both directions
    //     foreach ($medications as $userMedication) {
    //         // Case 1: Input drug interacts with user's medication
    //         if (isset($inputDrugInteractions[$drugInput])) {
    //             if (in_array($userMedication, $inputDrugInteractions[$drugInput])) {
    //                 $interactingMeds[$userMedication] = true;
    //                 $issues[] = "{$userMedication} interacts with {$drugInput}.";
    //             }
    //         }

    //         // Case 2: User's medication interacts with input drug (reverse check)
    //         if (isset($inputDrugInteractions[$userMedication])) {
    //             if (in_array($drugInput, $inputDrugInteractions[$userMedication])) {
    //                 if (!isset($interactingMeds[$userMedication])) {
    //                     $interactingMeds[$userMedication] = true;
    //                     $issues[] = "{$drugInput} interacts with {$userMedication}.";
    //                 }
    //             }
    //         }
    //     }

    //     // =====================================
    //     // ADDED PREGNANCY SAFETY CHECK
    //     // =====================================
    //     if (strtolower($profile->gender) == 'female' && $profile->pregnancy_status) {
    //         $filePath = storage_path('app/public/Drugss.xlsx');
    //         $spreadsheet = IOFactory::load($filePath);
    //         $sheet = $spreadsheet->getActiveSheet();
    //         $data = $sheet->toArray();

    //         $headers = array_map('strtolower', array_map('trim', $data[0]));
    //         $rows = array_slice($data, 1);

    //         foreach ($rows as $row) {
    //             $row = array_combine($headers, $row);
    //             $drugName = trim(strtolower($row['drug name'] ?? ''));
    //             $tradeName = trim(strtolower($row['trade name'] ?? ''));

    //             if ($drugName === $drugInput || $tradeName === $drugInput) {
    //                 $pregnancyInfo = strtolower(trim($row['pregnancy and lactation safety'] ?? ''));

    //                 if (preg_match('/avoid in pregnancy|contraindicated in pregnancy/i', $pregnancyInfo)) {
    //                     $issues[] = "UNSAFE during pregnancy: " . trim($row['pregnancy and lactation safety']);
    //                 } elseif (preg_match('/caution in pregnancy|use with caution in pregnancy/i', $pregnancyInfo)) {
    //                     $issues[] = "Use with caution during pregnancy: " . trim($row['pregnancy and lactation safety']);
    //                 } elseif (preg_match('/consult physician/i', $pregnancyInfo)) {
    //                     $issues[] = "Consult physician before use: " . trim($row['pregnancy and lactation safety']);
    //                 } elseif (!preg_match('/safe (in|for) pregnancy/i', $pregnancyInfo)) {
    //                     $issues[] = "Pregnancy safety not established: " . trim($row['pregnancy and lactation safety']);
    //                 }
    //                 break;
    //             }
    //         }
    //     }

    //     // Determine status and message
    //     $status = count($issues) > 0 ? 'warning' : 'safe';
    //     $message = !empty($issues)
    //         ? "Potential issues found with " . count(array_unique($interactingMeds)) . " medications:\n- " . implode("\n- ", $issues)
    //         : "The drug '{$drugInput}' appears safe with your current medications.";

    //     return view('medication-checker', compact('message', 'status'));
    // }

    //==================

    public function check(Request $request)
    {
        $user = Auth::user();
        $profile = $user->profile;

        if (!$profile) {
            return view('medication-checker', [
                'message' => 'No profile data found. Please complete your profile first.',
                'status' => 'error'
            ]);
        }

        // Normalize input drug name
        $drugInput = trim(strtolower($request->input('drug_name')));

        // Process user's medications (handles both array and comma-separated strings)
        $medications = is_array($profile->medications)
            ? array_map('trim', array_map('strtolower', $profile->medications))
            : array_map('trim', array_map('strtolower', explode(',', $profile->medications ?? '')));

        Log::info('Checking drug for interactions:', [$drugInput]);

        // Check interactions for the input drug (now bidirectional)
        $inputDrugInteractions = $this->checkDrugInteractions($drugInput);

        $issues = [];
        $interactingMeds = [];
        $pregnancyWarnings = [];

        // Check interactions in both directions
        foreach ($medications as $userMedication) {
            // Case 1: Input drug interacts with user's medication
            if (isset($inputDrugInteractions[$drugInput])) {
                if (in_array($userMedication, $inputDrugInteractions[$drugInput])) {
                    $interactingMeds[$userMedication] = true;
                    $issues[] = " ⚠️ $userMedication interacts with $drugInput";
                }
            }

            // Case 2: User's medication interacts with input drug (reverse check)
            if (isset($inputDrugInteractions[$userMedication])) {
                if (in_array($drugInput, $inputDrugInteractions[$userMedication])) {
                    if (!isset($interactingMeds[$userMedication])) {
                        $interactingMeds[$userMedication] = true;
                        $issues[] = "⚠️ $drugInput interacts with $userMedication";
                    }
                }
            }
        }

        // Pregnancy safety check
        if (strtolower($profile->gender) == 'female' && $profile->pregnancy_status) {
            $filePath = storage_path('app/public/Drugss_final.xlsx');
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray();

            $headers = array_map('strtolower', array_map('trim', $data[0]));
            $rows = array_slice($data, 1);

            foreach ($rows as $row) {
                $row = array_combine($headers, $row);
                $drugName = trim(strtolower($row['drug name'] ?? ''));
                $tradeName = trim(strtolower($row['trade name'] ?? ''));

                if ($drugName === $drugInput || $tradeName === $drugInput) {
                    $pregnancyInfo = trim($row['pregnancy and lactation safety'] ?? '');
                    $lowerPregnancyInfo = strtolower($pregnancyInfo);

                    if (preg_match('/avoid in pregnancy|contraindicated in pregnancy/i', $lowerPregnancyInfo)) {
                        $pregnancyWarnings[] = "❌ Pregnancy Warning: $pregnancyInfo";
                    } elseif (preg_match('/caution in pregnancy|use with caution in pregnancy/i', $lowerPregnancyInfo)) {
                        $pregnancyWarnings[] = "⚠️ Pregnancy Caution: $pregnancyInfo";
                    } elseif (preg_match('/consult physician/i', $lowerPregnancyInfo)) {
                        $pregnancyWarnings[] = "ℹ️ Pregnancy Advisory: $pregnancyInfo";
                    } elseif (!preg_match('/safe (in|for) pregnancy/i', $lowerPregnancyInfo)) {
                        $pregnancyWarnings[] = "⁉️ Pregnancy Safety Unknown: $pregnancyInfo";
                    }
                    break;
                }
            }
        }

        $status = count($issues) > 0 ? 'warning' : 'safe';
        if (!empty($pregnancyWarnings)) {
            $status = 'warning';
        }

        $messageParts = [];

        if (!empty($pregnancyWarnings)) {
            $messageParts[] = "=== PREGNANCY SAFETY ASSESSMENT ===";
            foreach ($pregnancyWarnings as $warning) {
                $messageParts[] = " $warning";
            }
            $messageParts[] = ""; // Empty line for separation
        }

        if (!empty($issues)) {
            $medCount = count($interactingMeds);
            $messageParts[] = "=== MEDICATION INTERACTIONS FOUND ===";
            $messageParts[] = "⚠️ Found $medCount potential interaction" . ($medCount > 1 ? 's' : '') . " with your current medications:";
            foreach ($issues as $issue) {
                $messageParts[] = "• $issue";
            }
            $messageParts[] = ""; // Empty line for separation
            $messageParts[] = "Please consult your doctor before taking these medications together.";
        }

        $message = !empty($messageParts)
            ? implode("\n", $messageParts)
            : "✅ SAFETY VERIFIED: $drugInput is safe to be used with your current medications.";

        return view('medication-checker', compact('message', 'status'));
    }

    public function checkDrugInteractions($drugInput)
    {
        $filePath = storage_path('app/public/Drugss_final.xlsx');
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        $headers = array_map('strtolower', array_map('trim', $data[0]));
        $rows = array_slice($data, 1);

        $interactionMap = [];

        // Find column indexes
        $drugNameIndex = array_search('drug name', $headers);
        $interactionColumnIndex = array_search('drug interactions', $headers);

        if ($drugNameIndex === false || $interactionColumnIndex === false) {
            return $interactionMap; // Invalid Excel structure
        }

        // Normalize input drug for comparison
        $normalizedInput = trim(strtolower($drugInput));

        // First pass: Check if input drug is in "drug name" column
        foreach ($rows as $row) {
            $drugName = trim(strtolower($row[$drugNameIndex] ?? ''));

            if ($drugName === $normalizedInput) {
                $interactionList = strtolower(trim($row[$interactionColumnIndex] ?? ''));
                $interactionEntries = array_map('trim', explode(',', $interactionList));

                foreach ($interactionEntries as $interaction) {
                    if (!empty($interaction)) {
                        if (!isset($interactionMap[$drugName])) {
                            $interactionMap[$drugName] = [];
                        }
                        $interactionMap[$drugName][] = $interaction;
                    }
                }
            }
        }

        // Second pass: Check if input drug appears in "drug interactions" of other drugs
        foreach ($rows as $row) {
            $drugName = trim(strtolower($row[$drugNameIndex] ?? ''));
            $interactionList = strtolower(trim($row[$interactionColumnIndex] ?? ''));
            $interactionEntries = array_map('trim', explode(',', $interactionList));

            // If input drug is in interactions, add the parent drug as an interaction
            if (in_array($normalizedInput, $interactionEntries)) {
                if (!isset($interactionMap[$normalizedInput])) {
                    $interactionMap[$normalizedInput] = [];
                }
                $interactionMap[$normalizedInput][] = $drugName;
            }
        }

        return $interactionMap;
    }

    public function autocomplete(Request $request)
    {
        $query = trim(strtolower($request->input('query')));

        if (empty($query)) {
            return response()->json([]);
        }

        // ⚡ Cache the Excel data for 1 hour
        $data = Cache::remember('drug_excel_data', 3600, function () {
            $filePath = storage_path('app/public/Drugss_final.xlsx');
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            return $sheet->toArray();
        });

        // $filePath = storage_path('app/public/Drugss_final.xlsx');
        // $spreadsheet = IOFactory::load($filePath);
        // $sheet = $spreadsheet->getActiveSheet();
        // $data = $sheet->toArray();

        $headers = array_map('strtolower', array_map('trim', $data[0]));
        $rows = array_slice($data, 1);

        // Find column indexes
        $drugNameIndex = array_search('drug name', $headers);
        $tradeNameIndex = array_search('trade name', $headers);
        $interactionsIndex = array_search('drug interactions', $headers);

        $suggestions = [];
        $addedValues = [];

        foreach ($rows as $row) {
            // Search in Drug Name column
            if ($drugNameIndex !== false && isset($row[$drugNameIndex])) {
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
            if ($tradeNameIndex !== false && isset($row[$tradeNameIndex])) {
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

            // Search in Drug Interactions column
            if ($interactionsIndex !== false && isset($row[$interactionsIndex])) {
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
