@extends('back-office.layout')

@section('content')
    <div class="container py-5">
        <form action="{{ route('back-office.pages.update', $page) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $page->title) }}" required>
                    </div>

                    {{-- Slug --}}
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (ex: "mon-super-article")</label>
                        <input type="text" class="form-control" id="slug" name="slug"
                            value="{{ old('slug', $page->slug) }}" required>
                    </div>
                </div>
                <div class="col-md-4 bg-white p-4">
                    {{-- is_active --}}
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active"
                            {{ old('is_active', $page->is_active) ? 'checked' : '' }} value="1">
                        <label class="form-check-label" for="is_active">
                            Activer la page
                        </label>
                    </div>


                    {{-- is_home --}}
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="is_home" name="is_home"
                            {{ old('is_home', $page->is_home) ? 'checked' : '' }} value="1">
                        <label class="form-check-label" for="is_home">
                            Définir comme page d'accueil
                        </label>
                    </div>

                    {{-- is_news --}}
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="is_news" name="is_news"
                            {{ old('is_news', $page->is_news) ? 'checked' : '' }} value="1">
                        <label class="form-check-label" for="is_news">
                            Définir comme page des actualités
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    <a href="{{ route('back-office.pages.index', $page->id) }}" class="btn btn-secondary">Annuler</a>
                </div>
            </div>
        </form>

        @if($page->blockCollections->count())
            <h3 class="mt-5">Blocs associés à cette page</h3>
            <ul class="list-group mb-4">
                @foreach($page->blockCollections as $collection)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>#{{ $collection->position }}</strong> - {{ $collection->block->name }} ({{ $collection->type }})
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-secondary openCustomModal" data-target="customModalBlock-{{ $collection->id }}">
                            Modifier
                        </button>
            
                        <!-- Supprimer -->
                        <form action="{{ route('back-office.pages.delete-block', [$page->slug, $collection->block_id])}}" method="POST" onsubmit="return confirm('Supprimer ce bloc ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </div>
                </li>

                @includeIf('back-office.modals.block.edit.block-' . $collection->block->type, [
                    'collection' => $collection,
                    'block' => $collection->block,
                    'data' => $collection->block->content,
                ])
            
            @endforeach
            
            </ul>
        @endif

        <button type="button" class="btn btn-primary openCustomModal" data-target="addBlockModal">
            Ajouter un bloc existant
        </button>        
            
        @includeIf('back-office.modals.block.block-add', ['blocks' => $blocks])
    </div>
@endsection



