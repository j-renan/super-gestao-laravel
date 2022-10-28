<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil, $param3, $param4)
    {
        echo $metodo_autenticacao.' - '.$perfil.'<br>';

        if ($metodo_autenticacao == 'padrao'){
            echo 'Vericar a desgraça no BD'.$perfil.'<br>';
        }

        if ($perfil == 'ldpa') {
            echo 'Verificar o candango no AD'.$perfil.'<br>';
        }

        if ($perfil == 'visitante') {
            echo 'Exibir apenas algumas merdas <br>';
        } else {
            echo 'Sentou o perfil na vara <br>';
        }

        if (false) {
            return $next($request);
        } else {
            return Response('Acesso Cagado!');
        }
    }
}
