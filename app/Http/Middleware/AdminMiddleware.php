<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /** Email-ul singurul admin permis — definit în .env ca ADMIN_EMAIL */
    private function isAllowedAdmin(): bool
    {
        $user = auth()->user();

        if (!$user) return false;

        // Dublu check: rol Spatie + email exact din .env
        return $user->hasRole('admin')
            && $user->email === config('app.admin_email');
    }

    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->isAllowedAdmin()) {
            // Logăm tentativa fără a dezvălui că panoul există
            Log::warning('Admin access denied', [
                'ip'    => $request->ip(),
                'user'  => auth()->user()?->email ?? 'guest',
                'url'   => $request->url(),
            ]);

            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }

            // Redirect la home, nu 403 — nu dezvăluim că /admin există
            return redirect()->route('home');
        }

        return $next($request);
    }
}
