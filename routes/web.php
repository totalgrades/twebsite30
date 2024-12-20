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


//Home public - pages accessible to the public
Route::get('/', 'HomePublicController@index');
Route::get('features', 'HomePublicController@features');
Route::get('videos', 'HomePublicController@videos');
Route::get('schoolRegistrationForm', 'HomePublicController@schoolRegistrationForm');
Route::post('checkdomainavailability', 'HomePublicController@checkDomainAvailability')->name('check_domain_availability');
Route::post('postSchoolRegistrationForm', 'HomePublicController@postSchoolRegistrationForm')->name('SchoolRegistrationForm');

//Documentation - Students - Teacher - Administrators, AskQuestions
Route::get('documentation/alldocumentation/{category}', 'Documentation\DocumentationController@allDocumentation');
Route::get('documentation/showdocumentation/{post}', 'Documentation\DocumentationController@showDocumentation');
Route::post('documentation/addcomment/{post}', 'Documentation\DocumentationController@addComment');
Route::post('documentation/addreply/{comment}', 'Documentation\DocumentationController@addReply');
Route::post('documentation/storenewquestion', 'Documentation\DocumentationController@addNewQuestion');

Route::get('/careers', 'HomePublicController@careers');
Route::get('/careers/jobdetails/{job}', 'HomePublicController@jobDetails');
Route::get('/careers/jobapplicationform/{job}', 'HomePublicController@jobApplicationForm');
Route::post('/careers/postjobapplicationform', 'HomePublicController@postJobApplicationForm');
Route::get('/contact', 'HomePublicController@contact');
Route::post('/postcontactform', 'HomePublicController@postContactForm');

//Stripe Payment Testing
Route::get('/stripe/test', 'Stripe\StripeController@index');
Route::post('/stripe/charge', 'Stripe\StripeController@charge');

//Auth routes
Auth::routes();

//Logged in users
Route::get('/home', 'HomeController@index')->name('home');

//Logged in Admin users
Route::group(['middleware' => 'admin'], function () {
    
    Route::get('/admin/home', 'Admin\HomeController@index');
    Route::get('/admin/contactformsubmissions', 'Admin\HomeController@contactFormSubmissions');

    //Documentation
	    //Categories
	    Route::get('/admin/documentation/categories', 'Admin\Documentation\CategoryController@categories');
	    Route::post('/admin/documentation/storenewcategory', 'Admin\Documentation\CategoryController@storeNewCategory');
	    Route::post('/admin/documentation/storeeditcategory/{category}', 'Admin\Documentation\CategoryController@storeEditCategory');
	    Route::get('/admin/documentation/deletecategory/{category}', 'Admin\Documentation\CategoryController@deleteCategory');

	    //Documentation - Students - Teacher - Administrators
	    Route::get('/admin/documentation/{category}', 'Admin\DocumentationController@documentation')->name('documentation');
	    Route::post('/admin/documentation/storenewdocpost/{category}', 'Admin\DocumentationController@storeNewDocPost');
	    Route::get('/admin/editdocumentation/{post}', 'Admin\DocumentationController@editDocPost');
	    Route::post('/admin/updateeditdocumentation/{post}', 'Admin\DocumentationController@updateEditDocPost');
	    Route::get('/admin/deletedocpost/{post}', 'Admin\DocumentationController@deleteDocPost');    

	    //Comments
	    Route::get('/admin/documentation/categories', 'Admin\Documentation\CategoryController@categories');

    //School Registration
    Route::get('/admin/schools/registration', 'Admin\Schools\RegistrationController@registration');


});
