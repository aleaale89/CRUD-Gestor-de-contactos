<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <br><br>
        <h2>✏️ Editar Contacto</h2>

        <form action="{{ url('/contacto/'.$contacto->id) }}" method="post">
            @csrf 
            {{ method_field('PATCH') }} 

            @include('contacto.form',['modo'=>'Editar'])

            <div class="button-group" style="margin-top: 30px;">
                <button type="submit" class="btn btn-primary">💾 Actualizar Contacto</button>
                <a href="{{url('contacto/')}}" class="btn btn-secondary">❌ Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>