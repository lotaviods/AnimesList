<?php
namespace App\Http\Controllers;

use Error;
use App\Anime;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Animes extends Controller
{
    public function index(Request $request)
    {
        $animes = Anime::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');
        $id = 0;
        return view('animes.index', [
            'animes' => $animes,
            'mensagem' => $mensagem,
            'id'=>$id
        ]);
    }

    public function create()
    {
        return view('animes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome'=> 'required'

        ]);
        
        $nome = $request->nome;

        $anime = Anime::create(request()->all());
        
        // try {
        //     $anime = Anime::create(request()->all());
        // } catch (Exception $err Error $err) {
        //     $request->session()->flash('erro', "Não foi possivel adicionar");
        //     return redirect()->route('animes');
        // }


        $request->session()->flash('mensagem', "O {$anime->id}º anime foi criado com sucesso");
        return redirect()->route('animes');

    }

    public function destroy(Request $request)
    {
        Anime::destroy($request->id);
        $request->session()->flash('mensagem', "O {$request->id}º anime foi excluído com sucesso");
        return redirect()->route('animes');

    }


}
