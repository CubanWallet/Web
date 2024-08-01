







// Selecciona el formulario de inicio de sesión
const formLogin = document.getElementById("form-login");

// Agrega un evento de envío al formulario
formLogin.addEventListener("submit", function(event) {
  // Previene el envío por defecto del formulario
  event.preventDefault();

  // Obtén los valores de los campos del formulario
  const usuario = document.getElementById("usuario").value;
  const contraseña = document.getElementById("contraseña").value;

  // Realiza validaciones del lado del cliente (opcional)
  // Por ejemplo:
  // - Verificar si los campos están vacíos
  // - Verificar la longitud de la contraseña
  // ...

  // Si las validaciones son correctas, envía el formulario
  if (usuario && contraseña) {
    // Puedes enviar el formulario de forma asíncrona usando fetch o XMLHttpRequest
    // ...

    // O simplemente permitir el envío del formulario de forma tradicional
    formLogin.submit();
  } else {
    // Muestra un mensaje de error al usuario
    alert("Por favor, completa todos los campos.");
  }
});
