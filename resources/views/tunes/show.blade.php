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
            @if ($tune->books->isNotEmpty())
                <section class="mt-8">
                    <h2 class="text-xl font-semibold mb-3">Bibliography</h2>

                    <ul class="space-y-2">
                        @foreach ($tune->books as $book)
                            <li>
                                <strong>{{ $book->name }}</strong>
                                @if ($book->author)
                                    — {{ $book->author }}
                                @endif
                                @if ($book->publication_date)
                                    ({{ \Illuminate\Support\Carbon::parse($book->publication_date)->format('Y') }})
                                @endif

                                @if ($book->pivot->name_in_book || $book->pivot->page_number || $book->pivot->tune_number)
                                    <div class="text-sm text-gray-600">
                                        @if ($book->pivot->name_in_book)
                                            Printed as: {{ $book->pivot->name_in_book }}
                                        @endif

                                        @if ($book->pivot->page_number)
                                            , p. {{ $book->pivot->page_number }}
                                        @endif

                                        @if ($book->pivot->tune_number)
                                            , tune {{ $book->pivot->tune_number }}
                                        @endif
                                    </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endif

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
