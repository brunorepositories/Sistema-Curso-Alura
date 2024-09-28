<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller {
    
    public function index(Request $request) {

        // $series = Series::all();

        $series = Series::with(['seasons'])->get();
        // dd($series);
        
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series/index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }    
    
    public function create() {

        return view('series.create');

    }

    public function store(SeriesFormRequest $request) {

        // dd($request);

        $serie = Series::create($request->all());

        // dd($serie->seasons());

        for ($i = 1; $i <= $request->seasonsQty; $i++) {

            $season = $serie->seasons()->create([
                'number' => $i,
            ]);

            for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                
                $season->episodes()->create([
                    'number' => $j,
                ]);
            }
        }

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");

        // $nomeSerie = $request->nome;
        // session()->flash('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");

        // $serie = New Series();
        // $serie->nome = $nomeSerie;
        // $serie->save();
        
        // DB::insert('insert into series (nome) values (?)', [$nomeSerie]);
    }

    public function destroy(Series $series) {
        
        $series->delete();

        // session()->flash('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function update(Series $series, SeriesFormRequest $request) {

        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
        
    }

    public function edit(Series $series) {

        // dd($series->temporadas);

        return view('series.edit')->with('serie', $series);
        
    }

    public function Validated() {

    }
}
