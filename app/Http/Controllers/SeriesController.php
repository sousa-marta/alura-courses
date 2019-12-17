<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;  // Não esquecer de acrescentar o Model que estou usando


class SeriesController extends Controller
{
    public function index (Request $request)
    {
        // var_dump($request->query());
        // exit;

        // $series = Serie::all(); //não consegue ordenar assim
        $series= Serie::query()->orderBy('name')->get(); //query pq está realizando uma consulta no db

        $mensagem = $request->session()->get('mensagem');
        // $request->session()->remove('mensagem'); //para mensagem ser exibida apenas 1 vez
        // dd($series);
        
        return view('series.index', compact('series','mensagem'));
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
        
        // Forma mais manual, não consegue usar dados já salvos:
        /*
        $nome = $request->name;
        //checando se dado está sendo recebido pelo request
        // dd($nome); 
        $serie = new Serie();
        $serie->name = $nome;
        $serie->save(); */

        //Outra forma de salvar no banco, não precisa salvar um por um e já consegue usar dados (precisa adicionar campo no model):
        $serie = Serie::create($request->all());

        $request->session()
            //flash serve para o laravel exibir apenas 1 x uma mensagem. antes estava usando get
            ->flash(
                'mensagem', 
                "Série {$serie->id} criada com sucesso {$serie->name}"
            );

        return redirect('/series');
    }

    public function destroy(Request $request){
        // echo $request->id;
        Serie::destroy($request->id);
        $request->session()->flash(
            'mensagem', 
            "Série excluida com sucesso:"
        );

        return redirect('/series');

    }

}
