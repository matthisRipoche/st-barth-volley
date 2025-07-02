@extends('back-office.layout')

@section('content')
    <div class="container py-5">
        <h2>Modifier l’article</h2>

        <form action="{{ route('back-office.articles.update', $article->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title"
                       value="{{ old('title', $article->title) }}" required>
            </div>

            {{-- Slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug"
                       value="{{ old('slug', $article->slug) }}">
            </div>

            {{-- Content --}}
            <div class="mb-3">
                <label for="content" class="form-label">Contenu</label>
                <textarea class="form-control" id="content" name="content" rows="6" required>{{ old('content', $article->content) }}</textarea>
            </div>

            {{-- Media Picker --}}
            <div class="mb-3">
                <label class="form-label">Image associée</label>
                <div class="d-flex align-items-center gap-3">
                    <input type="hidden" name="media_id" id="media_id" value="{{ old('media_id', $article->media_id) }}">
                    <img id="media_preview" src="{{ $article->media?->url ?? 'https://via.placeholder.com/160' }}"
                         alt="Preview" class="rounded border" width="80" height="80">
                    <button type="button" class="btn btn-outline-primary openMediaModal">
                        Choisir un média
                    </button>
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('back-office.articles.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
@endsection

@section('modals')
    @include('back-office.modal-mediatheque', ['media' => $media])
@endsection
