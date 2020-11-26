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
    <div class="row col align-items-center">
        
            <label for="Nome">Anime: *</label>
            <input type="text" class="form-control" name="nome" id="nome">
        
        <div class="mb-2 mr-1">
            <label for="qtd_temporadas" class="">N° temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
        
        </div>
        <div class="mb-2 mr-1">
            <label for="ep_por_temporada" class="">Ep. por temporada</label>
            <input type="number" class="form-control" name="ep_por_temporada" id="ep_por_temporada">
        </div>
    </div>
    <button class="btn btn-success">
        Adicionar
    </button>

</div>
</form>
</div>
</body>

</html>
@endsection