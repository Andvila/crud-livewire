<div class="modal fade show addCountry " wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo pais</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Continente</label>
                        <select class="form-control" wire:model="continent">
                            <option value="">Sin opcion</option>
                            @foreach($continents as $continent)
                                <option value="{{ $continent->id }}">{{ $continent->continent_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('continent') {{ $message }}   @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Nombre del pais</label>
                        <input type="text" class="form-control" placeholder="Nombre del pais" wire:model="country_name">
                        <span class="text-danger">
                            @error('country_name') {{ $message }}   @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Ciudad Capital</label>
                        <input type="text" class="form-control" placeholder="Ciudad Capital" wire:model="capital_city">
                        <span class="text-danger">
                            @error('capital_city') {{ $message }}   @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
