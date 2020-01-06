<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Services\SerieCreator;
use Illuminate\Http\Request;
use App\Serie;  // Não esquecer de acrescentar o Model que estou usando
use App\Services\SerieRemover;

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
    public function store(SeriesFormRequest $request, SerieCreator $serieCreator)
    {
        $serie = $serieCreator->createSerie(
            $request->name, 
            $request->seasons_number, 
            $request->episodes_number
        );

        $request->session()
            //flash message serve para o laravel exibir apenas 1 x uma mensagem. antes estava usando get
            ->flash(
                'mensagem', 
                "Série {$serie->name} e suas temporadas e episódios criados com sucesso "
            );

        // return redirect('/series');
        return redirect()->route('list_series');
    }

    public function destroy(Request $request, SerieRemover $serieRemover)
    {
        $serieName = $serieRemover-> serieRemover($request->id);

        $request->session()->flash(
            'mensagem', 
            "Série {$serieName} excluida com sucesso:"
        );

        return redirect('/series');

    }

}
