<x-backLayout>

    <div class="container my-5 py-5">

    <h2 class="h1">Modifica l'autore</h2>
    <p class="mb-5">Per modificare l'autore entra nei campi e fai le tue modifiche, poi clicca su salva</p>
    <form action="{{route('authors.update', compact('author'))}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input class="form-control" id="firstname" value="{{ $author->firstname }}" name="firstname"
                type="text">
            <label for="firstname">Nome</label>
            @error('firstname')
                {{ $message }}
            @enderror
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" id="lastname" value="{{ $author->lastname }}" name="lastname"
                type="text">
            <label for="lastname">Cognome</label>
            @error('lastname')
                {{ $message }}
            @enderror
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" type="submit">Aggiorna</button>
        </div>
    </form>
</div>
</x-backLayout>