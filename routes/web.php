<?php
use App\Models\Tune;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::get('/tunes', function() {
    return view('tunes.index', ['tunes' => Tune::orderBy('id')->get(),
    ]);
});
Route::get('/tunes/{tune}', function (Tune $tune) {
    $tune->load('tuneType');

    return view('tunes.show', [
        'tune' => $tune,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
