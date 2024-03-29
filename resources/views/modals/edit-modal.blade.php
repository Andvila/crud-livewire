<div class="modal fade show editCountry" wire:ignore.self tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" wire:loading.remove wire:target="save">
                <h5 class="modal-title" id="exampleModalLabel">Editar pais</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" wire:loading.remove wire:target="save">
                <form wire:submit.prevent="update" >
                    <input type="hidden" wire:model="cid">
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Continente</label>
                        <select class="form-control" wire:model.defer="continent">
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
                        <input type="text" class="form-control" placeholder="Nombre del pais" wire:model.defer="country_name">
                        <span class="text-danger">
                            @error('country_name') {{ $message }}   @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="">Ciudad Capital</label>
                        <input type="text" class="form-control" placeholder="Ciudad Capital" wire:model.defer="capital_city">
                        <span class="text-danger">
                            @error('capital_city') {{ $message }}   @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                    </div>
                </form>
            </div>
            <div class="flex justify-center items-center">
                <div wire:loading.delay wire:target="save" class="py-4">
                    <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-blue-500">
                    </div>
                    <div class="mt-1 animate-pulse">
                        Cargando...
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
