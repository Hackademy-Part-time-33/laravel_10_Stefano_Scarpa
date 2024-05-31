<x-main>
    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <h2 class="mt-5">In questa sezione trovi la lista di tutti i post</h2>
        <p class="mb-5">Da qui puoi: visualizzare, modificare o cancellare i tuoi post</p>

        <div class="text-center container">
            @if (session('success'))
                <div class="alert alert-success rounded-0" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <a href="{{ route('articles.create')}}"
            class="mb-3 btn btn-outline-success me-md-2 rounded-0">
            <i class="bi bi-file-earmark-plus h5"></i>
            Nuovo articolo
        </a>

        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Autore</th>
                    <th scope="col">Titolo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <th scope="row">#{{ $article->id }}</th>
                        <td>
                            <img class="card-img-top" style="width:3rem" src="{{ Storage::url($article->image) }}"
                                alt="..." />
                        </td>
                        <td>{{ $article->user_id }}</td>
                        <td>{{ $article->titles }}</td>
                        
                        <td>

                            <div class="d-grid gap-1 d-md-flex justify-content-md-end">

                                <a href="{{ route('articles.show', ['article' => $article->id]) }}"
                                    class="btn me-md-2">
                                    <i class="bi bi-file-earmark h5"></i>
                                </a>
                                <a href="{{ route('articles.edit', ['article' => $article->id]) }}"
                                    class="btn me-md-2">
                                    <i class="bi bi-pencil-square h5"></i>
                                </a>
                                <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-danger me-md-2"><i class="bi bi-trash h5"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-main>