
@extends ('layout')

@section('head')
<div class="text-nowrap bd-highlight" style="width: 8rem;">
  Lista de animes
</div>

@endsection

@section('content')

@include('mensagem', ['mensagem' => $mensagem])
<input type="text" name= "filter" id= "filter" placeholder="Digite para buscar">
<div id="encontrados" class="invisible"> 0 animes encontrados</div>

<br>
<a href="/animes/criar" class="btn btn-success mb-2"><i class="fa fa-plus" aria-hidden="true"></i></a>
<ul class="list-group">
    @foreach ($animes as $anime)
    <li class="animes list-group-item d-flex justify-content-between align-items-center " >
        <span id="nome-anime-{{ $anime->id }}">{{ $anime->nome }}</span>
        @auth
        <div class="input-group w-50" hidden id="input-nome-anime-{{ $anime->id }}">
            <input type="text" class="form-control" value="{{ $anime->nome }}">
            <div class="input-group-append">
                <button class="btn btn-primary" onclick="editaranime({{ $anime->id }})">
                    <i class="fas fa-check"></i>
                </button>
                @csrf
            </div>
        </div>
    <span class="d-flex">
        <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $anime->id }})">
            <i class="fas fa-edit"></i>
        </button>
        @endauth
        <a href="/animes/{{ $anime->id }}/temporadas" class="btn btn-info btn-sm mr-1">
            <i class="fas fa-external-link-alt"></i>
        </a>
        @auth
        <form method="post" action="/animes/{{ $anime->id }}"
              onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($anime->nome) }}?')">
              @csrf
            <button class="btn btn-danger btn-sm">
                <i class="far fa-trash-alt"></i>
            </button>
        @endauth
        </form>
    </span>
</li>
    @endforeach
</ul>

</div>

<script src="js/change.js"></script>
<script src="js/filter.js"></script>
</body>


</html>
@endsection