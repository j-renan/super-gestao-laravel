<?php

use App\Fornecedor;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
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

Route::get('/teste', function () {
    $siteContato = \App\SiteContato::all();
    dd($siteContato);
});

/* Route::get('/sobre', function () {
    return 'Sobre nós';
}); */

/* Route::get('/contato', function () {
    return 'Contato';
}); */

Route::get('/', [PrincipalController::class ,'principal'])->name('site.index');

Route::get('/sobre', [SobreNosController::class, 'sobreNos'])->name('site.sobre');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');

Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');

Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');


// Agrupamento de rotas
Route::prefix('/app')->middleware('autenticacao:padrao,visitante,p3,p4')->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');

    Route::get('/sair', [LoginController::class, 'sair'])->name('app.login');

    Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');

    Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');

    Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');

    Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');

    Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

    Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');

    Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir']) ->name('app.fornecedor.excluir');

    Route::get('/produto', [FornecedorController::class, 'index'])->name('app.produto');

    Route::resource('produto', 'ProdutoController');

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
