<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de boleto</title>
</head>
<body>
    <h2>¡Gracias por reservar tu boleto para el evento!</h2>
    <p>Adjunto encontrarás el código QR para tu acceso al evento.</p>
    <img src="data:image/png;base64, {!! base64_encode($qrCode) !!}">
</body>
</html>