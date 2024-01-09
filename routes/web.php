<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::post('/enviar', function(Illuminate\Http\Request $request){
    
    $produtos = new App\Models\produtos();
    $produtos->codigo = $request->get('codigo');
    $produtos->nome = $request->get('nome');
    $produtos->categoria = $request->get('categoria');
    $produtos->preco = $request->get('preco');
    $produtos->descricao = $request->get('descricao');

    $produtos->save();

    echo"Sua mensagem foi armazenada com sucesso! Códgio: ". $produtos->id;
});

Route::get('/lista', function () {
    return view('lista', array('produtos' => App\Models\produtos::all()));
});
