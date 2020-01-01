<?php


/*
|--------------------------------------------------------------------------
| Clear Cache
|--------------------------------------------------------------------------
|
*/
Route::get('/clear', function(){
  Artisan::call('cache:clear');
  // Artisan::call('route:cache');
  Artisan::call('view:clear');
  Artisan::call('config:cache');
  return "Done! Go Back and Refresh Page Please";
})->name('clear');


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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware'=>'auth'],function(){

	Route::get('/dashboard', 'HomeController@index')->name('dashboard');


	/*
	|--------------------------------------------------------------------------
	| Order Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/orders', 'OrderController@index')->name('orders');
	Route::get('/order/{order}', 'OrderController@show')->name('order');
	Route::get('/add_order', 'OrderController@create')->name('add_order');
	Route::post('/add_order', 'OrderController@store')->name('add_order');
	Route::get('/edit_order/{order}', 'OrderController@edit')->name('edit_order');
	Route::patch('/update_order/{order}', 'OrderController@update')->name('update_order');
	Route::delete('/delete_order/{order}', 'OrderController@destroy')->name('delete_order');
	
	/*
	|--------------------------------------------------------------------------
	| Thread Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/threads', 'ThreadController@index')->name('threads');
	Route::post('/add_thread', 'ThreadController@store')->name('add_thread');
	Route::delete('/delete_thread/{thread}', 'ThreadController@destroy')->name('delete_thread');
	
	/*
	|--------------------------------------------------------------------------
	| Plan Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/plans', 'PlanController@index')->name('plans');
	Route::get('/add_plan', 'PlanController@create')->name('add_plan');
	Route::post('/add_plan', 'PlanController@store')->name('add_plan');
	Route::get('/edit_plan/{plan}', 'PlanController@edit')->name('edit_plan');
	Route::patch('/update_plan/{plan}', 'PlanController@update')->name('update_plan');
	Route::delete('/delete_plan/{plan}', 'PlanController@destroy')->name('delete_plan');


	/*
	|--------------------------------------------------------------------------
	| Client Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/clients', 'ClientController@index')->name('clients');
	Route::get('/add_client', 'ClientController@create')->name('add_client');
	Route::post('/add_client', 'ClientController@store')->name('add_client');
	Route::get('/edit_client/{client}', 'ClientController@edit')->name('edit_client');
	Route::patch('/update_client/{client}', 'ClientController@update')->name('update_client');
	Route::delete('/delete_client/{client}', 'ClientController@destroy')->name('delete_client');
	

	/*
	|--------------------------------------------------------------------------
	| Production Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/productions', 'ProductionController@index')->name('productions');
	Route::get('/add_production', 'ProductionController@create')->name('add_production');
	Route::post('/add_production', 'ProductionController@store')->name('add_production');
	Route::get('/edit_production/{production}', 'ProductionController@edit')->name('edit_production');
	Route::patch('/update_production/{production}', 'ProductionController@update')->name('update_production');
	Route::delete('/delete_production/{production}', 'ProductionController@destroy')->name('delete_production');


	/*
	|--------------------------------------------------------------------------
	| Investment Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/investment/{investment}', 'InvestmentController@show')->name('investment');
	Route::get('/investments', 'InvestmentController@index')->name('investments');
	Route::get('/add_investment', 'InvestmentController@create')->name('add_investment');
	Route::post('/add_investment', 'InvestmentController@store')->name('add_investment');
	Route::get('/edit_investment/{investment}', 'InvestmentController@edit')->name('edit_investment');
	Route::patch('/update_investment/{investment}', 'InvestmentController@update')->name('update_investment');
	Route::delete('/delete_investment/{investment}', 'InvestmentController@destroy')->name('delete_investment');


	/*
	|--------------------------------------------------------------------------
	| Email Route
	|--------------------------------------------------------------------------
	*/

	Route::get('/send_email/{investment}', 'InvestmentController@sendEmail')->name('send_email');
	


	/*
	|--------------------------------------------------------------------------
	| Transaction Routes
	|--------------------------------------------------------------------------
	*/

	Route::get('/transactions', 'TransactionController@index')->name('transactions');
	Route::get('/transaction', 'TransactionController@filter')->name('transaction');
	Route::get('/add_transaction', 'TransactionController@create')->name('add_transaction');
	Route::post('/add_transaction', 'TransactionController@store')->name('add_transaction');
	Route::get('/edit_transaction/{transaction}', 'TransactionController@edit')->name('edit_transaction');
	Route::patch('/update_transaction/{transaction}', 'TransactionController@update')->name('update_transaction');
	Route::delete('/delete_transaction/{transaction}', 'TransactionController@destroy')->name('delete_transaction');




});

