@extends('back-office.layout')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <a href="{{ route('back-office.blocks.create') }}" class="btn btn-primary mb-3">Ajouter un bloc</a>

        <h1 class="h3 mb-3"><strong>Blocs</strong> - Back Office</h1>

        <div class="card flex-fill">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Liste des blocs</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover my-0 align-middle">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Titre</th>
                            <th>Slug</th>
                            <th>Créé le</th>
                            <th>Modifié le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blocks as $block)
                        <tr>
                            <td>{{ $block->id }}</td>
                            <td>{{ $block->name ?? '-' }}</td>
                            <td>{{ $block->slug }}</td>
                            <td>{{ $block->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $block->updated_at->format('d/m/Y H:i') }}</td>
                            <td class="text-end">
                                <a href="{{ route('back-office.blocks.show', $block) }}" class="btn btn-sm btn-info">Voir</a>
                                <form method="POST" action="{{ route('back-office.blocks.delete', $block) }}" class="d-inline" onsubmit="return confirm('Supprimer ce bloc ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</main>
@endsection
