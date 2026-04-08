@extends('layouts.app')

@section('title', 'Tunes')

@section('content')
    <h2 class="mb-6 text-2xl font-semibold">Tunes</h2>
<div class="w-1/2">
    @foreach ($tunes as $tune)
        <article class="mb-4 rounded-xl border border-gray-300 p-4 shadow-sm">
            <a href="/tunes/{{$tune->id}}"><h3 class="mb-2 text-xl font-semibold">Tune #{{$tune->id}} ({{ $tune->name }})</h3></a>

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
    @endforeach

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
