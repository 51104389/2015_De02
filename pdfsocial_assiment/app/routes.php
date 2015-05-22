<?php
Route::pattern('id', '[0-9]+');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::group(array('prefix' => 'admin'), function()
{
    Route::group(array('prefix' => 'api'), function(){
        Route::get('user', function()
        {
            return "456";
        });
    });
    
    

    Route::get('user', function()
    {
        return "123";
    });
    
    

});
//localhost:8000/user/login

Route::group(array('prefix' => 'user'), function(){

    Route::get('login', 'UserController@loginForm');

    Route::post('login', 'UserController@login');



    Route::get('register', 'UserController@registerForm');

    Route::post('register', 'UserController@register');

    Route::get('logout', 'UserController@logout');

    Route::get('info', 'UserController@viewInfoForm');

    Route::post('info', 'UserController@changeUserInfo');

    Route::get('password', 'UserController@viewFormChangePassword');

    Route::post('password', 'UserController@changeUserPassword');

    Route::get('article', 'UserController@viewFormArticle');

    Route::post('article', 'UserController@addArticle');

});






Route::group(array('prefix' => 'admin'), function(){

    Route::get('', 'AdminController@homepage');

    Route::get('/add-category', 'AdminController@viewAddCategory');

    Route::post('/add-category', 'AdminController@addCategory');

    Route::get('/control-category', 'AdminController@viewControlCategory');

    Route::get('/add-user', 'AdminController@viewAddUser');

    Route::post('/add-user', 'AdminController@addUser');

    Route::get('/control-user', 'AdminController@viewControlUser');

    Route::get('login', 'AdminController@viewFormLogin');

    Route::post('login', 'AdminController@login');

    Route::get('logout', 'AdminController@logout');

    Route::get('control-post', 'AdminController@viewControlPost');







    Route::group(array('prefix' => 'delete'), function(){

        Route::post('category', 'AdminController@removeCategory');

        Route::post('user', 'AdminController@removeUser');

        Route::post('post', 'AdminController@removePost');

    });

});










Route::group(array('prefix' => 'social'), function(){

    Route::get('', 'SocialController@home');

    Route::get('cat', 'SocialController@showPostInCat');

    Route::get('file', 'SocialController@getFile');

    Route::get('post', 'SocialController@showPost');

    Route::post('comment', "SocialController@postComment");

    Route::post('like', "SocialController@postLike");


});






