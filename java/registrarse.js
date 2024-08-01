const formRegistro = document.getElementById("form-registro");
const nombre = document.getElementById("nombre");
const correo = document.getElementById("correo");
const contraseña = document.getElementById("contraseña");
const confirmarContraseña = document.getElementById("confirmar-contraseña");

formRegistro.addEventListener("submit", (event) => {
    event.preventDefault(); // Evita el envío del formulario por defecto

    // Valida que todos los campos estén completos
    if (nombre.value === "" && correo.value === "" && contraseña.value === "" && confirmarContraseña.value === "") {
        alert("Por favor, completa todos los campos.");
        return;
    }

    // Valida que las contraseñas coincidan
    if (contraseña.value !== confirmarContraseña.value) {
        alert("Las contraseñas no coinciden.");
        return;
    }

    // Valida el correo electrónico
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correo.value)) {
        alert("Ingresa un correo electrónico válido.");
        return;
    }

    // Si las validaciones son correctas, enviar el formulario
    formRegistro.submit();
});
// ... (código JavaScript) ...

// Si las validaciones son correctas, enviar el formulario
if (nombre.value !== "" && correo.value !== "" && contraseña.value !== "" && confirmarContraseña.value !== "") {
    formRegistro.submit();
} else {
    alert("Por favor, completa todos los campos.");
}
