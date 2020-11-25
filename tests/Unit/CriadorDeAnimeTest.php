<?php

namespace Tests\Unit;

use App\Anime;
use Tests\TestCase;
use App\Service\CriadorDeAnime;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CriadorDeAnimeTest extends TestCase
{
    use RefreshDatabase;
    public function testExample()
    {
        $criadorDeAnime = new CriadorDeAnime();
        $animeNome = 'Nome de teste';
        $AnimeCriado = $criadorDeAnime->criarAnime($animeNome, '1', '1');
        $this->assertInstanceOf(Anime::class, $AnimeCriado);
        $this->assertDatabaseHas('animes', ['nome'=> $animeNome]);
        $this->assertDatabaseHas('temporadas', ['anime_id'=> $AnimeCriado->id, 'numero'=> 1 ]);
        $this->assertDatabaseHas('episodios', ['numero'=> 1]);
    }
}
