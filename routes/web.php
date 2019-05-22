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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('broadcast', function (){
   event(new \App\Events\BroadcastMessage('demo', 'demo', [
       'evento' => 'demo'
   ]));
});

Route::post('send-message', function (\Illuminate\Http\Request $request){
    event(new \App\Events\BroadcastMessage('chat', 'messages', [
        'message' => $request->get('message')
    ]));
});
Route::get('/ws', function () {
    return view('ws');
});
