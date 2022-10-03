<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
        //\App\SiteContato::all();
        //var_dump($_POST);
        /* echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email'); */

        /* $contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save(); */

        //$contato = new SiteContato();
        //$contato->fill($request->all()); ou
        //$contato->create($request->all());
        //$contato->save();

        //dd($contato);
        $motivo_contatos = $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        //realizar validação dos dados do formulário recebidos no request

        $regras = [
            'nome' => 'required|min:3|max:40', //|unique:site_contatos == não permite dados repetidos na tabela
            'telefone' => 'required',
            'email' => 'email', //validação para dados do tipo e-mail
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            //'nome.unique' => 'O nome informado já está em uso',
            'nome.min' => 'O campo nome precisa ter no mínino 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',

            'email.email' => 'O e-mail informado não é válido!',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido', //mensagem genérica para todos os campos
        ];

        $request->validate($regras, $feedback);
        //dd($request->motivo_contatos_id);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
