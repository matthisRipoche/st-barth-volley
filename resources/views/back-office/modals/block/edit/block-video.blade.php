<div id="customModalBlock-{{ $collection->id }}" 
    class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none" 
    style="z-index: 1050;">
   
   <div class="bg-white p-4 rounded shadow-lg mx-auto my-5"
        style="width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto;">
       
       <div class="d-flex justify-content-between align-items-center mb-4">
           <h5 class="mb-0">Modifier le bloc Vidéo : {{ $block->name }}</h5>
           <button type="button" class="btn-close closeCustomModal" data-target="customModalBlock-{{ $collection->id }}" aria-label="Fermer"></button>
       </div>

       <form method="POST" action="{{ route('back-office.pages.blocks.update', [$page->id, $block->id]) }}">
           @csrf
           @method('PUT')

           <div class="mb-3">
               <label for="video-url-{{ $collection->id }}" class="form-label">URL YouTube (embed)</label>
               <input type="url" class="form-control" id="video-url-{{ $collection->id }}"
                      name="content[url]" value="{{ $data['url'] ?? '' }}"
                      placeholder="https://www.youtube.com/embed/xxxxxx" required>
           </div>

           <div class="mb-3">
               <label for="video-caption-{{ $collection->id }}" class="form-label">Légende (caption)</label>
               <input type="text" class="form-control" id="video-caption-{{ $collection->id }}"
                      name="content[caption]" value="{{ $data['caption'] ?? '' }}"
                      placeholder="Une courte description">
           </div>

           <div class="d-flex justify-content-between mt-4">
                <button type="button" class="btn btn-secondary closeCustomModal" data-target="customModalBlock-{{ $collection->id }}">
                    Annuler
                </button>
            
               <button type="submit" class="btn btn-success">Mettre à jour</button>
           </div>
       </form>
   </div>
</div>
