<x-main>
    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <h2 class="mt-5">In questa sezione trovi la lista di tutti gli autori</h2>
        <p class="mb-5">Da qui puoi: visualizzare, modificare o cancellare gli autori</p>

        <div class="text-center container">
            @if (session('success'))
                <span class="alert alert-success rounded-0" role="alert">
                    {{ session('success') }}
                </span>
            @endif
        </div>

        <a href="{{ route('authors.create')}}"
            class="mb-3 btn btn-outline-success me-md-2 rounded-0">
            <i class="bi bi-file-earmark-plus h5"></i>
            Nuovo autore
        </a>

        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <th scope="row">#{{ $author->id }}</th>
                        <td>{{ $author->id }}</td>
                        <td>{{ $author->firstname }}</td>
                        <td>{{ $author->lastname }}</td>
                        
                        <td>

                            <div class="d-grid gap-1 d-md-flex justify-content-md-end">

                                <a href="{{ route('authors.show', ['author' => $author->id]) }}"
                                    class="btn me-md-2">
                                    <i class="bi bi-file-earmark h5"></i>
                                </a>
                                <a href="{{ route('authors.edit', ['author' => $author->id]) }}"
                                    class="btn me-md-2">
                                    <i class="bi bi-pencil-square h5"></i>
                                </a>
                                <form action="{{ route('authors.destroy', ['author' => $author->id]) }}" method="POST">
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
        {{ $authors->links() }}
    </div>
</x-main>