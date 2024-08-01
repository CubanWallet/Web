


<?php
if (isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contraseña"]) && isset($_POST["confirmar-contraseña"])) {
    // Validaciones:
    if (empty($_POST["nombre"])) {
        $errores[] = "Por favor, introduce tu nombre.";
    }
    if (empty($_POST["correo"]) || !filter_var($_POST["correo"], FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Por favor, introduce un correo electrónico válido.";
    }
    if (empty($_POST["contraseña"]) || strlen($_POST["contraseña"]) < 8) {
        $errores[] = "Por favor, introduce una contraseña con al menos 8 caracteres.";
    }
    if ($_POST["contraseña"] !== $_POST["confirmar-contraseña"]) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    // Si no hay errores, procesar los datos
    if (empty($errores)) {
        // ... (código para procesar los datos) ...
    } else {
        // Mostrar los errores
        foreach ($errores as $error) {
            echo "<p class='error'>$error</p>";
        }
        // Redirigir al formulario
        header("Location: formulario.php");
        exit;
    }
} else {
    echo "Faltan datos del formulario.";
}
?>

     
   

   <?php
   // Conexión a la base de datos
   $servername = "0.0.0.0";
   $username = "root";
   $password = "root";
   $dbname = "Iniciodb"; // Nombre de tu base de datos

   $conn = new mysqli($servername, $username, $password, $dbname);

   // Verificar la conexión
   if ($conn->connect_error) {
       die("Error de conexión: " . $conn->connect_error);
   }

   // Validar los datos del formulario (puedes agregar más validaciones)
   if (isset($_POST["nombre"]) && isset($_POST["correo"]) && isset($_POST["contraseña"]) && isset($_POST["confirmar-contraseña"])) {
       $nombre = $_POST["nombre"];
       $correo = $_POST["correo"];
       $contraseña = $_POST["contraseña"];
       $confirmar_contraseña = $_POST["confirmar-contraseña"];

       // Validar contraseñas
       if ($contraseña != $confirmar_contraseña) {
           echo "Las contraseñas no coinciden";
           exit;
       }

       // Encriptar la contraseña (usando bcrypt o similar)
       $contraseña_encriptada = password_hash($contraseña, PASSWORD_DEFAULT);

       // Insertar los datos en la tabla usuarios
       $sql = "INSERT INTO usuarios (nombre, correo, contrasena) 
               VALUES ('$nombre', '$correo', '$contraseña_encriptada')";

       if ($conn->query($sql) === TRUE) {
           echo "Registro exitoso";
       } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
       }

       $conn->close();
   } else {
       echo "Faltan datos del formulario";
   }
   ?>