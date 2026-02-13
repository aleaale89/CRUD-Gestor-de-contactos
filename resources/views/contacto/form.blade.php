<div class="form-group">
    <label for="nombre">👤 Nombre:</label>
    <input type="text" name="nombre" value="{{ $contacto->nombre ?? '' }}" id="nombre" required>
</div>
<br>
<div class="form-group">
    <label for="apellido">👤 Apellido:</label>
    <input type="text" name="apellido" value="{{ $contacto->apellido ?? '' }}" id="apellido" required>
</div>
<br>
<div class="form-group">
    <label for="telefono">📞 Teléfono:</label>
    <input type="tel" name="telefono" value="{{ $contacto->telefono ?? '' }}" id="telefono" required>
</div>
<br>
<div class="form-group">
    <label for="correo">📧 Correo:</label>
    <input type="email" name="correo" value="{{ $contacto->correo ?? '' }}" id="correo" required>
</div>
<br>
<div class="form-group">
    <label for="direccion">📍 Dirección:</label>
    <input type="text" name="direccion" value="{{ $contacto->direccion ?? '' }}" id="direccion" required>
</div>
<br>

