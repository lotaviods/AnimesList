<?php
namespace App\Service;

use App\Anime;
use Illuminate\Support\Facades\DB;

class CriadorDeAnime
{
    public function criarAnime(string $nome, $qtdTemporadas, $ep_por_temporada): Anime
    {
        $anime = Anime::create(['nome' => $nome]);
        DB::beginTransaction();
        
            for ($i = 1; $i <= $qtdTemporadas; $i++) {
                $temporada = $anime->temporadas()->create(['numero' => $i]);
                for ($j = 1; $j <= $ep_por_temporada; $j++) {
                    $temporada->episodios()->create(['numero' => $j]);
                }
            }
        DB::commit();
        return $anime;

    }
}
