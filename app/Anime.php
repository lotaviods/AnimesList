<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $table = 'animes';
    protected $fillable = ['nome'];
    
    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}