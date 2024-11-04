<?php
// Establece la ubicación del archivo donde se guardarán los datos
$file = 'visitor_data.txt';

// Obtiene la dirección IP del visitante
$ip_address = $_SERVER['REMOTE_ADDR'];

// Obtiene el tipo de navegador del visitante
$browser = $_SERVER['HTTP_USER_AGENT'];

// Obtiene el nombre del dispositivo y el sistema operativo (simplificado)
$device_type = '';
if (preg_match('/mobile/i', $browser)) {
    $device_type = 'Mobile';
} elseif (preg_match('/tablet/i', $browser)) {
    $device_type = 'Tablet';
} else {
    $device_type = 'Desktop';
}

// Guarda los datos en el archivo
$visitor_data = "IP: $ip_address, Browser: $browser, Device: $device_type\n";
file_put_contents($file, $visitor_data, FILE_APPEND);

// Muestra una tarjeta de felicitación en HTML
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felicitaciones</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }
        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .card h1 {
            color: #4CAF50;
        }
        .card p {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>¡Error al leer código QR!</h1>
        <p>Intentelo de nuevo...</p>
    </div>
</body>
</html>
