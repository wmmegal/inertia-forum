<?php

use App\Http\Controllers\DiscussionDestroyController;
use App\Http\Controllers\DiscussionShowController;
use App\Http\Controllers\DiscussionSolutionPatchController;
use App\Http\Controllers\DiscussionStoreController;
use App\Http\Controllers\ForumIndexController;
use App\Http\Controllers\MarkdownController;
use App\Http\Controllers\PostDestroyController;
use App\Http\Controllers\PostPatchController;
use App\Http\Controllers\PostStoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserMentionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', ForumIndexController::class)->name('home');
Route::get('/discussions/{discussion:slug}', DiscussionShowController::class)->name('discussions.show');

Route::get('/user_mention', UserMentionController::class)->name('user_mention');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/discussions', DiscussionStoreController::class)->name('discussions.store');
    Route::delete('/discussions/{discussion}', DiscussionDestroyController::class)->name('discussions.destroy');
    Route::patch('/discussions/{discussion}/solution', DiscussionSolutionPatchController::class)->name('discussions.solution.patch');

    Route::post('/discussions/{discussion}/posts', PostStoreController::class)->name('posts.store');
    Route::patch('/posts/{post}', PostPatchController::class)->name('posts.patch');
    Route::delete('/posts/{post}', PostDestroyController::class)->name('posts.destroy');

    Route::post('/markdown', MarkdownController::class)->name('markdown');
});

require __DIR__ . '/auth.php';
