<?php

/*Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{*/
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
Route::get('/', function(){return view('welcome');})->name('welcome');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::post('/search', 'SearchController@index')->name('search');
Route::post('/searchProgram','SearchController@search')->name('searchProgram');
Route::post('/getSpec','SearchController@getSpec')->name('getSpec');
Route::post('/addFavorite', 'SearchController@favorite');
Route::post('/delFavorite', 'SearchController@delFavorite');

Route::get('logtocp', 'AdminController@index');
Route::get('logtocp_login', 'AdminController@loginIndex');
//Route::get('/city', 'searchController@city');

// Quest
Route::group(['middleware' => ['quest']], function(){
	Route::get('/program_detail/{id}', 'ProgramDetailController@index')->where('id', '[0-9]+');
});


//univer
Route::group(['middleware' => ['univer']], function(){

	Route::get('/university_filling', function(){return view('includes.university_filling'); })->name('university_filling');

	//pages
	Route::get('/university', function(){return view('includes.university');})->name('university');
	Route::get('/university_edit', 'UniversityDataController@uni_edit')->name('university_edit');
	Route::get('/add_program', 'AddProgramController@index')->name('add_program');
	Route::get('/program_detail', 'ProgramDetailController@index')->name('program_detail');

	//Route::get('/university_info', 'UniversityDataController@info' )->name('university_info');

	Route::post('/addUniverInfo', 'UniversityDataController@save')->name('addUniverInfo');
	Route::post('/editUniverInfo', 'UniversityDataController@edit')->name('editUniverInfo');

	// Add program
	Route::post('/addProgram', 'AddProgramController@add')->name('addProgram');
	//Edit program page
	Route::post('/editProgram', 'AddProgramController@editIndex')->name('editProgram');
	// Edit program
	Route::post('/editProgramm', 'AddProgramController@edit')->name('editProgramm');
	//Program detail
	//Route::post('/program_detail_send', 'ProgramDetailController@index')->name('program_detail_send');

	//logo upload
	Route::post('logoUpload', ['as'=>'logoUpload','uses'=>'UniversityDataController@logoUpload']);

	//ajax test

	Route::post('/my-form','AddProgramController@myformPost')->name('my-form');

	//Candidates view
	Route::get('/candidates', 'CandidatesController@Candidates')->name('candidates');
	Route::post('/candidateDetail', 'CandidatesController@candidateDetail')->name('candidateDetail');
});


//student
Route::group(['middleware' => ['student']], function(){

	// Заполнение данных студента
	Route::get('/profile-filling', 'StudentController@index')->name('profile-filling');
	Route::post('/student_data_save', 'StudentController@save')->name('student_data_save');

	//student profile
	Route::get('/profile-info', 'StudentController@info')->name('profile-info');

	// Изменение данных студента
	Route::get('/profile-edit', 'StudentController@editIndex')->name('profile-edit');
	Route::post('/student_data_edit', 'StudentController@edit')->name('student_data_edit');

	// Candidates
	Route::post('/candidate', 'CandidatesController@index')->name('candidate');

	// Candidate data save
	Route::post('/candidate_save', 'CandidatesController@save')->name('candidate_save');

	// Candidate document upload
	Route::post('/candidateDocumentUpload1', 'CandidatesController@upload1')->name('candidateDocumentUpload1');
	Route::post('/candidateDocumentUpload2', 'CandidatesController@upload2')->name('candidateDocumentUpload2');
	Route::post('/candidateDocumentUpload3', 'CandidatesController@upload3')->name('candidateDocumentUpload3');
	Route::post('/candidateDocumentUpload4', 'CandidatesController@upload4')->name('candidateDocumentUpload4');
	Route::post('/candidateDocumentUpload5', 'CandidatesController@upload5')->name('candidateDocumentUpload5');
	Route::post('/candidateDocumentUpload6', 'CandidatesController@upload6')->name('candidateDocumentUpload6');

	//User photo upload
	Route::get('ajaxImageUpload', ['uses'=>'StudentController@ajaxImageUpload']);
	Route::post('ajaxImageUpload', ['as'=>'ajaxImageUpload','uses'=>'StudentController@ajaxImageUploadPost']);

	//zayavka
	Route::get('/application_info', 'StudentController@application_info')->name('application_info');

});
/*});*/

//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//socialite
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail');
///

Route::middleware('auth')->group(function () {
	Route::prefix('inbox')->group(function () {
	    Route::get('/', 'InboxController@inbox')               ->name('inbox');
		Route::get('/compose', 'InboxController@compose')      ->name('compose');
		Route::post('/compose', 'InboxController@send');
		Route::post('/checkbox', 'InboxController@checkbox')      ->name('checkbox');
		Route::get('/message/{id?}', 'InboxController@message')->name('message');
		Route::get('/sended', 'InboxController@sended')        ->name('sended');
		Route::get('/trashed', 'InboxController@trashed')      ->name('trashed');
		Route::get('/trash/{id?}', 'InboxController@trash')     ->name('trash');
	});    
});



Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});