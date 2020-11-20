@extends ('layout')

@section('head')
Adicionar anime
@endsection
@section('content')
<form method="post">
    <div class="form-group">
        @csrf
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <label for="Nome" class="">Anime: </label>
        <input type="text" class="form-control" name="nome" id="nome">
    </div>
    <button class="btn btn-primary">
        Adicionar
    </button>
</form>
</div>
</body>

</html>
@endsection