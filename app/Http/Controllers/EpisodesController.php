<?php

namespace App\Http\Controllers;

use App\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $temporada)
    {
        $episodes = $temporada->episodes;
        
        return view('episodes.index', compact('episodes'));
    }
}
