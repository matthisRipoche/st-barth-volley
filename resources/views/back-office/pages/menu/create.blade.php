@extends('back-office.layout')

@section('content')
    <div class="container py-5">
        <h2>Créer un nouveau menu</h2>

        <form action="{{ route('back-office.menus.store') }}" method="POST" enctype="multipart/form-data">
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

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">Créer le menu</button>
            <a href="{{ route('back-office.menus.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
