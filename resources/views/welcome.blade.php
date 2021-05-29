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
        <div class="container-colauno">
            <h2>Cola 1</h2>
            <ul></ul>
        </div>
        <div class="container-colados">
            <h2>Cola 2</h2>
            <ul></ul>
        </div>
    </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script defer src="{{ asset('plugins') }}/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('plugins') }}/sweetalerts/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            type: 'get',
            url: '{{ route('allData') }}',
            dataType: 'json',
            cache: false,
            success: function (datas) {
                let r = datas.cola1.length > 0 ? datas.cola1 : [datas.cola1];
                let dos = datas.cola2.length > 0 ? datas.cola2 : [datas.cola2];
                if(datas.cola1.length > 0){
                    for (let i = 0; i < r.length; i++) {
                        $('.container-colauno ul').append('<li>'+ r[i].cliente_id +'-'+r[i].nombre+'</li>');   
                    }
                }else{
                    $('.container-colauno ul').append('<li>Sin Clientes</li>');
                }
                if(datas.cola2.length > 0){
                    for (let i = 0; i < dos.length; i++) {
                        $('.container-colados ul').append('<li>'+ dos[i].cliente_id +'-'+dos[i].nombre+'</li>');   
                    }
                }else{
                    $('.container-colados ul').append('<li>Sin Clientes</li>');
                }
               
            },
            error: function (datas) {
                console.log('error');
            }
        });
    });
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
                $('.container-colauno ul').html('');
                $('.container-colados ul').html('');
                let r = datas.cola1.length > 0 ? datas.cola1 : [datas.cola1];
                let dos = datas.cola2.length > 0 ? datas.cola2 : [datas.cola2];
                if(datas.cola1.length > 0){
                    for (let i = 0; i < r.length; i++) {
                        $('.container-colauno ul').append('<li>'+ r[i].cliente_id +'-'+r[i].nombre+'</li>');   
                    }
                }else{
                    $('.container-colauno ul').append('<li>Sin Clientes</li>');
                }
                if(datas.cola2.length > 0){
                    for (let i = 0; i < dos.length; i++) {
                        $('.container-colados ul').append('<li>'+ dos[i].cliente_id +'-'+dos[i].nombre+'</li>');   
                    }
                }else{
                    $('.container-colados ul').append('<li>Sin Clientes</li>');
                }
            },
            error: function (datas) {
                console.log('error');
            }
        });
    });
    setInterval(function(){
        alert('hola');
    }, 3000);
    setInterval(function(){
        alert('222222222222222');
    }, 5000);
</script>