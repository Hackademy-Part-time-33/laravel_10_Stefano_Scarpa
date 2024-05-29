<x-backLayout>

    <div class="container">
        <div class="container py-4"> 
            <div class="p-5 mb-4 bg-tertiary rounded-3 border">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Benvenuto {{Auth::user()->name}}</h1>
                    <p class="col-md-8 fs-4">Qui puoi creare nuovi
                        post, clicca sul pulsante in basso per
                        accedere alla sezione dedicata </p>
                        <button class="btn btn-primary btn-lg"
                        type="button">Nuovo post</button>
                    </div>
                </div>
                <div class="row align-items-md-stretch">
                    <div class="col-md-4">
                        <div class="h-100 p-5 text-bg-dark rounded-3">
                            <h2>Amministra i post</h2>
                            
                            <button class="btn btn-outline-light"
                            type="button">Vedi post</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div
                        class="h-100 p-5 bg-body-tertiary border rounded-3">
                        <h2>Gestione Categorie</h2>
                        
                        <button class="btn btn-outline-secondary"
                        type="button">Vedi categorie</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div
                    class="h-100 p-5  border rounded-3">
                    <h2>Gestione Autori</h2>
                    
                    <button class="btn btn-outline-secondary"
                    type="button">Vedi autori</button>
                </div>
            </div>
        </div>
    </div>

</x-backLayout>