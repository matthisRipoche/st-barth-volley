@extends('back-office.layout')

@section('content')
<div class="container-fluid py-5">
    <h2>Gestion du menu : {{ $menu->title }}</h2>

    <div class="row mb-4">
        <div class="col-md-12">
            <form action="{{ route('back-office.menus.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Spoofing PUT method --}}
                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                <div class="mb-3 col-md-6">
                    <label for="title">Titre</label>
                    <input type="text" name="title" class="form-control" value="{{ $menu->title }}" required>
                </div>
                <div class="mb-3 col-md-6">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ $menu->slug }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>

    <div class="row">
        {{-- Sidebar gauche : Pages et lien perso --}}
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Pages disponibles</div>
                <ul class="list-group list-group-flush">
                    @foreach($pages as $page)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $page->title }}
                            <form action="{{ route('back-office.menus.items.store', $menu->id) }}" method="POST" class="d-inline add-page-form">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                                <input type="hidden" name="page_id" value="{{ $page->id }}">
                                <input type="hidden" name="label" value="{{ $page->title }}">
                                <button type="submit" class="btn btn-sm btn-primary">Ajouter</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="card">
                <div class="card-header">Lien personnalisé</div>
                <div class="card-body">
                    <form action="{{ route('back-office.menus.items.store', $menu->id) }}" method="POST" class="add-custom-link-form">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                        <div class="mb-3">
                            <label for="customLabel">Nom</label>
                            <input type="text" name="label" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="customUrl">URL</label>
                            <input type="text" name="url" class="form-control" placeholder="/chemin" required>
                        </div>
                        <button type="submit" class="btn btn-success">Ajouter au menu</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Colonne droite : Menu actuel --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Éléments du menu</div>
                <ul class="list-group list-group-flush">
                    @foreach ($menu->items->sortBy('order') as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $item->label }}
                            <form action="{{ route('back-office.menus.items.up', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-primary">Monter</button>
                            </form>
                            <form action="{{ route('back-office.menus.items.down', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-sm btn-primary">Descendre</button>
                            </form>
                            <div>
                                @if ($item->page)
                                    <small class="text-muted">(Page : {{ $item->page->title }})</small>
                                @elseif ($item->url)
                                    <small class="text-muted">(URL : {{ $item->url }})</small>
                                @endif
                                <form action="{{ route('back-office.menus.items.destroy', $item->id) }}"
                                      method="POST" class="d-inline ms-2">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
    
@endsection
