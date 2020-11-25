
@extends ('layout')

@section('head')
<div class="text-nowrap bd-highlight" style="width: 8rem;">
  Lista de animes
</div>
@endsection

@section('content')

@include('mensagem', ['mensagem' => $mensagem])

<a href="/animes/criar" class="btn btn-success mb-2"><i class="fa fa-plus" aria-hidden="true"></i></a>
<ul class="list-group">
<<<<<<< HEAD
    @foreach ($animes as $anime)
    <li class="list-group-item d-flex justify-content-between align-items-center">
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
=======
    <?php foreach ($animes as $anime):?>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <b>{{$id += 1 }}</b>
        {{ $anime->nome }}
        <form method="post" action="/animes/ {{ addslashes($anime->id)}}" onsubmit="return confirm('Confirmar?')">
            @csrf
            <button class="btn btn-danger"><i class="fas fa-trash"></i></button>

>>>>>>> 47879ac6968b994eb134fd2837f9397739c56d2b
        </form>
    </span>
</li>
    @endforeach
</ul>

</div>


<script>
    function toggleInput(animeId) {
        const nomeanimeEl = document.getElementById(`nome-anime-${animeId}`);
        const inputanimeEl = document.getElementById(`input-nome-anime-${animeId}`);
        if (nomeanimeEl.hasAttribute('hidden')) {
            nomeanimeEl.removeAttribute('hidden');
            inputanimeEl.hidden = true;
        } else {
            inputanimeEl.removeAttribute('hidden');
            nomeanimeEl.hidden = true;
        }
    }

    function editaranime(animeId) {
        let formData = new FormData();
        const nome = document
            .querySelector(`#input-nome-anime-${animeId} > input`)
            .value;
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;
        formData.append('nome', nome);
        formData.append('_token', token);
        const url = `/animes/${animeId}/editaNome`;
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(() => {
            toggleInput(animeId);
            document.getElementById(`nome-anime-${animeId}`).textContent = nome;
        });
    }
</script>
</body>


</html>
@endsection