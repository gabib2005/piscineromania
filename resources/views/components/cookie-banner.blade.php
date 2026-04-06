{{-- Cookie Banner — PiscineRomania GDPR --}}
<div id="cookie-banner"
     style="display:none;position:fixed;bottom:0;left:0;right:0;z-index:9999;background:#0a2540;color:#fff;box-shadow:0 -4px 24px rgba(0,0,0,0.18)">

    {{-- Main message --}}
    <div id="cookie-main" style="padding:1rem 1.25rem">
        <div style="max-width:1200px;margin:0 auto">
            <div style="display:flex;flex-wrap:wrap;align-items:flex-start;gap:1rem">

                {{-- Icon + Text --}}
                <div style="flex:1;min-width:240px">
                    <div style="display:flex;align-items:center;gap:0.625rem;margin-bottom:0.375rem">
                        <svg width="18" height="18" fill="none" stroke="#00b4d8" stroke-width="2" viewBox="0 0 24 24" style="flex-shrink:0">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        </svg>
                        <span style="font-weight:700;font-size:0.9rem;font-family:'Outfit',sans-serif">Cookie-uri și confidențialitate</span>
                    </div>
                    <p style="font-size:0.78rem;color:rgba(255,255,255,0.8);margin:0;line-height:1.5">
                        Utilizăm cookie-uri pentru funcționarea platformei și, cu consimțământul dumneavoastră, pentru analiză și marketing.
                        <a href="{{ route('legal.cookies') }}" style="color:#00b4d8;text-decoration:underline" target="_blank">Politica Cookies</a>
                        ·
                        <a href="{{ route('legal.privacy') }}" style="color:#00b4d8;text-decoration:underline" target="_blank">Confidențialitate</a>
                    </p>
                </div>

                {{-- Buttons --}}
                <div style="display:flex;flex-wrap:wrap;align-items:center;gap:0.5rem;flex-shrink:0">
                    <button onclick="cookieSetAll(true)"
                            style="background:#00b4d8;color:#fff;border:none;padding:0.5rem 1.125rem;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;font-family:'Outfit',sans-serif;white-space:nowrap;transition:background .2s"
                            onmouseover="this.style.background='#0096b8'" onmouseout="this.style.background='#00b4d8'">
                        Acceptă toate
                    </button>
                    <button onclick="cookieSetAll(false)"
                            style="background:rgba(255,255,255,0.1);color:#fff;border:1px solid rgba(255,255,255,0.25);padding:0.5rem 1rem;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;font-family:'Outfit',sans-serif;white-space:nowrap;transition:background .2s"
                            onmouseover="this.style.background='rgba(255,255,255,0.18)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">
                        Doar necesare
                    </button>
                    <button onclick="cookieToggleSettings()"
                            style="background:transparent;color:rgba(255,255,255,0.7);border:none;padding:0.5rem 0.75rem;border-radius:8px;font-size:0.78rem;cursor:pointer;font-family:'Outfit',sans-serif;white-space:nowrap;text-decoration:underline">
                        Setări cookies
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Settings panel (collapsible) --}}
    <div id="cookie-settings" style="display:none;border-top:1px solid rgba(255,255,255,0.1)">
        <div style="max-width:1200px;margin:0 auto;padding:1rem 1.25rem">
            <p style="font-size:0.78rem;color:rgba(255,255,255,0.7);margin:0 0 0.875rem;font-style:italic">
                Personalizați preferințele dvs. de cookie-uri. Cookie-urile necesare nu pot fi dezactivate.
            </p>
            <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(240px,1fr));gap:0.75rem;margin-bottom:1rem">

                {{-- Necesare --}}
                <div style="background:rgba(255,255,255,0.07);border-radius:10px;padding:0.875rem 1rem;border:1px solid rgba(255,255,255,0.1)">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.375rem">
                        <span style="font-weight:600;font-size:0.83rem">Cookie-uri necesare</span>
                        <label style="position:relative;display:inline-block;width:36px;height:20px;cursor:not-allowed;opacity:.6">
                            <input type="checkbox" id="cookie-necessary" checked disabled style="opacity:0;width:0;height:0">
                            <span style="position:absolute;inset:0;background:#00b4d8;border-radius:20px"></span>
                            <span style="position:absolute;top:3px;left:3px;width:14px;height:14px;background:#fff;border-radius:50%;transition:.3s;transform:translateX(16px)"></span>
                        </label>
                    </div>
                    <p style="font-size:0.72rem;color:rgba(255,255,255,0.6);margin:0;line-height:1.5">Sesiune, CSRF, autentificare. Nu pot fi dezactivate.</p>
                </div>

                {{-- Analitice --}}
                <div style="background:rgba(255,255,255,0.07);border-radius:10px;padding:0.875rem 1rem;border:1px solid rgba(255,255,255,0.1)">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.375rem">
                        <span style="font-weight:600;font-size:0.83rem">Cookie-uri analitice</span>
                        <label style="position:relative;display:inline-block;width:36px;height:20px;cursor:pointer">
                            <input type="checkbox" id="cookie-analytics" style="opacity:0;width:0;height:0" onchange="cookieUpdateToggle(this)">
                            <span id="track-analytics" style="position:absolute;inset:0;background:rgba(255,255,255,0.2);border-radius:20px;transition:.3s"></span>
                            <span id="thumb-analytics" style="position:absolute;top:3px;left:3px;width:14px;height:14px;background:#fff;border-radius:50%;transition:.3s"></span>
                        </label>
                    </div>
                    <p style="font-size:0.72rem;color:rgba(255,255,255,0.6);margin:0;line-height:1.5">Google Analytics — statistici de trafic anonimizate.</p>
                </div>

                {{-- Marketing --}}
                <div style="background:rgba(255,255,255,0.07);border-radius:10px;padding:0.875rem 1rem;border:1px solid rgba(255,255,255,0.1)">
                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.375rem">
                        <span style="font-weight:600;font-size:0.83rem">Cookie-uri marketing</span>
                        <label style="position:relative;display:inline-block;width:36px;height:20px;cursor:pointer">
                            <input type="checkbox" id="cookie-marketing" style="opacity:0;width:0;height:0" onchange="cookieUpdateToggle(this)">
                            <span id="track-marketing" style="position:absolute;inset:0;background:rgba(255,255,255,0.2);border-radius:20px;transition:.3s"></span>
                            <span id="thumb-marketing" style="position:absolute;top:3px;left:3px;width:14px;height:14px;background:#fff;border-radius:50%;transition:.3s"></span>
                        </label>
                    </div>
                    <p style="font-size:0.72rem;color:rgba(255,255,255,0.6);margin:0;line-height:1.5">Facebook Pixel, Google Ads — reclame personalizate.</p>
                </div>

            </div>
            <div style="display:flex;gap:0.5rem;flex-wrap:wrap">
                <button onclick="cookieSaveSettings()"
                        style="background:#00b4d8;color:#fff;border:none;padding:0.5rem 1.25rem;border-radius:8px;font-size:0.8rem;font-weight:600;cursor:pointer;font-family:'Outfit',sans-serif">
                    Salvează preferințele
                </button>
                <button onclick="cookieToggleSettings()"
                        style="background:transparent;color:rgba(255,255,255,0.7);border:1px solid rgba(255,255,255,0.2);padding:0.5rem 1rem;border-radius:8px;font-size:0.78rem;cursor:pointer;font-family:'Outfit',sans-serif">
                    Închide
                </button>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    var CONSENT_KEY = 'cookie_consent';

    function getConsent() {
        try { return JSON.parse(localStorage.getItem(CONSENT_KEY)); } catch(e) { return null; }
    }

    function saveConsent(analytics, marketing) {
        var data = { necessary: true, analytics: analytics, marketing: marketing, ts: Date.now() };
        localStorage.setItem(CONSENT_KEY, JSON.stringify(data));
        // Also set a simple cookie for server-side reading
        document.cookie = CONSENT_KEY + '=1; path=/; max-age=' + (365*24*3600) + '; SameSite=Lax';
        // Report to server (fire-and-forget)
        try {
            fetch('{{ route("gdpr.consent") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': (document.querySelector('meta[name=csrf-token]') || {}).content || ''
                },
                body: JSON.stringify({ consents: { necessary: true, analytics: analytics, marketing: marketing } })
            }).catch(function(){});
        } catch(e) {}
    }

    function hideBanner() {
        var b = document.getElementById('cookie-banner');
        if (b) { b.style.transition = 'opacity .4s'; b.style.opacity = '0'; setTimeout(function(){ b.style.display = 'none'; }, 400); }
    }

    window.cookieSetAll = function(all) {
        saveConsent(all, all);
        hideBanner();
    };

    window.cookieToggleSettings = function() {
        var s = document.getElementById('cookie-settings');
        if (s) s.style.display = s.style.display === 'none' ? 'block' : 'none';
    };

    window.cookieUpdateToggle = function(checkbox) {
        var id = checkbox.id.replace('cookie-', '');
        var track = document.getElementById('track-' + id);
        var thumb = document.getElementById('thumb-' + id);
        if (track && thumb) {
            if (checkbox.checked) {
                track.style.background = '#00b4d8';
                thumb.style.transform = 'translateX(16px)';
            } else {
                track.style.background = 'rgba(255,255,255,0.2)';
                thumb.style.transform = 'translateX(0)';
            }
        }
    };

    window.cookieSaveSettings = function() {
        var analytics = document.getElementById('cookie-analytics').checked;
        var marketing = document.getElementById('cookie-marketing').checked;
        saveConsent(analytics, marketing);
        hideBanner();
    };

    // On DOM ready: show banner only if no consent stored
    document.addEventListener('DOMContentLoaded', function() {
        if (!getConsent()) {
            var b = document.getElementById('cookie-banner');
            if (b) { b.style.display = 'block'; }
        }
    });
})();
</script>
