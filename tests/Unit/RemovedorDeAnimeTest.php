<?php

namespace Tests\Unit;

use App\Service\CriadorDeAnime;
use App\Service\RemovedorDeAnime;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeAnimeTest extends TestCase
{
    use RefreshDatabase;
    /**@var Anime */
    private $anime;
    protected function setUp(): void
    {
        parent::setUp();
        $criadorDeAnime = new CriadorDeAnime;
        $this->anime = $criadorDeAnime->criarAnime('Anime Teste', 1, 1);   
    }
    public function testRemoverUmAnime()
    {
        $this->assertDatabaseHas('animes', ['id'=> $this->anime->id]);
        $removedorDeAnime = new RemovedorDeAnime();
        $nomeAnime = $removedorDeAnime->RemoverAnime($this->anime->id);
        $this->assertIsString($nomeAnime);
        $this->assertEquals('Anime Teste', $this->anime->nome);
        $this->assertDatabaseMissing('animes', ['id' => $this->anime->id]);

    }
}
