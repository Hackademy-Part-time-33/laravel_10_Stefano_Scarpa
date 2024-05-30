<x-backLayout>

    <div class="container my-5 py-5">

    <h2 class="h1">Modifica l'articolo</h2>
    <p class="mb-5">Per modificare l'articolo entra nei cambi e fai le tue modifiche e poi clicca su salva</p>
    <form action="{{route('articles.store', ['article' => 'article'])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control" id="titles" value="{{ $article->titles }}" name="titles"
                type="text">
            <label for="titles">Titolo post</label>
            @error('titles')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea name="texts" id="texts" cols="100%" rows="8" placeholder="Inserisci il testo">{{ $article->texts }}</textarea>
            @error('texts')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-3">
            {{ $article->titles }}
            <input class="form-control" id="image" name="image" value type="file">
        </div>
        @error('image')
            {{ $message }}
        @enderror
        <div class="mb-3">
            <input type="radio" name="status" value="0" @checked(!$article->status)>
            <label>Non Attivo</label><br>
            <input type="radio" name="status" value="1" @checked($article->status)>
            <label>Attivo</label><br>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Aggiorna</button>
        </div>
    </form>
</div>
</x-backLayout>