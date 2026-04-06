@extends('layouts.app')
@section('title', 'Contul meu')

@php
  $activeTab = $tab ?? (($errors->has('name') || $errors->has('password_confirmation')) ? 'register' : 'login');
  $hasGoogle   = !empty(config('services.google.client_id')) && !empty(config('services.google.client_secret'));
  $hasFacebook = !empty(config('services.facebook.client_id')) && !empty(config('services.facebook.client_secret'));
@endphp

@section('content')
<div class="auth-page">
  <div class="auth-card" x-data="{ tab: '{{ $activeTab }}' }">

    {{-- Header --}}
    <div class="auth-card-header">
      <div class="auth-icon">
        <svg width="26" height="26" fill="none" stroke="#00b4d8" stroke-width="1.7" viewBox="0 0 24 24">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
          <circle cx="12" cy="7" r="4"/>
        </svg>
      </div>
      <h1>Contul meu</h1>
      <p>PiscineRomania.ro</p>
    </div>

    {{-- Tabs --}}
    <div class="auth-tabs">
      <button type="button"
              class="auth-tab-btn"
              :class="{ active: tab === 'login' }"
              @click="tab = 'login'">
        Autentificare
      </button>
      <button type="button"
              class="auth-tab-btn"
              :class="{ active: tab === 'register' }"
              @click="tab = 'register'">
        Cont nou
      </button>
    </div>

    <div class="auth-form-body">

      {{-- ═══ LOGIN ═══ --}}
      <div x-show="tab === 'login'" x-cloak>

        @if(session('status'))
          <div style="font-size:.78rem;color:#0369a1;background:#e0f2fe;border-radius:8px;padding:.6rem .875rem;margin-bottom:1rem">
            {{ session('status') }}
          </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="auth-field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                   placeholder="adresa@email.ro"
                   class="{{ ($errors->has('email') && !$errors->has('name')) ? 'is-error' : '' }}">
            @if($errors->has('email') && !$errors->has('name'))
              <div class="field-error">
                <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                {{ $errors->first('email') }}
              </div>
            @endif
          </div>

          <div class="auth-field">
            <div class="field-top">
              <label style="margin:0">Parolă</label>
              <a href="{{ route('password.request') }}" class="auth-forgot">Ai uitat parola?</a>
            </div>
            <input type="password" name="password" required autocomplete="current-password"
                   placeholder="••••••••">
          </div>

          <div class="auth-remember">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Ține-mă minte</label>
          </div>

          <button type="submit" class="auth-submit-btn">Autentificare →</button>
        </form>

        <div class="auth-divider"><span>sau continuă cu</span></div>
        <div class="auth-social-row">
          <a href="{{ route('auth.google') }}" class="auth-social-btn" title="Continuă cu Google">
            <svg width="22" height="22" viewBox="0 0 48 48">
              <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
              <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
              <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
              <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.18 1.48-4.97 2.31-8.16 2.31-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
            </svg>
          </a>
          <a href="{{ route('auth.facebook') }}" class="auth-social-btn" title="Continuă cu Facebook">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="#1877F2">
              <path d="M24 12.073C24 5.404 18.627 0 12 0S0 5.404 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.885v2.271h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/>
            </svg>
          </a>
        </div>

        <div class="auth-switch">
          Nu ai cont?
          <button type="button" @click="tab = 'register'">Înregistrează-te</button>
        </div>
      </div>

      {{-- ═══ REGISTER ═══ --}}
      <div x-show="tab === 'register'" x-cloak>

        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="auth-field">
            <label>Nume complet</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                   placeholder="Ion Popescu"
                   class="{{ $errors->has('name') ? 'is-error' : '' }}">
            @error('name')
              <div class="field-error">
                <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                {{ $message }}
              </div>
            @enderror
          </div>

          <div class="auth-field">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                   placeholder="adresa@email.ro"
                   class="{{ ($errors->has('email') && $errors->has('name')) ? 'is-error' : '' }}">
            @if($errors->has('email') && $errors->has('name'))
              <div class="field-error">
                <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                {{ $errors->first('email') }}
              </div>
            @endif
          </div>

          <div class="auth-field">
            <label>Parolă</label>
            <input type="password" name="password" required autocomplete="new-password"
                   placeholder="Minim 8 caractere"
                   class="{{ ($errors->has('password') && $errors->has('name')) ? 'is-error' : '' }}">
            @if($errors->has('password') && $errors->has('name'))
              <div class="field-error">
                <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                {{ $errors->first('password') }}
              </div>
            @endif
          </div>

          <div class="auth-field">
            <label>Confirmă parola</label>
            <input type="password" name="password_confirmation" required autocomplete="new-password"
                   placeholder="Repetă parola"
                   class="{{ $errors->has('password_confirmation') ? 'is-error' : '' }}">
            @error('password_confirmation')
              <div class="field-error">
                <svg width="11" height="11" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                {{ $message }}
              </div>
            @enderror
          </div>

          {{-- GDPR Consent --}}
          <div style="display:flex;align-items:flex-start;gap:10px;margin-bottom:16px">
            <input type="checkbox" name="gdpr_consent" id="gdpr_consent" required
                   style="margin-top:3px;flex-shrink:0;width:15px;height:15px;accent-color:#00b4d8;cursor:pointer">
            <label for="gdpr_consent" style="font-size:.8rem;color:#4b5563;line-height:1.6;cursor:pointer">
              Am citit și accept
              <a href="{{ route('legal.privacy') }}" target="_blank" style="color:#00b4d8;text-decoration:underline">Politica de Confidențialitate</a>
              și
              <a href="{{ route('legal.terms') }}" target="_blank" style="color:#00b4d8;text-decoration:underline">Termenii și Condițiile</a>. *
            </label>
          </div>
          @error('gdpr_consent')
            <p style="color:#dc2626;font-size:.78rem;margin-bottom:10px">{{ $message }}</p>
          @enderror

          <button type="submit" class="auth-submit-btn">Creează cont →</button>
        </form>

        <div class="auth-divider"><span>sau continuă cu</span></div>
        <div class="auth-social-row">
          <a href="{{ route('auth.google') }}" class="auth-social-btn" title="Continuă cu Google">
            <svg width="22" height="22" viewBox="0 0 48 48">
              <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
              <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
              <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
              <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.18 1.48-4.97 2.31-8.16 2.31-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
            </svg>
          </a>
          <a href="{{ route('auth.facebook') }}" class="auth-social-btn" title="Continuă cu Facebook">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="#1877F2">
              <path d="M24 12.073C24 5.404 18.627 0 12 0S0 5.404 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.885v2.271h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/>
            </svg>
          </a>
        </div>

        <div class="auth-switch">
          Ai deja cont?
          <button type="button" @click="tab = 'login'">Autentifică-te</button>
        </div>
      </div>

    </div>{{-- /auth-form-body --}}
  </div>{{-- /auth-card --}}
</div>{{-- /auth-page --}}
@endsection
