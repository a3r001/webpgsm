const express = require('express');
const fs = require('fs');
const path = require('path');
const app = express();
const PORT = 3000;

// Middleware para procesar JSON
app.use(express.json());

// Ruta para servir el HTML
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'index.html'));
});

// Ruta para recibir y guardar datos
app.post('/save_data', (req, res) => {
  const ip = req.headers['x-forwarded-for'] || req.socket.remoteAddress;
  const { browser, deviceType } = req.body;
  const data = `IP: ${ip}, Navegador: ${browser}, Tipo de dispositivo: ${deviceType}\n`;

  // Guardar en archivo txt
  fs.appendFile('visitor_data.txt', data, (err) => {
    if (err) {
      console.error('Error al guardar datos:', err);
      res.status(500).send('Error al guardar datos');
    } else {
      console.log('Datos guardados:', data);
      res.status(200).send('Datos guardados');
    }
  });
});

// Iniciar el servidor
app.listen(PORT, () => {
  console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
