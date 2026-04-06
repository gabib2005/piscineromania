<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class GdprController extends Controller
{
    /**
     * Pagina GDPR din contul utilizatorului.
     */
    public function index(): View
    {
        return view('account.gdpr', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Exportă toate datele utilizatorului ca JSON.
     */
    public function exportData(): Response
    {
        /** @var User $user */
        $user = auth()->user();

        $data = $user->gdprExport();

        $filename = 'datele-mele-piscineromania-' . now()->format('Y-m-d') . '.json';

        return response(
            json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
            200,
            [
                'Content-Type'        => 'application/json',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ]
        );
    }

    /**
     * Anonimizează contul utilizatorului (nu șterge din motive contabile).
     */
    public function deleteAccount(Request $request): RedirectResponse
    {
        $request->validate([
            'password'      => ['required', 'string'],
            'confirm_delete' => ['required', 'accepted'],
        ], [
            'password.required'       => 'Parola este obligatorie.',
            'confirm_delete.accepted' => 'Trebuie să confirmi ștergerea contului.',
        ]);

        /** @var User $user */
        $user = auth()->user();

        if ($user->password && !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Parola introdusă este incorectă.']);
        }

        // Anonimizare date personale (păstrăm înregistrările pentru obligații contabile)
        $anonymousId = 'deleted_' . $user->id . '_' . time();

        DB::transaction(function () use ($user, $anonymousId) {
            // Anonimizează comenzile — păstrăm suma și datele de livrare anonimizate
            $user->orders()->update([
                'shipping_name'  => 'Client șters',
                'shipping_email' => $anonymousId . '@deleted.local',
                'shipping_phone' => null,
            ]);

            // Anonimizează profilul
            $user->update([
                'name'        => 'Utilizator șters',
                'email'       => $anonymousId . '@deleted.local',
                'password'    => null,
                'google_id'   => null,
                'facebook_id' => null,
                'phone'       => null,
                'avatar'      => null,
            ]);
        });

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Contul tău a fost șters. Datele personale au fost anonimizate.');
    }

    /**
     * Înregistrează consimțământul pentru cookies (apel AJAX din banner).
     */
    public function recordConsent(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'consents' => ['required', 'array'],
            'consents.*' => ['boolean'],
        ]);

        $typeMap = [
            'necessary' => 'cookies_necessary',
            'analytics' => 'cookies_analytics',
            'marketing' => 'marketing',
        ];

        $now = now();

        foreach ($validated['consents'] as $key => $value) {
            $type = $typeMap[$key] ?? null;
            if (!$type) {
                continue;
            }

            DB::table('consent_log')->insert([
                'user_id'      => auth()->id(),
                'session_id'   => session()->getId(),
                'consent_type' => $type,
                'consented'    => (bool) $value,
                'ip_address'   => $request->ip(),
                'user_agent'   => substr($request->userAgent() ?? '', 0, 500),
                'consented_at' => $now,
                'created_at'   => $now,
                'updated_at'   => $now,
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}
