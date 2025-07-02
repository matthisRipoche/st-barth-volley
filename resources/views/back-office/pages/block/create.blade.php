@extends('back-office.layout')

@section('content')
    <div class="container py-5">
        <h2>Créer un nouveau bloc</h2>

        <form action="{{ route('back-office.blocks.store') }}" method="POST">
            @csrf

            {{-- Nom du bloc --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nom du bloc</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            {{-- Slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug (ex: "hero", "quote")</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required>
            </div>
            
            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">Créer le bloc</button>
            <a href="{{ route('back-office.blocks.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
