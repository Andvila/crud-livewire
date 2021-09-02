<div>
    <div class="row mb-3 p-2">
        <div class="col-md-3">
            <label for="">Continentes</label>
            <select name="" id="" class="form-select" wire:model="byContinent">
                <option value="">Ninguno seleccionado</option>
                @foreach ($continents as $continent)
                    <option value="{{ $continent->id }}"> {{ $continent->continent_name }} </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="">Search</label>
            <input type="text" class="form-control" wire:model.debounce.350ms="search">
        </div>
        <div class="col-md-2">
            <label for="">Por pagina</label>
            <select name="" id="" class="form-select" wire:model="perPage">
                <option value="5">5</option>
                <option value="15">15</option>
                <option value="25">25</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="">Ordenar por</label>
            <select class="form-select" wire:model="orderBy">
                <option value="">Ninguno seleccionado</option>
                <option value="country_name">Country Name</option>
                <option value="capital_city">Capital City</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="">Orden</label>
            <select class="form-select" wire:model="sortBy">
                <option value="">Ninguno seleccionado</option>
                <option value="asc">ASC</option>
                <option value="desc">DESC</option>
            </select>
        </div>
    </div>

    @if (session()->has('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
           {{ session('exito') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <button class="btn btn-primary btn-sm mb-3" wire:click="OpenAddCountryModal()" >Agregar nuevo pais</button>
    @if ($checkedCountry)
        <button class="btn btn-danger btn-sm mb-3 ml-3" wire:click="deleteCountries()">Paises Seleccionados ({{ count($checkedCountry) }}) </button>
    @endif
    <table class="table-auto table-dark table table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th></th>
                <th>Continente</th>
                <th>Pais</th>
                <th>Ciudad Capital</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($countries as $country)
                <tr class="{{ $this->isChecked($country->id) }}">
                    <td>
                        <input type="checkbox" wire:model="checkedCountry" value="{{ $country->id }}">
                    </td>
                    <td scope="row">{{ $country->continent->continent_name }}</td>
                    <td>{{ $country->country_name }}</td>
                    <td>{{ $country->capital_city }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-danger btn-sm mr-2" wire:click="deleteConfirm({{$country->id}})">Delete</button>
                            <button class="btn btn-success btn-sm" wire:click="OpenEditCountryModal({{$country->id}})">Edit</button>
                        </div>
                    </td>
                </tr>
            @empty
                <code>Sin paises</code>
            @endforelse
        </tbody>
    </table>

    @if (count($countries))
        {{-- {{ $countries->links('nombre_del_blade_paginacion') }} --}}
        {{ $countries->links() }}
    @endif

    @include('modals.add-modal')
    @include('modals.edit-modal')
</div>
