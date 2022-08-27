<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        \App\SiteContato::all();

        //var_dump($_POST);
        //return view('site.contato', ['titulo' => 'Contato (teste)']);
    }
}
