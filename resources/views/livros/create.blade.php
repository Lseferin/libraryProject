<!doctype html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastrar novo produto</title>
        <style>
            label{
                float: left;
                display: block;
                width: 90px;
            }
        </style>

    </head>

    <body>
    <a href="{{route('livros_ver')}}">Voltar para listagem</a>
    <form action="{{ route('salvar_livro') }}" method="post">
        @csrf
            <div><label for="nome">Nome</label><input type="text" name="nome" id="nome"></div>
            <div><label for="custo">Autor</label><label for="autor"></label><input type="text" name="autor" id="autor"></div>
            <div><label for="preco">Preço</label><input type="text" name="preco" id="preco"></div>
            <button type="submit">Salvar</button>
    </form>
    </body>
</html>
