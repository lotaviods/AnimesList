<?php
namespace App\Http\Controllers;

use App\Anime;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimesDestroyRequest;
use App\Http\Requests\AnimesFormResquest;
use App\Service\CriadorDeAnime;
use App\Service\RemovedorDeAnime;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class Animes extends Controller
{
    public function index(Request $request)
    {

        $animes = Anime::query()->get();
        $mensagem = $request->session()->get('mensagem');
        $id = 0;
        return view('animes.index', [
            'animes' => $animes,
            'mensagem' => $mensagem,
            'id' => $id,
        ]);
    }

    public function create()
    {
        return view('animes.create');
    }
    public function store(AnimesFormResquest $request, CriadorDeAnime $criadorDeAnime)
    {
        $anime = $criadorDeAnime->criarAnime($request->nome, $request->qtd_temporadas, $request->ep_por_temporada);
        $request->session()->flash('mensagem', "O {$anime->id}º anime e suas temporadas foram criadas com sucesso");
        return redirect()->route('animes');

    }

    public function destroy(AnimesDestroyRequest $request, RemovedorDeAnime $removedorDeAnime)
    {

        $nomeAnime = $removedorDeAnime->RemoverAnime($request->id);
        $request->session()->flash('mensagem', "O {$request->id}º anime foi excluído com sucesso");
        return redirect()->route('animes');

    }
    public function editaNome(int $id, Request $request)
    {
        $anime = Anime::find($id);
        $novoNome = $request->nome;
        $anime->nome = $novoNome;
        $anime->save();
    }

}
