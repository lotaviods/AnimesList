@extends ('layout')

@section('head')
Adicionar anime
@endsection
@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="post">
    @csrf
    <div class="row">
        <div>
            <label for="Nome">Anime: </label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <div class="col col-2">
            <label for="qtd_temporadas" class="">N° temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        </div>
<<<<<<< HEAD

        <div class="col col-2">
            <label for="ep_por_temporada" class="">Ep. por temporada</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>

=======
        @endif
        <label for="nome" class="nome">Anime: </label>
        <input type="text" class="form-control" name="nome" id="nome" required autocomplete="off">
>>>>>>> 47879ac6968b994eb134fd2837f9397739c56d2b
    </div>
    <button class="btn btn-primary mt-2">
        Adicionar
    </button>
</form>
</div>
</body>

</html>
@endsection