<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => ['web']], function () {
    Route::get('/', [
            'as' => 'auth',
            'uses' => 'IndexController@auth'
        ]
    );

    Route::get('/init', [
            'as' => 'question.init',
            'uses' => 'IndexController@index'
        ]
    );

    Route::post('/questions/next', [
            'as' => 'questions.next',
            'uses' => 'IndexController@next'
        ]
    );

    Route::get('/questions/end', [
            'as' => 'questions.end',
            'uses' => 'IndexController@end'
        ]
    );

    Route::post('/auth/check', [
            'as' => 'auth.check',
            'uses' => 'IndexController@authCheck'
        ]
    );


});




Route::group(['middleware' => ['web', 'role:admin']], function () {

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
        Route::get('/', [
                'as' => 'admin.index',
                'uses' => 'AdminController@index'
            ]
        );

        Route::get('/user/create', [
                'as' => 'user.create',
                'uses' => 'AdminController@userCreate'
            ]
        );

        Route::post('/user/register', [
                'as' => 'user.register',
                'uses' => 'AdminController@userRegister'
            ]
        );

        Route::get('/question/create', [
                'as' => 'question.create',
                'uses' => 'AdminController@questionCreate'
            ]
        );

        Route::get('/question', [
                'as' => 'question.list',
                'uses' => 'AdminController@question'
            ]
        );

        Route::get('/question/edit/{id}', [
                'as' => 'question.edit',
                'uses' => 'AdminController@questionEdit'
            ]
        );

        Route::post('/question/register', [
                'as' => 'question.register',
                'uses' => 'AdminController@questionRegister'
            ]
        );
    });
});
