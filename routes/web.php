<?php


use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ChannelController;
use App\Models\Channel;

// Include Breeze's authentication routes
require __DIR__.'/auth.php';


Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/packages', [PostController::class, 'packages'])->name('packages');
Route::get('/trai', [PostController::class, 'trai'])->name('trai');
Route::get('/news', [PostController::class, 'news'])->name('news');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/complaint', [ComplaintController::class, 'create'])->name('complaint');
Route::post('/complaint', [ComplaintController::class, 'store'])->name('complaint.store');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

//lcn section
Route::get('/channels', [ChannelController::class, 'channels'])->name('channels');

Route::middleware(['auth', 'can:access-admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('/', [PostController::class, 'adminIndex'])->name('index');
    Route::resource('posts', PostController::class);
    Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaints');
    Route::get('/change-password', function () {
        return view('admin.change-password');
    })->name('change-password');
});

// Route::get('/admin', function () {
//     if (Auth::check()) {
//         $user = Auth::user();
//         if ($user && method_exists($user, 'hasRole') && $user->hasRole('admin')) {
//             Log::info('Admin redirect: User has admin role, redirecting to admin.index', ['user_id' => $user->id]);
//             return redirect()->route('admin.index');
//         }
//         Log::info('Admin redirect: User authenticated but no admin role, redirecting to home', ['user_id' => $user->id]);
//         return redirect()->route('home');
//     }
//     Log::info('Admin redirect: User not authenticated, redirecting to login');
//     return redirect()->route('login');
// })->name('admin');
