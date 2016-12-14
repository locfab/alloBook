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
    $booksTemps = App\Book::get();
    foreach($booksTemps as $booksTemp)
    {
        if($booksTemp->urlImage)
            $books[] = $booksTemp;
    }
    shuffle($books);
    return view('welcome', compact('books'));
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
});

Route::get('bookuser/remove/{books}', function($id){
    Auth::user()->books()->detach([$id]);
    $review = Auth::user()->reviews->where('book_id',(int)$id)->first()->delete();
    return redirect()->route('admin.books.show', $id);
})->name('remove');

Route::get('bookuser/add/{books}', function ($id){
    Auth::user()->books()->attach([$id]);
    $review = new \App\Review();
    $review->user_id = Auth::user()->id;
    $review->book_id = $id;
    $review->save();
    return redirect()->route('admin.books.show', $id);
})->name('add');
