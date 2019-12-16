<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;  // Não esquecer de acrescentar o Model que estou usando


class SeriesController extends Controller
{
    public function index ()
    {
        // var_dump($request->query());
        // exit;

        $series = [
            'Orphan Black',
            'Atypical',
            'Orange is the New Black'
        ];
        
        return view('series.index', compact('series'));
        // return view('series.index', ['series' => $series]);
    }

    //Exibir formulário de cadastramento para o usuário
    public function create () 
    {
        return view('series.create');
    }

    //Para salvar informações do formulário 
    //Preciso usar Request para pegar os atributos que serão passados via post (como definido na routes web)
    public function store(Request $request){
        $nome = $request->name;
        //checando se dado está sendo recebido pelo request
        // dd($nome); 
        $serie = new Serie();
        $serie->name = $nome;
        dd($serie->save());
    }
}
