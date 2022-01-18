<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"content="width=device-width, initial-scale=1">
        <title>Vitrine de livros</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
        <body>

        <div class="container">
        <table class="table">
        <p>{{session('mensagem')}}</p>
        <a class="btn btn-primary" href="{{route('criar_livro')}}">Cadastrar</a>
        </table>

        <table class="table">
        <form action="{{route('livros_ver')}}" method="GET" role="search">
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                       placeholder="Buscar livros"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
            </div>
        </form>
        </table>


        <div class="container">
            @if(isset($details))
                <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                <h2>Sample User details</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Autor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($livros as $livro)
                        <tr>
                            <td>{{$livro->name}}</td>
                            <td>{{$livro->autor}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="table-responsive">
            <table class="table">
                <tr><th>Autor</th><th>Título</th><th>Preço</th><th></th><th></th></tr>
                    @foreach($livros as $livro)
                <tr>
                    <td>{{$livro->autor}}</td>
                    <td>{{$livro->nome}}</td>
                    <td>{{$livro->preco}}</td>
                    <td><a class="btn btn-info" href="{{ route('editar_livro', ['id'=>$livro->id]) }}"
                           title="Editar livro {{ $livro->nome }}" >Editar</td>
                    <td><a class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja excluir o livro {{$livro->nome}}?')" href="{{ route('excluir_livro', ['id'=>$livro->id]) }}"
                           title="Excluir livro {{ $livro->nome }}">Excluir</a></td>
                </tr>
                @endforeach
            </table>
        </div>



        <div class="d-flex justify-content-center">
            {!! $livros->appends(request()->all())->links() !!}

        </div>
        </div>

        </body>
</html>
