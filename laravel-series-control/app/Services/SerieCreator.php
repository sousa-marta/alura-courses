<?php

namespace App\Services;

use App\Serie;  
use Illuminate\Support\Facades\DB;

class SerieCreator
{
  public function createSerie($serieName, $seasonsNumber, $episodesNumber)
  {
    // Forma mais manual, não consegue usar dados já salvos:
    /*
    $nome = $request->name;
    $serie = new Serie();
    $serie->name = $nome;
    $serie->save(); */

    //Outra forma de salvar no banco, não precisa salvar um por um e já consegue usar dados (precisa adicionar campo no model):
    // $serie = Serie::create($request->all());

    $serie = null;

    DB::beginTransaction();
    //Só queremos salvar o nome no banco de dados, não todas as outras informações do form:
    $serie = Serie::create(['name' => $serieName]);
    $this->createSeasons($serie, $seasonsNumber, $episodesNumber);
    DB::commit();

    return $serie;
  }

  private function createSeasons (&$serie, $seasonsNumber, $episodesNumber)
  {
    for ($i=1; $i <= $seasonsNumber; $i++) { 
      $season = $serie->seasons()->create(['number' => $i]);
      $this->createEpisodes($season,$episodesNumber);
    }
  }

  private function createEpisodes($season,$episodesNumber)
  {
    for ($j=1; $j <= $episodesNumber; $j++) { 
      $season->episodes()->create(['number' => $j]);
      }
  }

}