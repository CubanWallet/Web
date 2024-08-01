const express = require('express');
const app = express();
const port = 3000;

// Ruta para registrar un usuario
app.post('/registrar', (req, res) => {
    // Obtener los datos del usuario del cuerpo de la solicitud
    const { nombre, correo, contraseña } = req.body;

    // Simulación de registro de usuario (reemplazar con la lógica real de registro)
    const usuarioRegistrado = {
        nombre: nombre,
        correo: correo,
        contraseña: contraseña
    };

    // Simulación de respuesta exitosa
    res.json({
        mensaje: 'Usuario registrado exitosamente'
    });
});

// Iniciar el servidor
app.listen(port, () => {
    console.log(`Servidor escuchando en el puerto ${port}`);
});
