<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;

class SeasonsController extends Controller
{
    public function index($serieId)
    {
        $serie = Serie::find($serieId);     
        $seasons = $serie->seasons;

        return view('seasons.index', compact('seasons','serie'));
    }
}
