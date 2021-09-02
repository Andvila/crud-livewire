<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
    <title>World Countries</title>
</head>
<body>

    <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="col-md-10 offset-md-1">
                <h1>World Countries</h1>
                @livewire('countries')
            </div>

        </div>
    </div>

    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @livewireScripts

    <script>

        window.addEventListener('OpenAddCountryModal', e => {
            $('.addCountry').find('span').html('');
            $('.addCountry').find('form')[0].reset();
            $('.addCountry').modal('show');
        });

        window.addEventListener('CloseAddCountryModal', e => {
            $('.addCountry').find('span').html('');
            $('.addCountry').find('form')[0].reset();
            $('.addCountry').modal('hide');
        });

        window.addEventListener('OpenEditCountryModal', e => {
            $('.editCountry').find('span').html('');
            $('.editCountry').modal('show');
        });

        window.addEventListener('CloseEditCountryModal', e => {
            $('.editCountry').find('span').html('');
            $('.editCountry').find('form')[0].reset();
            $('.editCountry').modal('hide');
        });

        window.addEventListener('SwalConfirm', e => {
            swal.fire(
                {
                    title: e.detail.title,
                    imageWidth: 48,
                    imageHeight: 48,
                    html: e.detail.message,
                    showCloseButton: true,
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Si, eliminar",
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    width: 300,
                    allowOutsideClick: false
                }
            ).then( result => {
                if(result.value){
                    window.livewire.emit('delete', e.detail.id);
                }
            } )
        });

        window.addEventListener('deleted', e => {
            alert('El pais ha sido borrado');
        });

        window.addEventListener('swal:deleteCountries', e => {

            swal.fire(
                {
                    title: e.detail.title,
                    html: e.detail.message,
                    showCloseButton: true,
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Si, eliminar",
                    cancelButtonColor: "#d33",
                    confirmButtonColor: "#3085d6",
                    width: 300,
                    allowOutsideClick: false
                }
            ).then( result => {
                if(result.value){
                    window.livewire.emit('deleteCheckedCountries', e.detail.checkedIDs);
                }
            } )

        });

    </script>


</body>
</html>
