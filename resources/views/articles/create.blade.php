<x-dashboard>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-floating mb-3">
            <input class="form-control" id="title" value="{{ old('title') }}" name="title"
                type="text">
            <label for="title">Titolo Libro</label>
            @error('title')
                {{ $message }}
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" id="pages" value="{{ old('pages') }}" name="pages"
                type="text">
            <label for="pages">Pagine Libro</label>
            @error('pages')
                {{ $message }}
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" id="years" value="{{ old('years') }}" name="years"
                type="text">
            <label for="years">Anno del Libro</label>
            @error('years')
                {{ $message }}
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" id="image" name="image" value type="file">
        </div>
        @error('image')
            {{ $message }}
        @enderror
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Salva</button>
        </div>
    </form>

</x-dashboard>