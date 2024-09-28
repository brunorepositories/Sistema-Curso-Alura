<x-layout title="Nova Série"> 
    {{-- <x-series.form :action="route('series.store')" :nome="old('nome')" :update="false"/> --}}

    <form action="{{ route('series.store') }}" method="POST">
    
        @csrf
        
        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" 
                       id="nome" 
                       name="nome" 
                       class="form-control" 
                       value="{{ old('nome') }}" >
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº Temporadas</label>
                <input type="number" 
                       id="seasonsQty" 
                       name="seasonsQty" 
                       class="form-control" 
                       value="{{ old('seasonsQty') }}" >
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporadas</label>
                <input type="number" 
                       id="episodesPerSeason" 
                       name="episodesPerSeason" 
                       class="form-control" 
                       value="{{ old('episodesPerSeason') }}" >
            </div>
        </div>
        
        <a href="/series" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</x-layout>