<?php
use App\Http\Middleware\CheckAdmin;

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

/*Route::get('/', function () {
    return view('welcome');
});*/



Auth::routes();


//Route::post('registerapi', 'Api\AuthController@register')->name('register');
//Route::post('loginapi', 'Api\AuthController@login')->name('login');

Route::get('/', 'HomeController@index')->name('home');
/*Route::get('table', function () {
    return view('table');

});*/
//Route::get('table', 'Controller@ShowTable');


//Route::get('table/{page}', 'ProdListController@showTable')->middleware('auth');
Route::get('addprod', 'ProdListController@addProdPage')->middleware('auth', 'admin');
Route::post('saveprod','ProdListController@saveProd')->middleware('auth', 'admin')->name('saveprod');

Route::get('table', 'ProdListController@showList')->middleware('auth')->name('table');



Route::delete('delete', 'ProdListController@delete')->middleware('auth', 'admin')->name('delete');


Route::get('showfull/{id}', 'ProdListController@showFullPage')->middleware('auth');
Route::get('logout', 'Auth\LoginController@logout')->middleware('auth');
Route::post('editprod', 'ProdListController@editProd')->middleware('auth', 'admin')->name('editprod');
Route::post('saveedited', 'ProdListController@saveEdited')->middleware('auth', 'admin')->name('saveedited');




/*Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('/', function() {
        return view('auth.login');

    });

});*/
/*
Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/', function() {
        return view('auth.login');

    });
});

*/

/*
Route::get('table', function() {
    //$prods = DB::table('products')->get();

    $prods = App\Product::all();
    return view('prodlist.table', compact('prods'));

});
Route::get('table/{id}', function ($id) {
    //$prod = DB::table('products')->find($id);

    $prod = App\Product::find($id);
    return view('prodlist.fullprodpage', compact('prod'));
});*/

