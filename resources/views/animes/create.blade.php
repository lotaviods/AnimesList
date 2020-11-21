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
        <label for="nome" class="nome">Anime: </label>
        <input type="text" class="form-control" name="nome" id="nome" required autocomplete="off">
    </div>
    <button class="btn btn-primary">
        Adicionar
    </button>
</form>
</div>
</body>

</html>
@endsection