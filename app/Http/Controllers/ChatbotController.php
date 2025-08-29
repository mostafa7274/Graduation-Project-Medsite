<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Drug;
use PhpParser\Node\Stmt\ElseIf_;

class ChatbotController extends Controller
{
    public function floating()
    {
        return view('floating-chatbot'); // Standalone floating chat view
    }
    public function respond(Request $request)
    {
        $message = strtolower(trim($request->input('message')));
        $reply = "❓ Sorry, I couldn't understand that.";

        // 🌟 Step 0: Keyword-based conversational responses
        // $greetings = [
        //     'hello',
        //     'hi',
        //     'hey',
        //     'good morning',
        //     'good evening',
        //     'how are you',
        //     'ازيك',
        //     'السلام عليكم',
        // ];

        // $helpKeywords = [
        //     'help',
        //     'need help',
        //     'ساعدني',
        //     'مساعدة',
        //     'اه ساعدني',
        //     'yes i need help',
        //     'i need assistance',
        // ];

        // foreach ($greetings as $greet) {
        //     if (preg_match("/\b" . preg_quote($greet, '/') . "\b/", $message)) {
        //         $reply = "👋 Hi there! How can I assist you today?";
        //         if (in_array($greet, ['ازيك', 'عامل ايه', 'كيف الحال', 'اخبارك', 'how are you'])) {
        //             $reply = "😊 الحمد لله، إزيك انت؟ ممكن أساعدك في حاجة تخص الأدوية؟";
        //         }
        //         return response()->json(['reply' => $reply]);
        //     }
        // }

        // foreach ($helpKeywords as $help) {
        //     if (preg_match("/\b" . preg_quote($help, '/') . "\b/", $message)) {
        //         $reply = "🧐 Sure, let me know what you need help with! Do you want to check drug interactions, contraindications, or something else?";
        //         return response()->json(['reply' => $reply]);
        //     }
        // }


        $greetings = [
            'hello' => 'standard',
            'hi' => 'standard',
            'hey' => 'standard',
            'good morning' => 'standard',
            'good evening' => 'standard',
            'how are you' => 'health',
            'ازيك' => 'healthar',
            'السلام عليكم' => 'standardar',
            'صباح الخير' => 'standardar',
            'مساء الخير' => 'standardar',
            'عامل ايه' => 'healthar',
            'كيف الحال' => 'healthar',
            'اخبارك' => 'healthar'
        ];

        $helpKeywords = [
            'help' => 'en',
            'need help' => 'en',
            'ساعدني' => 'ar',
            'مساعدة' => 'ar',
            'عاوز مساعدة' => 'ar',
            'yes i need help' => 'en',
            'i need assistance' => 'en'
        ];

        // Detect language of the message
        function detectMessageLanguage($message)
        {
            if (preg_match('/[\x{0600}-\x{06FF}\x{0750}-\x{077F}\x{08A0}-\x{08FF}\x{FB50}-\x{FDFF}\x{FE70}-\x{FEFF}]/u', $message)) {
                return 'ar';
            }
            return 'en';
        }

        $detectedLang = detectMessageLanguage($message);

        // Handle greetings
        foreach ($greetings as $greet => $type) {
            if (preg_match("/\b" . preg_quote($greet, '/') . "\b/ui", $message)) {
                if ($type === 'healthar') {
                    $reply = "😊 الحمد لله، إزيك انت؟ كيف يمكنني مساعدتك في أي شيء متعلق بالادوية؟";
                } elseif ($type === "health") {
                    $reply = "😊 All Good Thanks! How can I assist you today?";
                } elseif ($type === "standardar") {
                    $reply = "👋 أهلًا! كيف يمكنني مساعدتك اليوم؟";
                } else {
                    $reply = "👋 Hi there! How can I assist you today?";
                }
                return response()->json(['reply' => $reply]);
            }
        }

        // Handle help requests
        foreach ($helpKeywords as $help => $lang) {
            if (preg_match("/\b" . preg_quote($help, '/') . "\b/ui", $message)) {
                if ($detectedLang === 'ar') {
                    $reply = "🧐 بالطبع، ممكن أساعدك! عاوز تعرف حاجة عن تفاعلات الأدوية، موانع الاستعمال، أو حاجة تانية؟";
                } else {
                    $reply = "🧐 Sure, let me know what you need help with! Do you want to check drug interactions, contraindications, or something else?";
                }
                return response()->json(['reply' => $reply]);
            }
        }



        // Step 1: Get all known drug names
        $allDrugNames = Drug::pluck('name')->map(fn($name) => strtolower($name))->toArray();

        // Step 2 + 3: Match full drug names (even multi-word ones)
        $matchedDrugs = [];
        foreach ($allDrugNames as $drugName) {
            if (preg_match("/\b" . preg_quote(strtolower($drugName), '/') . "\b/", $message)) {
                $matchedDrugs[] = ucfirst($drugName);
            }
        }
        $drugNames = array_unique($matchedDrugs);

        // Step 4: Check for drug interaction if 2 or more drugs
        if (count($drugNames) >= 2) {
            [$drug1, $drug2] = array_slice($drugNames, 0, 2);

            $drug = Drug::where('name', $drug1)->first();

            if ($drug) {
                $interactionsArray = array_map('trim', explode(',', strtolower($drug->drug_drug_interactions ?? '')));
                $drug2Lower = strtolower($drug2);

                if (in_array($drug2Lower, $interactionsArray)) {
                    $reply = "🔎 <strong>Drug Interaction Check</strong><br><br>"
                        . "✅ Yes, there's an interaction between <strong>$drug1</strong> and <strong>$drug2</strong>.<br><br>"
                        . "🧬 <strong>Interaction Details:</strong><br>"
                        . "• <strong>$drug2</strong> is listed as interacting with <strong>$drug1</strong>.<br>"
                        . "• ⚠️ <strong>Risk Description:</strong> " . ($drug->risk_description ?? 'Not specified') . "<br>"
                        . "• 🧪 <strong>Severity Level:</strong> " . ($drug->severity ?? 'Unknown') . "<br>"
                        . "• ⛔ <strong>Contraindications:</strong><br>• " . str_replace(',', "<br>•", $drug->contraindications ?? 'None');
                } else {
                    $reply = "❌ No interaction found between <strong>$drug1</strong> and <strong>$drug2</strong>.";
                }
            } else {
                $reply = "❌ Drug '<strong>$drug1</strong>' not found.";
            }

            return response()->json(['reply' => $reply]);
        }

        // Step 5: If single drug mentioned, return its info
        if (count($drugNames) === 1) {
            $drug = Drug::where('name', $drugNames[0])->first();
            if ($drug) {
                $reply = "💊 <strong>Drug Information: {$drug->name}</strong><br><br>"
                    . "⛔ <strong>Contraindications:</strong><br>• " . str_replace(',', "<br>•", $drug->contraindications ?? 'None') . "<br><br>"
                    . "🔗 <strong>Known Drug Interactions:</strong><br>• " . str_replace(',', "<br>•", $drug->drug_drug_interactions ?? 'None') . "<br><br>"
                    . "🧪 <strong>Severity Level:</strong> {$drug->severity}<br><br>"
                    . "⚠️ <strong>Risk Description:</strong> " . ($drug->risk_description ?? 'Not specified') . "<br><br>";
            } else {
                Log::info("Fetching information for unknown drug: {$drugNames[0]}");
                $aiResponse = $this->fetchFromGroqAI($drugNames[0]);
                if ($aiResponse) {
                    $reply = "<strong>MEDSITE AI Response for Unknown Drug '{$drugNames[0]}'</strong><br><br>$aiResponse";
                } else {
                    $reply = "❌ Sorry, I couldn't find any information about '<strong>{$drugNames[0]}</strong>' using AI.";
                }
            }

            return response()->json(['reply' => $reply]);
        }

        // Fallback to Groq AI if no intent or drug match
        $groqResponse = $this->fetchFromGroqAI($message);
        if ($groqResponse) {
            $reply = "<strong>MEDSITE AI Response</strong><br><br>$groqResponse";
        } else {
            $reply = "❌ Sorry, I couldn't understand your message.";
        }

        return response()->json(['reply' => $reply]);
    }

    private function fetchFromGroqAI($userMessage)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.groq.api_key'),
                'Content-Type' => 'application/json',
            ])->post(config('services.groq.endpoint'), [
                        'model' => 'llama3-8b-8192',
                        'messages' => [
                            ['role' => 'system', 'content' => 'You are a helpful medical assistant. Reply in HTML format.'],
                            ['role' => 'user', 'content' => $userMessage],
                        ],
                        'temperature' => 0.5,
                    ]);

            $result = $response->json();
            return $result['choices'][0]['message']['content'] ?? null;

        } catch (\Exception $e) {
            Log::error("Groq AI Error: " . $e->getMessage());
            return null;
        }
    }
}
