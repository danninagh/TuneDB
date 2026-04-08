@extends('layouts.app')

@section('title', $tune->name)

@section('content')
<div class="w-1/2">
        <article class="mb-4 rounded-xl border border-gray-300 p-4 shadow-sm">
<h3 class="mb-2 text-xl font-semibold">Tune #{{$tune->id}} ({{ $tune->name }})</h3>

            <div class="mb-3 text-sm text-gray-600">
                Type: {{ $tune->tuneType?->name ?? 'Unknown' }} |
                Key: {{ $tune->key ?? 'C' }}
            </div>

            <div
                class="notation overflow-x-auto"
                id="notation-{{ $tune->id }}"
                data-title=" "
                data-key="{{ $tune->key ?? 'C' }}"
                data-meter="{{ $tune->tuneType?->time_signature ?? '4/4' }}"
                data-abc="{{ $tune->two_bar }}"
            ></div>
        </article>

    <script>
        document.querySelectorAll('.notation').forEach((el) => {
            const title = el.dataset.title || '';
            const key = el.dataset.key || 'C';
            const meter = el.dataset.meter || '4/4';
            const notes = el.dataset.abc || '';

            const abc = `X:1
T:${title}
M:${meter}
L:1/8
K:${key}
${notes}`;

            ABCJS.renderAbc(el, abc, {
                responsive: 'resize',
                staffwidth: 600,
            });
        });
    </script>
    </div>
@endsection
