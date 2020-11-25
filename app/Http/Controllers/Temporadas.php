<?php

namespace App\Http\Controllers;

use App\Anime;
use App\Serie;
use Illuminate\Http\Request;

class Temporadas extends Controller
{
    public function index(int $serieId)
    {
        $anime = Anime::find($serieId);
        $temporadas = $anime->temporadas;

        return view(
            'temporadas.index',
            compact('anime', 'temporadas')
        );
    }
}
