<h2>Forncedor</h2>


{{ 'Texto de teste' }}
<?php
'Texto de teste';
?>

{{-- Comentário de bloco no blade --}}

@php
// Comentário de linha no blade
/*
        Comentários de multiplas linhas no blade
    */

/*
        if(isset($variavel)){} // retorna true se a variável estiver definida
                                    isset não se preocupa com o valor da variável,
                                    apenas se ela existe
    */

/*
        if(empty($variavel)){} // retorna true se a variável estiver vazia
                                    empty considera vazio os seguintes valores:
                                    '', 0, 0.0, '0',null, false, array(), $var
    */

echo 'Texto de teste';
@endphp

{{-- imprimir um array @dd($fornecedores) --}}
<h3>@@if</h3>
@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem {{ count($fornecedores) }} fornecedores cadastrados</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem muitos fornecedores cadastrados</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif
<hr>

{{-- @unless executa se o retorno for falso --}}
<h3>@@unless é executado se o retorno for falso</h3>
Fornecedor: {{ $statusFornecedor[0]['nome'] }}
<br>
Status: {{ $statusFornecedor[0]['status'] }}
@if ($statusFornecedor[0]['status'] == 'N')
    <br>
    Fornecedor inativo
@endif
<br>
@unless($statusFornecedor[0]['status'] == 'S')
    <!-- Se o retorno da condição for false -->
    <br>
    Fornecedor inativo
@endunless
<br>
<hr>

<h3>@@isset - Se a variável não existir, não causará erro na execução</h3>
@isset($statusFornecedor)
    <!-- Se a variável não existir, não causará erro na execução -->
    Fornecedor: {{ $statusFornecedor[1]['nome'] }}
    <br>
    Status: {{ $statusFornecedor[1]['status'] }}
    <br>
    @isset($statusFornecedor[1]['cnpj'])
        CNPJ: {{ $statusFornecedor[1]['cnpj'] }}
    @endisset
@endisset
<br>
<hr>

<h3>@@empty - Verifica se a variável possui algum valor</h3>
@isset($statusFornecedor)
    Fornecedor: {{ $statusFornecedor[2]['nome'] }}
    <br>
    Status: {{ $statusFornecedor[2]['status'] }}
    <br>
    @isset($statusFornecedor[2]['cnpj'])
        CNPJ: {{ $statusFornecedor[2]['cnpj'] }}
        @empty($statusFornecedor[2]['cnpj'])
            <!-- Verifica se a variável possui algum valor  -->
            - Variável vazia
            <!--
                        $variavel testada não estiver definida (isset)
                        ou
                        $variavel testada possuir valor null
                    -->
        @endempty
    @endisset
@endisset
<br>
<hr>

<h3>Operador condicional de valor default(??)</h3>
@isset($statusFornecedor)
    Fornecedor: {{ $statusFornecedor[2]['nome'] }}
    <br>
    Status: {{ $statusFornecedor[2]['status'] }}
    <br>
    CNPJ: {{ $statusFornecedor[2]['cnpj'] ?? 'Não informado' }}
    <!--
            $variavel testada não estiver definida (isset)
            ou
            $variavel testada possuir valor null
        -->
@endisset
<br>
<hr>

<h3>@@swithc</h3>
@isset($statusFornecedor)
    Fornecedor: {{ $statusFornecedor[2]['nome'] }}
    <br>
    Status: {{ $statusFornecedor[2]['status'] }}
    <br>
    CNPJ: {{ $statusFornecedor[2]['cnpj'] ?? 'Dado não foi preenchido' }}
    <br>
    Telefone: ({{ $statusFornecedor[2]['ddd'] ?? '' }}) {{ $statusFornecedor[2]['telefone'] ?? '' }}
    @switch($statusFornecedor[2]["ddd"])
        @case ('11')
            São Paulo - SP
        @break

        @case ('19')
            Piracicaba - SP
        @break

        @case ('35')
            Rio Claro - SP
        @break

        @default
            Estado não identificado
    @endswitch
