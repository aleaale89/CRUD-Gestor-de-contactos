<!DOCTYPE html>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Contacto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <br>
        <h2>➕  Crear Nuevo Contacto</h2>

        <form action="{{ url('/contacto') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('contacto.form',['modo'=>'Crear'])
            
            <div class="button-group" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary">💾 Agregar Contacto</button>
                <a href="{{url('contacto/')}}" class="btn btn-secondary">❌ Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>