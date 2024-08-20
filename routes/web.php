<?php

use App\Http\Controllers\ProfileController;
use App\Models\Klpd;
use App\Models\Lpse;
use App\Models\Post;
use App\Models\Satker;
use App\Models\Tender;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/blog', function () {
    $params = [
        'title' => 'Blog Post',
        'posts' => Post::all()
    ];
    return view('blog', $params);
});

Route::get('/blog/{post:slug}', function (Post $post) {
    $params = [
        'title' => 'Post',
        'post' => $post
    ];
    return view('post', $params);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

Route::get('/admin', function () {
    return view('backend/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/klpd', function () {
    $params = [
        'title' => 'Master KLPD',
        'datas' => Klpd::paginate()
    ];

    return view('backend/klpd', $params);
})->middleware(['auth', 'verified'])->name('klpd');

Route::get('/admin/lpse', function () {
    $params = [
        'title' => 'Master KLPD',
        'datas' => Lpse::paginate()
    ];
    return view('backend/lpse', $params);
})->middleware(['auth', 'verified'])->name('lpse');

Route::get('/admin/satker', function () {
    $params = [
        'title' => 'Master KLPD',
        'datas' => Satker::paginate()
    ];
    return view('backend/satker', $params);
})->middleware(['auth', 'verified'])->name('satker');

Route::get('/admin/tender', function () {
    $params = [
        'title' => 'Master KLPD',
        'datas' => Tender::paginate()
    ];
    return view('backend/tender', $params);
})->middleware(['auth', 'verified'])->name('tender');

Route::get('/admin/nontender', function () {
    return view('backend/nontender');
})->middleware(['auth', 'verified'])->name('nontender');

Route::get('/admin/daftarhitam', function () {
    return view('backend/daftarhitam');
})->middleware(['auth', 'verified'])->name('daftarhitam');

Route::get('/admin/lelang', function () {
    return view('backend/lelang');
})->middleware(['auth', 'verified'])->name('lelang');

Route::get('/admin/swakelola', function () {
    return view('backend/swakelola');
})->middleware(['auth', 'verified'])->name('swakelola');

Route::get('/admin/pinproyek', function () {
    return view('backend/pinproyek');
})->middleware(['auth', 'verified'])->name('pinproyek');

Route::get('/admin/konfirmasi', function () {
    return view('backend/konfirmasi');
})->middleware(['auth', 'verified'])->name('konfirmasi');

Route::get('/admin/pesan', function () {
    return view('backend/pesan');
})->middleware(['auth', 'verified'])->name('pesan');

Route::get('/admin/users', function () {
    return view('backend/users');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/admin/inbox', function () {
    return view('backend/inbox');
})->middleware(['auth', 'verified'])->name('inbox');

Route::get('/admin/setting', function () {
    return view('backend/setting');
})->middleware(['auth', 'verified'])->name('setting');

Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
