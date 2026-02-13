<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tus Contactos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <br>
        <h1>📇 Tus Contactos</h1>
        
        @if(Session::has('mensaje'))
            <div class="alert alert-success">
                {{ Session::get('mensaje') }}
            </div>
        @endif

        <p class="description">Aquí puedes ver y administrar tus contactos.</p>

        <div class="button-group">
            <a href="{{url('contacto/create')}}" class="btn btn-primary">➕  Crear Nuevo Contacto</a>
            <a href="{{url('/')}}" class="btn btn-secondary">🏠 Ir al Inicio</a><br>
        </div>
        <br><br>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <br>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactos as $contacto)
                <tr>
                    <td>#{{ $contacto->id }}</td>
                    <td><strong>{{ $contacto->nombre }}</strong></td>
                    <td>{{ $contacto->apellido }}</td>
                    <td><a href="mailto:{{ $contacto->correo }}">{{ $contacto->correo }}</a></td>
                    <td>{{ $contacto->telefono }}</td>
                    <td>{{ $contacto->direccion }}</td>
                    <td>
                        <div class="actions">
                            <a href="{{ url('/contacto/'.$contacto->id.'/edit') }}" class="btn btn-warning">✏️ Editar</a>
                            <form action="{{url('/contacto/'.$contacto->id)}}" method="post" style="display: inline;">
                                @csrf    
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar este contacto?')" value="🗑️ Borrar">
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>