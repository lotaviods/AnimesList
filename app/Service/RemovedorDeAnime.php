<?php
namespace App\Service;

use App\Anime;
use App\Episodio;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeAnime
{
    public function RemoverAnime(int $serieId): string
    {
        DB::beginTransaction();
        $anime = Anime::find($serieId);
        $this->RemoverTemporada($anime);
        $anime->delete();
        DB::commit();

        return $anime;
    }
    private function RemoverTemporada($anime)
    {
        $anime->temporadas->each(function(Temporada $temporada){
        $this->RemoverEpisodio($temporada);
        $temporada->delete();
    });
}
    private function RemoverEpisodio($temporada){
        $temporada->episodios()->each(function (Episodio $episodio){
        $episodio->delete();
        
    });
    }
}