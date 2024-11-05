<?php
// Capturar información del visitante
$ip = $_SERVER['REMOTE_ADDR'];
$host = gethostbyaddr($ip);
$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/mobile|android|iphone|ipad/i', $userAgent)) {
    $deviceType = 'Móvil';
} else {
    $deviceType = 'Escritorio';
}

$logEntry = "IP: $ip, Host: $host, Dispositivo: $deviceType, Navegador: $userAgent\n";
file_put_contents('visitor_log.txt', $logEntry, FILE_APPEND);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error de lectura QR</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #007bff;
        }
        p {
            font-size: 1.1em;
        }
        .info-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #e7f3ff;
            border-left: 4px solid #007bff;
            border-radius: 5px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Error de lectura de código</h1>
        <p>Escanea de nuevo tu código QR</p>
        <div class="info-box">
            
        </div>
    </div>
</body>
</html>

