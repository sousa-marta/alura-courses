<?php

namespace App\Http\Controllers;

use App\Season;
use App\Episode;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season, Request $request) //fazendo assim já faz o find e já cria o objeto
    {
        $episodes = $season->episodes;
        $seasonId = $season->id;
        $mensagem = $request->session()->get('mensagem');
        
        return view('episodes.index', compact('episodes','seasonId','mensagem'));
    }

    public function assistir(Season $season, Request $request)
    {
        $episodiosAssistidos = $request->episodes; //array com os episódios que forem ticados
        $season->episodes->each(function (Episode $episode) use ($episodiosAssistidos) {
            $episode->watched = in_array($episode->id, $episodiosAssistidos);
        });

        $season->push(); //envia tudo que teve de modificação

        $request->session()->flash('mensagem', 'Episódios marcados como assistidos');

        return redirect()->back();
    }
}
