<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;
use Vonage\SMS\Message\SMS;

class SendSms extends Controller
{
    // Show the SMS form view
    public function showForm()
    {
        return view('admin.send-sms.send-sms'); // path: resources/views/admin/send-sms/send-sms.blade.php
    }

    // Send the SMS
    // public function send(Request $request)
    // {
    //     $request->validate([
    //         'number' => ['required', 'regex:/^20(10|11|12|15)[0-9]{8}$/'], // el format bta3 rkan el telefon
    //         'message' => 'required|string|max:160',
    //     ]);

    //     $basic = new Basic("6a014fe8", "H5yCr5lTo30mKl7F");
    //     $client = new Client($basic);

    //     $client->sms()->send(
    //         new SMS($request->number, "Med Site", $request->message)
    //     );

    //     return redirect()->back()->with('success', 'SMS has been sent!');
    // }

    // public function send(Request $request)
    // {
    //     $request->validate([
    //         'number' => ['required', 'regex:/^20(10|11|12|15)[0-9]{8}$/'],
    //         'message' => 'required|string|max:160',
    //     ]);

    //     try {
    //         $basic = new Basic("268ff0c9", "81lC3aWDE3hMvb17");
    //         $client = new Client($basic);

    //         $response = $client->sms()->send(
    //             new SMS($request->number, "MedSite", $request->message)
    //         );

    //         // Log the response
    //         \Log::info('Vonage SMS Response:', (array) $response->current());

    //         return redirect()->back()->with('success', 'SMS has been sent!');
    //     } catch (\Exception $e) {
    //         \Log::error('SMS Error: ' . $e->getMessage());
    //         return redirect()->back()->with('error', 'Failed to send SMS: ' . $e->getMessage());
    //     }
    // }

    public function send(Request $request)
    {
        $request->validate([
            'number' => ['required', 'regex:/^20(10|11|12|15)[0-9]{8}$/'],
            'message' => 'required|string|max:160',
        ]);

        try {
            $basic = new Basic("8c7123f1", "TvGNmgIXqsO79hmN");
            $client = new Client($basic);

            $response = $client->sms()->send(
                new SMS($request->number, "MEDSITE", $request->message)
            );

            // Log with adjusted time (+1 hour)
            \Log::info('SMS Sent at: ' . now()->addHour()->format('Y-m-d H:i:s'), (array) $response->current());

            return redirect()->back()->with('success', 'SMS has been sent!');
        } catch (\Exception $e) {
            \Log::error('[' . now()->addHour()->format('Y-m-d H:i:s') . '] SMS Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to send SMS: ' . $e->getMessage());
        }
    }



}


