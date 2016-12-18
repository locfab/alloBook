<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $moyBooks = \App\Http\Controllers\BooksController::listMoyBook();
    $dateBooks = \App\Http\Controllers\BooksController::listDateBook();
    $booksMoys = array();
    $booksdates = array();
    foreach($moyBooks as $moyBook){
        $booksMoys[] = App\Book::findOrFail($moyBook->book_id);
    }
    foreach($dateBooks as $dateBook){
        $booksdates[] = App\Book::findOrFail($dateBook->book_id);
    }
    $booksMoys = array_slice($booksMoys, 0, 5);
    $booksdates = array_slice($booksdates, 0, 5);
    return view('welcome', compact('booksMoys', 'booksdates'));
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('books', 'BooksController');

Route::resource('users', 'UsersController');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function (){
    Route::resource('books', 'BooksController');
    Route::resource('friends', 'FriendsController', ['except' => ['update', 'create']]);
        Route::put('friends/{friends}/{status}', 'FriendsController@update')->name('admin.friends.update');
        Route::get('friends/{friends}', 'FriendsController@create')->name('admin.friends.create');
    Route::resource('reviews', 'ReviewsController');
    Route::resource('users', 'UsersController');
    Route::resource('marks', 'MarksController');
});

Route::get('bookuser/remove/{books}', function($id){
    Auth::user()->books()->detach([$id]);
    $review = Auth::user()->reviews->where('book_id',(int)$id)->first()->delete();
    $review = Auth::user()->marks->where('book_id',(int)$id)->where('user_id', Auth::user()->id)->first()->delete();
    return redirect()->route('admin.books.show', $id);
})->name('remove');

Route::get('bookuser/add/{books}', function ($id){
    Auth::user()->books()->attach([$id]);
    $review = new \App\Review();
    $mark = new \App\Mark();

    $review->user_id = Auth::user()->id;
    $review->book_id = $id;

    $mark->user_id = Auth::user()->id;
    $mark->book_id = $id;

    $review->save();
    $mark->save();
    return redirect()->route('admin.books.show', $id);
})->name('add');




