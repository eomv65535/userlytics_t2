<!DOCTYPE html>
<html>

<head>
    <title>Crear Boleto</title>
</head>

<body>
    <h2>Crear Boleto</h2>
    @if (session('error'))
        <p>{{ session('error') }}</p>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <form method="POST" action="{{ route('enviar.boleto.formulario') }}">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="name" required>
        <br>
        <label>Correo electrónico:</label>
        <input type="email" name="email" required>
        <br>
        <label>Tipo de Boleto:</label>
        <select name="ticket_type" required>
            <option value="VIP">VIP</option>
            <option value="preference">Preferencia</option>
            <option value="general">General</option>
        </select>
        <br>
        <input type="submit" value="Reservar Boleto">
    </form>
</body>

</html>
