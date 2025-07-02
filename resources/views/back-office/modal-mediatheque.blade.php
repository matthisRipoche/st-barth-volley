{{-- Modal Médias --}}
<div id="mediaModal" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none z-50" style="z-index: 1050;">
    <div class="bg-white p-4 rounded shadow-lg mx-auto my-5" style="width: 90%; max-width: 900px; max-height: 80vh; overflow-y: auto;">
        <h5 class="mb-4">Choisir un média</h5>
        <div class="row g-3">
            @foreach ($media as $item)
                <div class="col-3">
                    <div class="border rounded overflow-hidden cursor-pointer select-media" data-id="{{ $item->id }}" data-url="{{ $item->url }}">
                        <img src="{{ $item->url }}" class="w-100 h-100 object-fit-cover" style="aspect-ratio: 1 / 1;" />
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-end mt-3">
            <button class="btn btn-sm btn-secondary closeMediaModal">Fermer</button>
        </div>
    </div>
</div>