<?php

use Illuminate\Database\Seeder;
use App\SiteContato;


class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $contato = new SiteContato();
        $contato->nome = 'Sistema SG0';
        $contato->telefone = '(19) 58749-8541';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        $contato->save(); */

        factory(SiteContato::class, 100)->create();
    }
}
