@extends('back-office.layout')

@section('content')
    <div class="container py-5">
        <h2>Créer un nouvel article</h2>

        <form action="{{ route('back-office.articles.store') }}" method="POST">
            @csrf

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            {{-- Slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug (optionnel)</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea class="form-control" id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
            </div>

            {{-- Media Selector --}}
            <div class="mb-3">
                <label class="form-label">Image de couverture</label>
                <div class="d-flex align-items-center gap-3">
                    <input type="hidden" name="media_id" id="media_id" value="{{ old('media_id') }}">
                    <img id="media_preview" src="https://via.placeholder.com/160" class="rounded border" width="80" height="80">
                    <button type="button" class="btn btn-outline-primary openMediaModal">Choisir dans la médiathèque</button>
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">Créer l’article</button>
            <a href="{{ route('back-office.articles.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection

@section('modals')
    @include('back-office.modals.media.modal-mediatheque', ['media' => $media])
@endsection
