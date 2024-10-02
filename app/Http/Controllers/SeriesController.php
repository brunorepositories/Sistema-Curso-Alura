<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller {

    public function __construct(private SeriesRepository $repository) { }

    public function index() {

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

       $serie = $this->repository->add($request);

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
