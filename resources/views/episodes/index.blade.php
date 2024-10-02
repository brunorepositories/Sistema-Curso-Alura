<x-layout title="Episódios">

    <form method="POST">
        @csrf

        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}
                    <input type="checkbox" name="episodes[]" value="{{ $episode->id }}"
                        @if ($episode->watched) checked @endif>
                    </input>
                </li>
            @endforeach
        </ul>

        <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-3">Voltar</a>
        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    </form>
</x-layout>