@endisset
<br>
<hr>

<h3>@@isset + @@for</h3>
@isset($statusFornecedor)
    @for ($i = 0; isset($statusFornecedor[$i]); $i++)
        Fornecedor: {{ $statusFornecedor[$i]['nome'] }}
        <br>
        Status: {{ $statusFornecedor[$i]['status'] }}
        <br>
        CNPJ: {{ $statusFornecedor[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $statusFornecedor[$i]['ddd'] ?? '' }}) {{ $statusFornecedor[$i]['telefone'] ?? '' }}
    @endfor
@endisset
<br>
<hr>

{{-- laço while --}}
<h3>@@isset + @@while</h3>
@isset($statusFornecedor)
    @php
    $i = 0;
    @endphp
    @while (isset($statusFornecedor[$i]))
        Fornecedor: {{ $statusFornecedor[$i]['nome'] }}
        <br>
        Status: {{ $statusFornecedor[$i]['status'] }}
        <br>
        CNPJ: {{ $statusFornecedor[$i]['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $statusFornecedor[$i]['ddd'] ?? '' }}) {{ $statusFornecedor[$i]['telefone'] ?? '' }}
        @php
            $i++;
        @endphp
    @endwhile
@endisset
<br>
<hr>

{{-- laço foreach --}}
<h3>@@isset + @@foreach</h3>
@isset($statusFornecedor)
    @foreach ($statusFornecedor as $indice => $status)
        Fornecedor: {{ $status['nome'] }}
        <br>
        Status: {{ $status['status'] }}
        <br>
        CNPJ: {{ $status['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $status['ddd'] ?? '' }}) {{ $status['telefone'] ?? '' }}
    @endforeach
@endisset
<br>
<hr>

{{-- laço forelse --}}
<h3>@@isset + @@forelse</h3>
@isset($statusFornecedor)
    @forelse($statusFornecedor as $indice => $status)
        Fornecedor: {{ $status['nome'] }}
        <br>
        Status: {{ $status['status'] }}
        <br>
        CNPJ: {{ $status['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $status['ddd'] ?? '' }}) {{ $status['telefone'] ?? '' }}
    @empty
        Não existem fornecedores cadastrados!!!
    @endforelse
@endisset
<br>
<hr>

{{-- para "escapar" a tag de impressão basta add @ a esquerda do caracter --}}
<h3>Escapando a tag de impressão com @ a esquerda do caracter</h3>
@isset($statusFornecedor)
    @forelse($statusFornecedor as $indice => $status)
        Fornecedor: @{{ $status["nome"] }}
        <br>
        Status: @{{ $status["status"] }}
        <br>
        CNPJ: @{{ $status["cnpj"] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: @({{ $status['ddd'] ?? '' }}) @{{ $status["telefone"] ?? '' }}
    @empty
        Não existem fornecedores cadastrados!!!
    @endforelse
@endisset
<br>
<hr>

{{-- Como utilizar o objeto loop e os atributos first, last e count do blade,
esse objeto funciona apenas no foreach e forelse --}}
<h3>Objeto loop</h3>
@isset($statusFornecedor)
    @forelse($statusFornecedor as $indice => $status)
        Iteração Atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $status['nome'] }}
        <br>
        Status: {{ $status['status'] }}
        <br>
        CNPJ: {{ $status['cnpj'] ?? 'Dado não foi preenchido' }}
        <br>
        Telefone: ({{ $status['ddd'] ?? '' }}) {{ $status['telefone'] ?? '' }}
        <br>
        @if ($loop->first)
            É o primeiro item da lista
        @endif
        @if ($loop->last)
            É o último item da lista
            <br>
            Total de itens: {{ $loop->count }}
        @endif
    @empty
        Não existem fornecedores cadastrados!!!
    @endforelse
@endisset
