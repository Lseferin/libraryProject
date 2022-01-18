<!doctype html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    <table class="table">
    <div class="container">
    <table class="table">
    <a class="btn btn-primary" href="{{route('livros_ver')}}">Voltar para listagem</a>
    </table>
    <form action="{{ route('salvar_livro') }}" method="post">
        @csrf
        <table class="table">
            <div><label for="nome">Nome</label><input type="text" name="nome" id="nome" value="{{old('nome')}}"></div>
        {!!$errors->first('nome', '<h1>:message</h1>')!!}
        </table>
        <table class="table">
            <div><label for="custo">Autor</label><label for="autor"></label><input type="text" name="autor" id="autor" value="{{old('autor')}}"></div>
        {!!$errors->first('autor', '<h1>:message</h1>')!!}
        </table>
        <table class="table">
            <div><label for="preco">Preço</label><input type="text" name="preco" id="preco" value="{{old('preco')}}"></div>
        {!!$errors->first('preco', ':message')!!}
        </table>
            <button type="submit" class="btn btn-success" value="Submit Button">Salvar</button>
    </form>
    </div>
    </table>
    </body>
</html>
