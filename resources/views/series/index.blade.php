<x-layout title="Séries"> 

    <a href="{{ route('series.create') }}"class="btn btn-dark mb-4" >Adicionar série</a>

    @isset($mensagemSucesso)   
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>     
    @endisset
    
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center"> 
                
                <a href="{{ route('seasons.index', $serie->id) }}"> 
                    {{ $serie->nome }}  
                </a>
                
                <span class="d-flex">

                    <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm mx-2"> Edit </a>
                    
                    <form method="POST" action="{{ route('series.destroy', $serie->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"> 
                            Delete
                        </button>
                    </form>

                </span>
            </li>
        @endforeach
    </ul>
    
</x-layout>