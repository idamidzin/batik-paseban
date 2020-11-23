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

Route::bind('id', function ( $id ) {
	$decoded = \Hashids::decode($id);
	return count($decoded) > 0 ? $decoded[0] : false;
});

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login/proses', 'Auth\LoginController@login')->name('login.proses');

Route::group(['middleware' => ['auth.user']], function () {
	/*
	|--------------------------------------------------------------------------
	| Dashboard Routes
	|--------------------------------------------------------------------------
	|
	*/
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


		/*
		|--------------------------------------------------------------------------
		| Pengguna Routes
		|--------------------------------------------------------------------------
		|
		*/
		Route::group(['prefix' => 'pengguna'], function () {
			/*
			|--------------------------------------------------------------------------
			| Pengguna Routes
			|--------------------------------------------------------------------------
			|
			*/
			Route::get('/', 'Pengguna\UserController@index')->name('user.index');
			Route::get('create', 'Pengguna\UserController@create')->name('user.create');
			Route::post('store', 'Pengguna\UserController@store')->name('user.store');
			Route::get('{id}/edit', 'Pengguna\UserController@edit')->name('user.edit');
			Route::put('{id}/edit', 'Pengguna\UserController@update')->name('user.update');
			Route::patch('delete/{id}', 'Pengguna\UserController@delete')->name('user.delete');
			Route::delete('delete/{id}', 'Pengguna\UserController@destroy')->name('user.destroy');
			Route::post('restore/{id}', 'Pengguna\UserController@restore')->name('user.restore');
		});


		/*
		|--------------------------------------------------------------------------
		| Batik Routes
		|--------------------------------------------------------------------------
		|
		*/
		Route::group(['prefix' => 'batik'], function () {
			/*
			|--------------------------------------------------------------------------
			| Batik Routes
			|--------------------------------------------------------------------------
			|
			*/
			Route::get('/', 'Batik\BatikController@index')->name('batik.index');
			Route::get('create', 'Batik\BatikController@create')->name('batik.create');
			Route::post('store', 'Batik\BatikController@store')->name('batik.store');
			Route::get('{id}/edit', 'Batik\BatikController@edit')->name('batik.edit');
			Route::put('{id}/edit', 'Batik\BatikController@update')->name('batik.update');
			Route::patch('delete/{id}', 'Batik\BatikController@delete')->name('batik.delete');
			Route::delete('delete/{id}', 'Batik\BatikController@destroy')->name('batik.destroy');
			Route::post('restore/{id}', 'Batik\BatikController@restore')->name('batik.restore');			


			/*
			|--------------------------------------------------------------------------
			| Proses Batik Routes
			|--------------------------------------------------------------------------
			|
			*/
			// Route::get('/', 'Batik\BatikController@index')->name('batik.index');
			// Route::get('create', 'Batik\BatikController@create')->name('batik.create');
			// Route::post('store', 'Batik\BatikController@store')->name('batik.store');
			// Route::get('{id}/edit', 'Batik\BatikController@edit')->name('batik.edit');
			// Route::put('{id}/edit', 'Batik\BatikController@update')->name('batik.update');
			// Route::patch('delete/{id}', 'Batik\BatikController@delete')->name('batik.delete');
			// Route::delete('delete/{id}', 'Batik\BatikController@destroy')->name('batik.destroy');
			// Route::post('restore/{id}', 'Batik\BatikController@restore')->name('batik.restore');

		});		

		/*
		|--------------------------------------------------------------------------
		| Proses Batik Routes
		|--------------------------------------------------------------------------
		|
		*/
		Route::group(['prefix' => 'proses_batik'], function () {
			/*
			|--------------------------------------------------------------------------
			| Proses Batik Routes
			|--------------------------------------------------------------------------
			|
			*/
			Route::post('store', 'Batik\ProsesBatikController@store')->name('proses_batik.store');
			Route::put('edit', 'Batik\ProsesBatikController@update')->name('proses_batik.update');
			Route::delete('delete', 'Batik\ProsesBatikController@destroy')->name('proses_batik.destroy');

		});
		/*
		|--------------------------------------------------------------------------
		| Hasil Batik Routes
		|--------------------------------------------------------------------------
		|
		*/
		Route::group(['prefix' => 'hasil_batik'], function () {
			/*
			|--------------------------------------------------------------------------
			| Hasil Batik Routes
			|--------------------------------------------------------------------------
			|
			*/
			Route::post('store', 'Batik\HasilBatikController@store')->name('hasil_batik.store');
			Route::put('edit', 'Batik\HasilBatikController@update')->name('hasil_batik.update');
			Route::delete('delete', 'Batik\HasilBatikController@destroy')->name('hasil_batik.destroy');

		});


		/*
		|--------------------------------------------------------------------------
		| Pengaturan Routes
		|--------------------------------------------------------------------------
		|
		*/
		Route::group(['prefix' => 'profile'], function () {
			/*
			|--------------------------------------------------------------------------
			| Profile Batik Routes
			|--------------------------------------------------------------------------
			|
			*/
			Route::get('/', 'Pengaturan\ProfileController@index')->name('profile.index');
			Route::put('{id}/edit', 'Pengaturan\ProfileController@update')->name('profile.update');
			Route::patch('delete/{id}', 'Pengaturan\ProfileController@delete')->name('profile.delete');
			Route::delete('delete/{id}', 'Pengaturan\ProfileController@destroy')->name('profile.destroy');
			Route::post('restore/{id}', 'Pengaturan\ProfileController@restore')->name('profile.restore');

			Route::post('store', 'Pengaturan\GaleriController@store')->name('galeri.store');
			Route::put('edit', 'Pengaturan\GaleriController@update')->name('galeri.update');
			Route::delete('galeri/delete', 'Pengaturan\GaleriController@destroy')->name('galeri.destroy');

		});

	});