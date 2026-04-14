@props(['photos', 'title' => ''])
<div x-data="{
    open: false,
    current: 0,
    photos: {{ json_encode($photos) }},
    show(i) { this.current = i; this.open = true; },
    prev() { this.current = (this.current - 1 + this.photos.length) % this.photos.length; },
    next() { this.current = (this.current + 1) % this.photos.length; }
}">
    {{-- Grid de poze --}}
    <div class="pr-photo-grid pr-photo-grid-{{ count($photos) === 6 ? '6' : '4' }}">
        @foreach($photos as $i => $photo)
        <div class="pr-photo-card" @click="show({{ $i }})">
            <img src="{{ $photo['url'] }}" alt="{{ $photo['alt'] }}" loading="lazy">
        </div>
        @endforeach
    </div>

    {{-- Lightbox popup --}}
    <div x-show="open" x-cloak
         style="position:fixed;inset:0;background:rgba(0,0,0,0.88);z-index:9999;display:flex;align-items:center;justify-content:center;"
         @click.self="open=false" @keydown.escape.window="open=false">
        <button @click="prev()" style="position:absolute;left:24px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.15);border:none;color:#fff;width:48px;height:48px;border-radius:50%;font-size:24px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background 0.2s;" @mouseenter="$el.style.background='rgba(255,255,255,0.25)'" @mouseleave="$el.style.background='rgba(255,255,255,0.15)'">&#8249;</button>
        <div style="max-width:800px;width:90%;text-align:center;">
            <img :src="photos[current].url" :alt="photos[current].alt" style="max-height:70vh;width:100%;object-fit:contain;border-radius:8px;box-shadow:0 20px 60px rgba(0,0,0,0.5);">
            <p x-text="photos[current].desc" style="color:#fff;margin-top:16px;font-size:15px;font-family:'Nunito',sans-serif;opacity:0.9;"></p>
            <p style="color:rgba(255,255,255,0.4);font-size:12px;margin-top:8px;" x-text="(current+1) + ' / ' + photos.length"></p>
        </div>
        <button @click="next()" style="position:absolute;right:24px;top:50%;transform:translateY(-50%);background:rgba(255,255,255,0.15);border:none;color:#fff;width:48px;height:48px;border-radius:50%;font-size:24px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:background 0.2s;" @mouseenter="$el.style.background='rgba(255,255,255,0.25)'" @mouseleave="$el.style.background='rgba(255,255,255,0.15)'">&#8250;</button>
        <button @click="open=false" style="position:absolute;top:24px;right:24px;background:rgba(255,255,255,0.15);border:none;color:#fff;width:40px;height:40px;border-radius:50%;font-size:20px;cursor:pointer;display:flex;align-items:center;justify-content:center;">&#215;</button>
    </div>
</div>
