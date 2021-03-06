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
<form action="{{route('atualizar_livro', ['id' => $livro->id]) }}" method="post">
    @csrf
    <div><label for="nome">Nome</label><input type="text" name="nome" id="nome" value="{{$livro->nome}}"></div>
    {!!$errors->first('nome', '<h1>:message</h1>')!!}
    <div><label for="custo">Autor</label><label for="autor"></label><input type="text" name="autor" id="autor" value="{{$livro->autor}}"></div>
    {!!$errors->first('autor', '<h1>:message</h1>')!!}
    <div><label for="preco">Preço</label><input type="text" name="preco" id="preco" value="{{$livro->preco}}"></div>
    {!!$errors->first('preco', '<h1>:message</h1>')!!}
    <button type="submit" class="btn btn-success" value="Submit Button">Salvar</button>
</form>
</body>
</html>
