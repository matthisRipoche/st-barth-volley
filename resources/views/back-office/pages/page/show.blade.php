@extends('back-office.layout')

@section('content')
    <div class="container py-5">
        <h2>Modifier la page</h2>

        <form action="{{ route('back-office.pages.update', $page) }}" method="POST">
            @csrf
            @method('PUT') {{-- Spoofing HTTP PUT --}}

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $page->title) }}" required>
            </div>

            {{-- Slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug (ex: "mon-super-article")</label>
                <input type="text" class="form-control" id="slug" name="slug"
                    value="{{ old('slug', $page->slug) }}" required>
            </div>

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
        </form>
    </div>
@endsection
