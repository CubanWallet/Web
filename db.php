<?php

// Credenciales de la base de datos
$servername = "0.0.0.0"; // Reemplaza con tu servidor
$username = "root"; // Reemplaza con tu usuario
$password = "root"; // Reemplaza con tu contraseña
$dbname = "Iniciodb"; // Reemplaza con el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Ahora puedes usar $conn para realizar consultas a la base de datos
// Ejemplo:
//$sql = "SELECT * FROM usuarios";
//$result = $conn->query($sql);

?>
