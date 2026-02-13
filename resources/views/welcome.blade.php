<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de Contactos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Tu Gestor de Contactos</h1>
        <p class="description">Organiza y administra tus contactos de manera eficiente.</p>
        
        <div class="button-group">
            <a href="/contacto/create" class="btn btn-primary">➕  Crear Nuevo Contacto</a> 
            <br>
            <br>
            <a href="/contacto" class="btn btn-secondary">📋 Ver Lista de Contactos</a>
        </div>
    </div>
</body>
</html>