<x-main>
    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Immagine</th>
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
                        <td>{{ $article->titles }}</td>
                        <td>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <a href="{{ route('articles.show', ['article' => $article->id]) }}"
                                    class="btn btn-primary me-md-2">
                                    Visualizza
                                </a>
                                <a href="{{ route('articles.edit', ['article' => $article->id]) }}"
                                    class="btn btn-warning me-md-2">
                                    Modifica
                                </a>
                                <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger me-md-2">Elimina</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-main>