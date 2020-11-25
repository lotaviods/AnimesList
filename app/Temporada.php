<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Database\Eloquent\Collection;

class Temporada extends Model
{
    public $fillable = ['numero'];
    public $timestamps = false;
    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }
    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
    public function getEpisodiosAssistidos(): Collection
{
    return $this->episodios->filter(function (Episodio $episodio) {
        return $episodio->assistido;
    });
}
}
