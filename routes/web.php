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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', function () {
//    return view('welcome');
//})->middleware(['auth.shop'])->name('home');

//

Route::middleware('auth.shop')->group(function () {

    Route::get('/dashboard', 'Calculators@Dashboard')->name('home');
    Route::get('/products', 'Calculators@getProducts')->name('products');

    Route::get('/calculators', 'Calculators@getCalculators')->name('calculators');
    Route::get('products/sync','Calculators@SyncProducts')->name('products.sync');
    Route::get('add/calculator','Calculators@AddCalculatorFrom')->name('addcalculator');
    Route::get('add/calculators','Calculators@AddCalculatorFroms')->name('addcalculators');
    Route::post('save/calculator','Calculators@AddCalculator')->name('calculator.save');
    Route::post('/selected/products','Calculators@SelectCalculatorProducts');
    Route::get('calculator/{id}/edit','Calculators@editCalculator')->name('calculator.edit');
    Route::get('calculator/{id}/delete','Calculators@DeleteCalculator')->name('calculator.delete');
    Route::get('/calculators/groups', 'Calculators@CalCulatorGroups')->name('calculator.groups');
    Route::get('add/calculator/group','Calculators@AddCalculatorGroup')->name('addcalculator.group');

    Route::post('select/calculators','Calculators@selectedCalculators')->name('selected.Calculators');
    Route::post('group/calculator/save','Calculators@SaveCalculatorGroup')->name('group.calculator.save');
    Route::get('group/{id}/edit','Calculators@editGroup')->name('group.edit');
    Route::get('group/{id}/delete','Calculators@deleteGroup')->name('group.delete');

    Route::get('/search/product','Calculators@SearchProducts')->name('search.products');
    Route::get("/logout","Calculators@logout")->name("logout");


});

Route::get('/api/calculator/groups','Soundstops@CalculatorGroups')->middleware('cors');
//Route::get('/api/group/calculators','Soundstops@GroupCalculators')->middleware('cors');
Route::get('api/calculation/section','Soundstops@CalculationSection')->middleware('cors');
Route::get('api/calculations','Soundstops@Calculations')->middleware('cors');
Route::post('save/calculations','Soundstops@MakeCalculations')->middleware('cors');
Route::get('/api/calculator','Soundstops@SoundStopsCalculator')->middleware('cors');
