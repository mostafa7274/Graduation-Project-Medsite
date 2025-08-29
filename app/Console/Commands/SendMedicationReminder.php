<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MedicationPlan;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use Carbon\Carbon;

class SendMedicationReminder extends Command
{
    protected $signature = 'medication:reminder';
    protected $description = 'Send medication reminder emails to patients';

    public function handle()
    {
        // TIME CORRECTION (Add these exact lines)
        $now = Carbon::now('Africa/Cairo')
            ->setTimezone('Africa/Cairo')
            ->addHour(); // Manual 1-hour adjustment

        $currentTime = $now->format('H:i');
        $currentDate = $now->format('Y-m-d');

        // Rest of your existing logic remains unchanged
        $plans = MedicationPlan::where('date', $currentDate)
            ->where('time', $currentTime)
            ->with('user')
            ->get();

        if ($plans->isEmpty()) {
            $this->info("No medication reminders at this time: {$now}");
            return;
        }

        foreach ($plans as $plan) {
            $email = $plan->user->email ?? null;

            if ($email) {
                $subject = "⏰ Medication Reminder: {$plan->medication_name}";
                $message = "Hello, this is your reminder to take <strong>{$plan->medication_name}</strong> at <strong>{$plan->time}</strong>. Dosage: {$plan->dosage}.<br>Note: {$plan->note}";

                Mail::to($email)->send(new WelcomeEmail($message, $subject));
                $this->info("Sent reminder to: {$email}");
            } else {
                $this->warn("No email found for user ID: {$plan->user_id}");
            }
        }
    }
}
