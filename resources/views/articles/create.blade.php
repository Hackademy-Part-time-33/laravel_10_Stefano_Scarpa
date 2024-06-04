<x-backLayout>

    <div class="container my-5 py-5">

    <h2 class="h1">Crea l'articolo</h2>
    <p class="mb-5">Compila tutti i campi e crea il tuo articolo</p>
    <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input class="form-control" id="titles" value="{{ old('titles') }}" name="titles"
                type="text">
            <label for="titles">Titolo post</label>
            @error('titles')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" name="texts" id="floatingTextarea2" rows="10" style="height: 300px;">{{old('texts')}}</textarea>
            <label for="floatingTextarea2" class="form-label">Inserisci qui il testo</label>
            @error('texts')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="author_id" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach ($authors as $author)    
                <option value="{{$author->id}}">{{$author->firstname . ' ' . $author->lastname}}</option>
                @endforeach
              </select>
            @error('texts')
                {{ $message }}
            @enderror
        </div>
        <div class="mb-3">
            @foreach ($categories as $category)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]"
                        value="{{ $category->id }}">
                    <label class="form-check-label" for="category_id">{{ $category->name }}</label>
                </div>
            @endforeach
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="image" name="image" value type="file">
        </div>
        @error('image')
            {{ $message }}
        @enderror
        <div class="mb-3">
            <input type="radio" name="status" value="0">
            <label>Non Attivo</label><br>
            <input type="radio" name="status" value="1">
            <label>Attivo</label><br>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Crea</button>
        </div>
    </form>
</div>
</x-backLayout>