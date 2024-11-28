<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DaftarHitamController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\KlpdController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\LpseController;
use App\Http\Controllers\OutboxController;
use App\Http\Controllers\PembukuanController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PinPaketController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SatkerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SwakelolaController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
use App\Models\Klpd;
use App\Models\Lelang;
use App\Models\Lpse;
use App\Models\Post;
use App\Models\Satker;
use App\Models\Setting;
use App\Models\Swakelola;
use App\Models\Tender;
use App\Models\User;
use App\Table;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;
use PHPHtmlParser\Dom\HtmlNode;
use App\AppLpse;
use App\Http\Controllers\KomisiController;
use App\Models\Category;
use PHPHtmlParser\Dom;


Route::prefix('admin')->group(function () {

    Route::middleware(['auth', 'verified'])->group(function () {
        // Registered Member
        Route::get('/', function () {
            $lpse = Lpse::orderBy('jumlah_paket', 'DESC');
            $params = [
                'title' => 'Dashboard',
                'setting' => AppLpse::setting('logo_image'),
                'datas' => $lpse->limit(5)->get(),
                'klpd' => Klpd::count(),
                'lpse' => $lpse->count(),
                'satker' => Satker::count(),
                'tender' => Tender::count(),
                'lelang' => Lelang::count(),
                'swakelola' => Swakelola::count(),
                'users' => User::count(),
            ];
            return view('backend/dashboard', $params);
        })->name('dashboard');
    });

    // Personal member
    Route::middleware(['personal', 'auth', 'verified'])->group(function () {
        // Route KLPD
        Route::resource('/klpd', KlpdController::class)->names('klpd');

        // Route LPSE
        Route::resource('/lpse', LpseController::class)->names('lpse');

        // Route Satuan Kerja (Satker)
        Route::resource('/satker', SatkerController::class)->names('satker');

        // Route Tender
        Route::resource('/tender', TenderController::class)->names('tender');

        // Route Swakelola
        Route::resource('/pinproyek', PinPaketController::class)->names('pinproyek');
    });

    // Corporate member
    Route::middleware(['corporate', 'auth', 'verified'])->group(function () {
        // Route Lelang
        Route::resource('/lelang', LelangController::class)->names('lelang');

        // Route Swakelola
        Route::resource('/swakelola', SwakelolaController::class)->names('swakelola');

        // Route Daftar Hitam
        Route::resource('/daftarhitam', DaftarHitamController::class)->names('daftarhitam');
    });

    // Super Admin
    Route::middleware(['admin', 'auth', 'verified'])->group(function () {
        // Pesan
        Route::resource('/pesan', PesanController::class)->names('pesan');

        // Category Artikel
        Route::resource('/category', CategoryController::class)->names('category');

        // Route Konfirmasi
        Route::resource('/konfirmasi', KonfirmasiController::class)->names('konfirmasi');

        // Route Users
        Route::resource('/users', UserController::class)->names('user');

        // Route User Group
        Route::resource('/usergroup', UserGroupController::class)->names('usergroup');

        // Route Inbox
        Route::resource('/inbox', InboxController::class)->names('inbox');

        // Route Outbox
        Route::resource('/outbox', OutboxController::class)->names('outbox');

        // Route Pembukuan
        Route::resource('/pembukuan', PembukuanController::class)->names('pembukuan');

        // Route Komisi
        Route::resource('/komisi', KomisiController::class)->names('komisi');

        // Route Setting
        Route::resource('/setting', SettingController::class)->names('setting');

        // Post Artikel
        Route::resource('/post', PostController::class)->names('post');
    });
});

Route::post('/admin/inbox/deletes', [InboxController::class, 'deletes'])->middleware('admin');
Route::post('/admin/outbox/deletes', [OutboxController::class, 'deletes'])->middleware('admin');
Route::post('/admin/outbox/resend', [OutboxController::class, 'resend'])->middleware('admin');
Route::post('/admin/addkonfirmasi', [KonfirmasiController::class, 'store']);
Route::post('/admin/kirimpesan', [PesanController::class, 'store']);
Route::post('/admin/lpsestate', [LpseController::class, 'status'])->middleware('admin');
Route::get('/admin/nontender', function () {
    $params = [
        'title' => 'Non Tender',
        'setting' => AppLpse::setting('logo_image'),
        // 'html' => HtmlNode::
        // 'datas' => KonfirmasiPembayaran::paginate()
    ];
    return view('backend/nontender', $params);
})->middleware(['auth', 'verified'])->name('nontender');

//================== FRONT END PAGE =======================
Route::get('/', function () {
    $params = [
        'title' => 'Home Page | ' . config('app.name'),
        'description' => 'Applikasi Data LPSE seluruh Indonesia'
    ];

    return view('home', $params);
})->name('home');

Route::get('/blog', function () {
    $params = [
        'title' => 'Blog Post',
        'posts' => Post::all()
    ];
    return view('blog', $params);
})->name('posts');

Route::get('/blog/{post:slug}', function (Post $post) {
    $params = [
        'title' => 'Post',
        'post' => $post
    ];
    return view('post', $params);
})->name('post');

Route::get('/categories', function () {
    $params = [
        'title' => 'Categories',
        'categories' => Category::all()
    ];
    return view('categories', $params);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    //
    $params = [
        'title' => 'Post',
        'category' => $category
    ];
    return view('category', $params);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

Route::get('lpse', function () {
    $params = [
        'title' => 'LPSE',
        'setting' => AppLpse::setting('logo_image'),
        'lpses' => Lpse::orderBy('jumlah_paket', 'DESC')->paginate(4)
    ];
    return view('lpses', $params);
});
// Lpse Page
Route::get('/lpse/{lpse:slug}', function (Lpse $lpse) {
    $params = [
        'title' => 'LPSE',
        'setting' => AppLpse::setting('logo_image'),
        'lpse' => $lpse
    ];
    return view('lpse', $params);
});
Route::get('/tender', function () {
    //
    $params = [
        'title' => 'Tender Terbaru',
        'setting' => AppLpse::setting('logo_image'),
        'tenders' => Tender::orderBy('id', 'DESC')->limit(4)->get()
    ];
    return view('tenders', $params);
});

Route::get('/tender/{tender:slug}', function (Tender $tender) {
    //
    dd($tender);
});
// Referal link
Route::get('/r/{user:username}', function (User $user) {
    return redirect('/')->withCookie(cookie('upline', $user->username, 60 * 24 * 30));
})->name('referal');

// Authentication
Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/admin/profile/edit', [ProfileController::class, 'updateprofile'])->name('profile.updateprofile');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/install', function () {
    // Artisan::call('make:migrate');
    Artisan::call('db:seed');
    return redirect()->to('/')->with('message', 'Migrate database behasil');
})->name('install');

require __DIR__ . '/auth.php';
