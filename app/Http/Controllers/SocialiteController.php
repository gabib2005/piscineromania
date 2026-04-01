<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectGoogle()
    {
        if (empty(config('services.google.client_id'))) {
            return redirect()->route('login')->with('status', 'Autentificarea Google nu este configurată momentan.');
        }
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        return $this->handleCallback('google');
    }

    public function redirectFacebook()
    {
        if (empty(config('services.facebook.client_id'))) {
            return redirect()->route('login')->with('status', 'Autentificarea Facebook nu este configurată momentan.');
        }
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFacebook()
    {
        return $this->handleCallback('facebook');
    }

    private function handleCallback(string $driver)
    {
        try {
            $socialUser = Socialite::driver($driver)->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Autentificarea prin ' . ucfirst($driver) . ' a eșuat.');
        }

        $field = $driver . '_id';
        $user = User::where($field, $socialUser->getId())
            ->orWhere('email', $socialUser->getEmail())
            ->first();

        if ($user) {
            $user->update([$field => $socialUser->getId()]);
        } else {
            $user = User::create([
                'name'       => $socialUser->getName(),
                'email'      => $socialUser->getEmail(),
                $field       => $socialUser->getId(),
                'avatar'     => $socialUser->getAvatar(),
                'password'   => bcrypt(\Illuminate\Support\Str::random(32)),
            ]);
            $user->assignRole('client');
        }

        Auth::login($user, true);
        return redirect()->intended('/');
    }
}
