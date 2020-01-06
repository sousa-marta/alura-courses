<?php

namespace App\Services;

use App\Serie;  
use Illuminate\Support\Facades\DB;

class SerieRemover
{
  public function serieRemover($serieId)
  {
    $serieName = null;

    //código só vai funcionar se tudo funcionar, se não não exclui nada
    DB::beginTransaction();
    $serie = Serie::find($serieId);
    $serieName = $serie->name;
    $this->seasonRemover($serie);
    $serie->delete();
    DB::commit();

    return $serieName;
  }

  private function seasonRemover($serie)
  {
    $serie->seasons->each(function ($season){
      $this->episodeRemover($season);
      $season->delete();
    });
  }

  private function episodeRemover($season)
  {
    $season->episodes->each(function ($episode){
      $episode->delete();
    });
  }

}