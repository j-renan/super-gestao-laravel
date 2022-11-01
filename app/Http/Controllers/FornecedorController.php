<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor');
    }

    /* public function index()
    {
        $fornecedores = ['Fornecedor 1', 'Fornecedor 2', 'Fornecedor 3'];

        $statusFornecedor = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'cnpj' => '00.000.000/0000-00',
                'ddd' => '11',
                'telefone' => '1111-1111',
            ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'N',
                'cnpj' => '00.000.000/0000-00',
                'ddd' => '19',
                'telefone' => '1919-1919',
            ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'N',
                'cnpj' => null,
                'ddd' => '',
                'telefone' => '3535-3535',
            ],
        ];

       // $statusFornecedor = [];


            operador ternário PHP
            condição ? se verdadeiro : se falso;
            condição ? se verdadeiro : (condição ? se verdadeiro : se falso);

        $msg = isset($statusFornecedor[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';
        echo $msg;

        return view('app.fornecedor.index', compact('fornecedores', 'statusFornecedor'));
    }*/
}
