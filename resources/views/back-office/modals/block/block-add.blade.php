<div id="addBlockModal" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-none" style="z-index: 1050;">
    <div class="bg-white p-4 rounded shadow-lg mx-auto my-5"
         style="width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto;">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">Ajouter un bloc existant</h5>
            <button type="button" class="btn-close closeCustomModal" data-target="addBlockModal"></button>
        </div>

        <div class="list-group">
            <form method="POST" action="{{ route('back-office.pages.add-block', $page) }}" class="list-group-item d-flex justify-content-between align-items-center">
                @csrf
                <select name="block[type]" id="block-type" class="form-select" required>
                    <option value="">-- Choisir un type --</option>
                    @foreach($blocks as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-success">Ajouter</button>
            </form>
        </div>
    </div>
</div>
