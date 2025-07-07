<div id="customModalBlock-{{ $collection->id }}" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none" style="z-index: 1050;">
    <div class="bg-white p-4 rounded shadow-lg mx-auto my-5"
        style="width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto;">
        <h5 class="mb-4">Modifier le bloc : {{ $block->name }}</h5>

        <form method="POST" action="{{ route('back-office.pages.blocks.update', [$page->id, $block->id]) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Titre</label>
                <input type="text" name="content[titre]" class="form-control" value="{{ $data['titre'] ?? '' }}">
            </div>
            
            <div class="mb-3">
                <label>Texte</label>
                <textarea name="content[texte]" class="form-control">{{ $data['texte'] ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label>Image (URL)</label>
                <input type="text" name="content[image]" class="form-control" value="{{ $data['image'] ?? '' }}">
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="content[image_left]" value="1"
                        class="form-check-input" {{ !empty($data['image_left']) ? 'checked' : '' }}>
                <label class="form-check-label">Image à gauche</label>
            </div>

            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary closeCustomModal" data-target="customModalBlock-{{ $collection->id }}">
                Annuler
                </button>
            
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
