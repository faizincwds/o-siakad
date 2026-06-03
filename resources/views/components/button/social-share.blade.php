@props([
    'url' => request()->fullUrl(),
    'title' => config('app.name'),
])

<div
    class="flex flex-wrap items-center gap-2"
>

    {{-- WhatsApp --}}
    <a
        target="_blank"
        href="https://wa.me/?text={{ urlencode($title.' '.$url) }}"
        class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-green-500 text-white text-sm hover:opacity-90"
    >
        <span class="material-icons-outlined text-[18px]">
            chat
        </span>
        WhatsApp
    </a>

    {{-- Facebook --}}
    <a
        target="_blank"
        href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
        class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-blue-600 text-white text-sm hover:opacity-90"
    >
        <span class="material-icons-outlined text-[18px]">
            thumb_up
        </span>
        Facebook
    </a>

    {{-- Twitter/X --}}
    <a
        target="_blank"
        href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($title) }}"
        class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-black text-white text-sm hover:opacity-90"
    >
        <span class="material-icons-outlined text-[18px]">
            alternate_email
        </span>
        X
    </a>

    {{-- Telegram --}}
    <a
        target="_blank"
        href="https://t.me/share/url?url={{ urlencode($url) }}&text={{ urlencode($title) }}"
        class="inline-flex items-center gap-2 px-3 py-2 rounded-lg bg-sky-500 text-white text-sm hover:opacity-90"
    >
        <span class="material-icons-outlined text-[18px]">
            send
        </span>
        Telegram
    </a>

</div>
