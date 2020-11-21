@extends ('layout')

@section('head')
<div class="text-nowrap bd-highlight" style="width: 8rem;">
  Lista de animes
</div>
@endsection

@section('content')

@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<a href="/animes/criar" class="btn btn-success mb-2"><i class="fa fa-plus" aria-hidden="true"></i></a>
<ul class="list-group">
    <?php foreach ($animes as $anime):?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <b>{{$id += 1 }}</b>
        {{ $anime->nome }}
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