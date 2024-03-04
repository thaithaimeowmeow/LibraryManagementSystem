<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('auth.login');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['verified'])->name('dashboard');

        //USER
        Route::get('/users', [UserController::class,'index'])->middleware(['verified'])->name('users');
        Route::get('/users/create', [UserController::class,'create'])->middleware(['verified'])->name('user.create');
        Route::post('/users/create', [UserController::class,'store'])->middleware(['verified'])->name('user.store');
        Route::get('/users/{user}', [UserController::class,'show'])->middleware(['verified'])->name('user.show');
        Route::get('/users/{user}/edit', [UserController::class,'edit'])->middleware(['verified'])->name('user.edit');
        Route::patch('/users/{user}/edit', [UserController::class,'update'])->middleware(['verified'])->name('user.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

        //CARD
        Route::get('/cards', [CardController::class,'index'])->middleware(['verified'])->name('cards');
        Route::get('/cards/create', [CardController::class,'create'])->middleware(['verified'])->name('card.create');
        Route::post('/cards/create', [CardController::class,'store'])->middleware(['verified'])->name('card.store');
        Route::get('/cards/{card}/edit', [CardController::class,'edit'])->middleware(['verified'])->name('card.edit');
        Route::patch('/cards/{card}/edit', [CardController::class,'update'])->middleware(['verified'])->name('card.update');
        Route::delete('/cards/{card}', [CardController::class, 'destroy'])->name('card.destroy');

        //CATEGORY
        Route::get('/categories', [CategoryController::class,'index'])->middleware(['verified'])->name('categories');
        Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->middleware(['verified'])->name('category.edit');
        Route::patch('/categories/{category}/edit', [CategoryController::class,'update'])->middleware(['verified'])->name('category.update');
        Route::get('/categories/create', [CategoryController::class,'create'])->middleware(['verified'])->name('category.create');
        Route::post('/categories/create', [CategoryController::class,'store'])->middleware(['verified'])->name('category.store');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

        //PUBLISHER
        Route::get('/publishers', [PublisherController::class,'index'])->middleware(['verified'])->name('publishers');
        Route::get('/publishers/{publisher}/edit', [PublisherController::class,'edit'])->middleware(['verified'])->name('publisher.edit');
        Route::patch('/publishers/{publisher}/edit', [PublisherController::class,'update'])->middleware(['verified'])->name('publisher.update');
        Route::get('/publishers/create', [PublisherController::class,'create'])->middleware(['verified'])->name('publisher.create');
        Route::post('/publishers/create', [PublisherController::class,'store'])->middleware(['verified'])->name('publisher.store');
        Route::delete('/publishers/{publisher}', [PublisherController::class, 'destroy'])->name('publisher.destroy');


        //PUBLISHER
        Route::get('/authors', [AuthorController::class,'index'])->middleware(['verified'])->name('authors');
        Route::get('/authors/{author}/edit', [AuthorController::class,'edit'])->middleware(['verified'])->name('author.edit');
        Route::patch('/authors/{author}/edit', [AuthorController::class,'update'])->middleware(['verified'])->name('author.update');
        Route::get('/authors/create', [AuthorController::class,'create'])->middleware(['verified'])->name('author.create');
        Route::post('/authors/create', [AuthorController::class,'store'])->middleware(['verified'])->name('author.store');
        Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');

        //PUBLISHER
        Route::get('/books', [BookController::class,'index'])->middleware(['verified'])->name('books');
        Route::get('/books/{book}/edit', [BookController::class,'edit'])->middleware(['verified'])->name('book.edit');
        Route::patch('/books/{book}/edit', [BookController::class,'update'])->middleware(['verified'])->name('book.update');
        Route::get('/books/create', [BookController::class,'create'])->middleware(['verified'])->name('book.create');
        Route::post('/books/create', [BookController::class,'store'])->middleware(['verified'])->name('book.store');
        Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('book.destroy');

        //PUBLISHER
        Route::get('/orders', [OrderController::class,'index'])->middleware(['verified'])->name('orders');
        Route::get('/orders/{order}/edit', [OrderController::class,'edit'])->middleware(['verified'])->name('order.edit');
        Route::patch('/orders/{order}/edit', [OrderController::class,'update'])->middleware(['verified'])->name('order.update');
        Route::get('/orders/create', [OrderController::class,'create'])->middleware(['verified'])->name('order.create');
        Route::post('/orders/create', [OrderController::class,'store'])->middleware(['verified'])->name('order.store');
        Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('order.destroy');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});
