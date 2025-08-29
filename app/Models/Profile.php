<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'gender',
        'date_of_birth',
        'phone_number',
        'blood_type',
        'allergies',
        'chronic_conditions',
        'medications',
        'prescription',
        'pregnancy_status',
        'weight',
        'height',
        'notes',
    ];

    // Automatically decode the JSON from the database into an array when retrieving
    // and automatically encode the array back into JSON when saving.
    protected $casts = [
        'allergies' => 'array',
        'chronic_conditions' => 'array',
        'medications' => 'array',
        'prescription' => 'array',
    ];

    protected $table = 'profiles';

    // Each profile belongs to one user
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    // Get the top chronic conditions across all profiles
    public static function getTopChronicConditions($limit = 5)
    {
        return self::pluck('chronic_conditions')
            ->flatten()
            ->countBy()
            ->sortDesc()
            ->take($limit);
    }

    // Get the top allergies across all profiles
    public static function getTopAllergies($limit = 5)
    {
        return self::pluck('allergies')
            ->flatten()
            ->countBy()
            ->sortDesc()
            ->take($limit);
    }

    // Get high-risk patients based on their risk score
    public static function getHighRiskPatients($threshold = 6)
    {
        return self::all()->filter(function ($profile) use ($threshold) {
            return $profile->calculateRiskScore() >= $threshold;
        });
    }

    // Calculate the risk score for a profile
    public function calculateRiskScore()
    {
        $score = 0;

        // Add points based on chronic conditions
        if (is_array($this->chronic_conditions)) {
            $score += count($this->chronic_conditions) * 2; // 2 points per chronic condition
        }

        // Add points based on allergies
        if (is_array($this->allergies)) {
            $score += count($this->allergies); // 1 point per allergy
        }

        // Add points if patient is pregnant
        if ($this->pregnancy_status === 'pregnant') {
            $score += 3;
        }

        // Add points based on BMI (Body Mass Index)
        if ($this->weight && $this->height) {
            $bmi = $this->weight / (($this->height / 100) ** 2);
            if ($bmi >= 30) {
                $score += 2; // Obese
            }
        }

        return $score;
    }
}
