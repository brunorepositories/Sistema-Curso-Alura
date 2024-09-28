
<form action="{{ $action }}" method="POST">
    
    @csrf

    @if($update) 
        @method('PUT')        
    @endif
    
    <div class="mb-4">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="nome" class="form-control"
            @isset($nome) 
                value="{{ $nome }}" 
            @endisset
        >
    </div>

    <a href="/series" class="btn btn-secondary">Cancelar</a>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>