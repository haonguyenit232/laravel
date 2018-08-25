<?php

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
Route::pattern('id', '[0-9]+');
Route::group(['middleware' => 'lang'], function () {
    Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'adminRole']], function () {
        Route::resource('/users', 'UsersController', [
            'as' => 'admin'
        ]);
        Route::resource('/wordlist', 'WordlistController', [
            'as' => 'admin'
        ]);
        Route::resource('/category', 'CategoryController', [
            'as' => 'admin'
        ]);
        Route::resource('/users', 'UsersController', [
            'as' => 'admin',
        ]);
        Route::resource('/wordlist', 'WordlistController', [
            'as' => 'admin',
        ]);
        Route::resource('/category', 'CategoryController', [
            'as' => 'admin',
        ]);
        Route::resource('/users', 'UsersController', [
            'as' => 'admin',
        ]);
        Route::resource('/courses', 'CoursesController', [
            'as' => 'admin',
        ]);
        Route::get('/404', [
            'uses' => 'NotFoundController@index',
            'as' => 'admin.404',
        ]);
        Route::post('/searchcategory', [
            'uses' => 'AjaxController@searchCategory',
            'as' => 'admin.search.category',
        ]);
        Route::post('/searchwordlist', [
            'uses' => 'AjaxController@searchWordlist',
            'as' => 'admin.search.wordlist',
        ]);
    });
    Route::get('/', 'HomeController@index')->name('home');
    Route::group(['namespace' => 'Elearning'], function () {
        Route::resource('/profile', 'ProfileController', [
            'as' => 'elearning',
        ]);
        Route::get('/profile/addfollow/{id}', [
            'uses' => 'ProfileController@addFollow',
            'as' => 'elearning.profile.addfollow',
        ]);
        Route::get('/profile/unfollow/{id}', [
            'uses' => 'ProfileController@unFollow',
            'as' => 'elearning.profile.unfollow',
        ]);
        Route::post('/profile/editpassword', [
            'uses' => 'ProfileController@updatePassword',
            'as' => 'elearning.profile.updatepassword',
        ]);
        Route::resource('/courses', 'CoursesController', [
            'as' => 'elearning',
        ]);
        Route::resource('courses.wordlist', 'WordListController', [
            'as' => 'elearning',
        ]);
        Route::post('/ajax/wordlist/filter', [
            'uses' => 'WordListController@ajaxFilterWordlist',
            'as' => 'filterWordlist',
        ]);
        Route::group(['middleware' => 'auth'], function() {
            Route::resource('courses.lesson', 'LessonController', [
                'as' => 'elearning',
            ]);
            Route::get('/test/{id}', [
                'uses' => 'TestController@index',
                'as' => 'elearning.test.index',
            ]);
            Route::post('/show/{id}', [
                'uses' => 'TestController@show',
                'as' => 'elearning.test.show',
            ]);
            Route::get('test/result/{id}', [
                'uses' => 'TestController@result',
                'as' => 'elearning.test.result',
            ]);
            Route::get('/practice/{id}', [
                'uses' => 'PracticeController@practiceLesson',
                'as' => 'elearning.practice.index',
            ]);
            Route::get('/practicecourse/{id}', [
                'uses' => 'PracticeController@practiceCourse',
                'as' => 'elearning.practicecourse.index',
            ]);
            Route::post('/practice/show/{id}', [
                'uses' => 'PracticeController@show',
                'as' => 'elearning.practice.show',
            ]);
            Route::get('practice/result/{id}', [
                'uses' => 'PracticeController@result',
                'as' => 'elearning.practice.result',
            ]);
            Route::resource('courses.lesson.learn', 'LearnController', [
                'as' => 'elearning'
            ]);
            Route::get('/review/word/{course}/lesson/{lesson}', [
                'uses' => 'ReviewController@reviewWordLesson',
                'as' => 'elearning.review.word.lesson',
            ]);
            Route::get('/review/word/{course}', [
                'uses' => 'ReviewController@reviewWordCourse',
                'as' => 'elearning.review.word.course',
            ]);
        });
        Route::resource('/profile', 'ProfileController', [
            'as' => 'elearning',
        ]);
        Route::post('/profile/editpassword', [
            'uses' => 'ProfileController@updatePassword',
            'as' => 'elearning.profile.updatepassword',
        ]);
        Route::resource('/category', 'CategoryController', [
            'as' => 'elearning',
        ]);
        Route::post('/ajax/lesson/changeLesson', [
            'uses' => 'LessonController@ajaxChangeLesson',
            'as' => 'changeLesson',
        ]);
        Route::post('/ajax/learning', [
            'uses' => 'LearnController@ajaxLearning',
            'as' => 'learning',
        ]);
        Route::post('/ajax/reviewing', [
            'uses' => 'ReviewController@ajaxreviewWord',
            'as' => 'reviewing.word',
        ]);
    });
    Route::post('/search', [
        'uses' => 'AjaxController@search',
        'as' => 'elearning.search',
    ]);
    Route::group(['prefix' => '/profile'], function () {
        Route::post('/blockfollow', [
            'uses' => 'AjaxController@blockFollow',
            'as' => 'profile.follow.blockfollow',
        ]);
        Route::post('/unfollow', [
            'uses' => 'AjaxController@unFollow',
            'as' => 'profile.follow.unfollow',
        ]);
    });
    Route::post('/answercorrect', [
        'uses' => 'AjaxController@answerCorrect',
        'as' => 'elearning.test.answercorrect',
    ]);
    Route::post('/wordlist/content', [
        'uses' => 'AjaxController@contentWordlist',
        'as' => 'admin.wordlist.content',
    ]);
    Route::post('/wordlist/delete', [
        'uses' => 'AjaxController@deleteWordlist',
        'as' => 'admin.wordlist.delete',
    ]);
    Route::post('/category/delete', [
        'uses' => 'AjaxController@deleteCategory',
        'as' => 'admin.category.delete',
    ]);
    Route::post('/ajax/adminActive', [
        'uses' => 'UsersController@adminActive',
        'as' => 'adminActive',
    ]);
    Route::post('/ajax/users/deleteAll', [
        'uses' => 'UsersController@deleteAll',
        'as' => 'admin.users.deleteAll',
    ]);
    Route::post('/ajax/users/searchUser', [
        'uses' => 'UsersController@searchUser',
        'as' => 'admin.users.searchUser',
    ]);

    Route::post('/ajax/courses/deleteAll', [
        'uses' => 'CoursesController@deleteAll',
        'as' => 'admin.courses.deleteAll',
    ]);

    Route::post('/ajax/courses/searchCourse', [
        'uses' => 'CoursesController@searchCourse',
        'as' => 'admin.courses.searchCourse',
    ]);
    
    Route::post('/changelanguage', [
        'uses' => 'HomeController@changeLanguage',
        'as' => 'changeLanguage',
    ]);
    
    Route::get('/error/404', 'HomeController@errorPage')->name('404');
    Auth::routes();
    Route::group(['middleware' => 'adminAuth'], function () {
        Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider')->name('authenticate');
        Route::get('/auth/{provide}/callback', 'SocialAuthController@handleProviderCallback');
    });
});
