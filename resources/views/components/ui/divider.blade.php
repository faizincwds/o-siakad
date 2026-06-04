@props([
    'text' => ''
])

<div class="relative flex py-4 items-center text-xs text-muted">
    <div class="grow border-t border-card-border/60"></div>
    <span class="mx-4">{{ $text }}</span>
    <div class="grow border-t border-card-border/60"></div>
</div>

