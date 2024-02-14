<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// All Jobs
Route::get('/', function () {
    return view('Jobs', [
        'heading' => 'Latest Jobs',
        'jobs' => Job::all()
    ]);
});

// Single Jobs
Route::get('/jobs/{id}', function ($id) {
    return view('Jobs', [
        'job' => Job::find($id)
    ]);
});
    

Route::get('/hello', function(){
    return response('<h1>Hello World</h1>', 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

Route::get('/posts/{id}', function($id){
    return response('Post ' . $id);
}) -> where('id', '[0-9]+');

Route::get('/search', function(Request $request){
    dd($request->name . ' ' . $request->city);
});