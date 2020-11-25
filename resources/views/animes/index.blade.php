
@extends ('layout')

@section('head')
Animes Luiz
@endsection

@section('content')

@include('mensagem', ['mensagem' => $mensagem])

<a href="/animes/criar" class="btn btn-dark mb-2">Adicionar</a>
<ul class="list-group">
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