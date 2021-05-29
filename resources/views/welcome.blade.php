<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Control de colas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <link href="{{ asset('plugins') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins') }}/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('plugins') }}/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css"/>
    </head>
    <style>
        .form-container{
            position: relative;
            width: 50%;
            margin: 0 auto;
        }
    </style>
    <body>
        <form class="form-inline form-container">
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Id</div>
                </div>
                <input type="text" class="form-control" id="id" placeholder="Ingrese el id">
            </div>
          
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Nombre</div>
                </div>
                <input type="text" class="form-control" id="nombre" placeholder="Ingrese el Nombre">
            </div>
            <a href="javascript:void(0);" class="btn btn-primary mb-2" id="send">Guardar</a>
        </form>
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script defer src="{{ asset('plugins') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('plugins') }}/sweetalerts/sweetalert2.min.js"></script>
<script>
    $('#send').on('click', function (e) {
        e.preventDefault();
        let id = $('#id').val()
        let nombre = $('#nombre').val();
        $.ajax({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            type: 'post',
            url: '{{ route('register') }}',
            data: {'id': id, 'nombre':nombre},
            dataType: 'json',
            cache: false,
            success: function (datas) {
                console.log('0');
            
            },
            error: function (datas) {
                console.log('1');
            }
        }).done(function (data) {
            console.log(data);
        });
    });
</script>