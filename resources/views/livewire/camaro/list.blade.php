<div>
    <div class="d-flex gap-2 mb-3">
        <input type="text" placeholder="Zoek Camaro..." class="form-control me-2">
        <select class="form-select me-2">
            <option value="">Alle categorieën</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="row">
        @foreach($camaros as $camaro)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($camaro->image_url)<img src="{{ $camaro->image_url }}" alt="Camaro" class="card-img-top">@endif
                    <div class="card-body">
                        <h5>{{ $camaro->name }} ({{ $camaro->year }})</h5>
                        <p>{{ Str::limit($camaro->description,150) }}</p>
                        <a href="{{ route('camaro.show',$camaro) }}" class="btn btn-sm btn-outline-primary">Bekijk</a>
                        @can('toggleStatus',$camaro)
                            <button wire:click="toggleStatus({{ $camaro->id }})" class="btn btn-sm btn-outline-success">{{ $camaro->is_active ? 'Deactiveer' : 'Activeer' }}</button>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div>{{ $camaros->links() }}</div>
</div>
