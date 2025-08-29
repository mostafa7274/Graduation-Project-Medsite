<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * The default redirection after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Handle the Google callback after user authentication.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleGoogleCallback()
    {
        try {
            // hena bgeeb el data bta3et el user men google law 3ando account
            $user = Socialite::driver('google')->user();

            // hena bt2kd law el fe email mtsagel bnafs el mail fel database
            $findUserByEmail = User::where('email', $user->email)->first();

            // law l2eet user bnafs el mail
            if ($findUserByEmail) {
                // If the social_id is different, link the Google account to the existing user
                if ($findUserByEmail->social_id !== $user->id) {
                    $findUserByEmail->social_id = $user->id;
                    $findUserByEmail->social_type = 'google';
                    $findUserByEmail->save();
                }


                Auth::login($findUserByEmail);

                // Redirect to the profile page (since the user already has a profile)
                return redirect($this->redirectTo);
            } else {
                // If no user with the same email exists a3mel creation l new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => Hash::make('my-google'),
                ]);


                Auth::login($newUser);


                if ($newUser->profile) {

                    return redirect($this->redirectTo);
                } else {
                    // If no profile exists, redirect to  create a profile page
                    return redirect()->route('profile');
                }
            }
        } catch (Exception $e) {

            dd($e->getMessage());
        }
    }
}
