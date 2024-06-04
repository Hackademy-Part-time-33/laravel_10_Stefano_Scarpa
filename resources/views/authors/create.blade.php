<x-backLayout>
    
    <div class="container my-5 py-5">
        
        <h2 class="h1">Crea l'autore</h2>
        <p class="mb-5">Compila tutti i campi e crea l'autore</p>
        
        <form action="{{route('authors.store')}}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" id="firstname" value="{{ old('firstname') }}" name="firstname"
                type="text">
                <label for="firstname">Nome</label>
                @error('firstname')
                {{ $message }}
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="lastname" value="{{ old('lastname') }}" name="lastname"
                type="text">
                <label for="lastname">Cognome</label>
                @error('lastname')
                {{ $message }}
                @enderror
            </div>
            
            <div class="d-grid">
                <button class="btn btn-primary btn-lg" type="submit">Crea</button>
            </div>
        </form>
    </div>
</x-backLayout>