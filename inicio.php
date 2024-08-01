<?php
// 1. Conexión a la Base de Datos
session_start(); // Inicia la sesión al principio
include("db.php"); // Incluye el archivo db.php después de iniciar la sesión

// ... (resto del código) ...

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la Conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Procesamiento del formulario de inicio de sesión (si se envía)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    // Consulta SQL para obtener el usuario
    $consulta = $conn->prepare("SELECT * FROM usuarios WHERE nombre = ?");

    if ($consulta) {
        $consulta->bind_param("s", $usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $contraseña_hasheada = $fila['contrasena'];

            // Verifica si la contraseña coincide (usando password_verify)
            if (password_verify($contraseña, $contraseña_hasheada)) {
                // Inicio de sesión exitoso
                // *NO NECESITAS LLAMAR A session_start() OTRA VEZ AQUÍ*
                $_SESSION["usuario"] = $usuario;
                header("Location: main.html");
                exit();
            } else {
                $error = "Contraseña o usuario incorrectos";
            }
        } else {
            $error = "Usuario no encontrado"; // Mensaje de error específico
        }

        $consulta->close();
    } else {
        $error = "Error al preparar la consulta: " . $conn->error;
    }

    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<script>
function ocultarMensaje() {
      var mensaje = document.getElementById('error');
      if (mensaje) {
        mensaje.style.display = 'none';
      }
    }

    // Llama a la función después de 2 segundos
    setTimeout(ocultarMensaje, 2000);

</script>

<div class="contenedor">
    <p class="wallet-logo">Mi Wallet</p>


<?php if (isset($error)): ?>
        <p id="error" ><?php echo $error; ?></p>
    <?php endif; ?>
    <form id="form-login" method="post">
        <div class="input-group">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required><br><br>
        </div>
        <div class="input-group">
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" id="contraseña" required><br><br>
        </div>
        <input type="submit" class="button"; value="Iniciar Sesión">
    </form>
        
    <div class="registro">
        <p>¿No tienes una cuenta? <a href="registro.html">Regístrate aquí</a></p>
    </div>
</div>

<script src="js/inicio.js"></script>
</body>
</html>

        