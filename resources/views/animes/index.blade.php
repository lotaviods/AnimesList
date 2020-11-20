@extends ('layout')

@section('head')
Animes Luiz
@endsection

@section('content')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="/animes/criar" class="btn btn-dark mb-2">Adicionar</a>
<ul class="list-group">
    <?php foreach ($animes as $anime):?>
    <li class="list-group-item d-flex justify-content-between align-items-center">{{ $anime->nome }}
        <form method="post" action="/animes/ {{ addslashes($anime->id)}}" onsubmit="return confirm('Confirmar?')">
            @csrf
            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>

        </form>
    </li>
    <?php endforeach  ?>
</ul>

</div>

</body>


</html>
@endsection