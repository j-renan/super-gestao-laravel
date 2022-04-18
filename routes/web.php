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

/* Route::get('/', function () {
    return 'Olá, mundo!';
}); */

/* Route::get('/sobre', function () {
    return 'Sobre nós';
}); */

/* Route::get('/contato', function () {
    return 'Contato';
}); */

Route::get('/', 'PrincipalController@principal')->name('site.index');

Route::get('/sobre', 'SobreNosController@sobreNos')->name('site.sobre');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', function() {return 'Login';})->name('site.login');


// Agrupamento de rotas
Route::prefix('/app')->group(function() {
    Route::get('/clientes', function() {return 'Clientes';})->name('app.clientes');

    Route::get('/fornecedores', function() {return 'Fornecedores';})->name('app.fornecedores');

    Route::get('/produtos', function() {return 'Produtos';})->name('app.produtos');
});

//Redirecionamento de rotas
Route::get('/rota1', function() {
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');
/* Route::redirect('/rota1', '/rota2'); */

// Rota para página não encontrada
Route::fallback(function() {
    return 'Página não encontrada, clique <a href="'.Route('site.index').'">aqui</a> para voltar.';
});

// Passando parâmetros para rotas
Route::get('teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

/* Route::get('/contato/{nome}/{categoria_id}',
    function(
        string $nome = 'Desconhecido',
        int $categoria_id = 1
       ){
    return "Estamos aqui: $nome,  idade: $idade";
})->where('categoria_id', '[0-9]+')
->where('nome', '[A-Za-z]+'); */
