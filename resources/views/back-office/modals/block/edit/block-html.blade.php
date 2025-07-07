<div id="customModalBlock-{{ $collection->id }}" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none" style="z-index: 1050;">
    <div class="bg-white p-4 rounded shadow-lg mx-auto my-5" style="width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto;">
        <h5 class="mb-4">Modifier le bloc : {{ $block->name }}</h5>

        <form method="POST" action="{{ route('back-office.pages.blocks.update', [$page->id, $block->id]) }}">
            @csrf
            @method('PUT')

            @php
                $contentId = 'trix-content-' . $collection->id;
            @endphp

            <input id="{{ $contentId }}" type="hidden" name="content[content]" value="{{ old('content', $data['content'] ?? '') }}">
            <trix-editor input="{{ $contentId }}" class="trix-content"></trix-editor>

            <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary closeCustomModal" data-target="customModalBlock-{{ $collection->id }}">
                    Annuler
                </button>

                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
