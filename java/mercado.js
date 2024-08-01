


document.getElementById('ofertaForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío del formulario

            // Obtener los valores del formulario
            const moneda = document.getElementById('moneda').value;
            const cantidad = document.getElementById('cantidad').value;
            const precio = document.getElementById('precio').value;
            const metodo = document.getElementById('metodo').value;

            // Crear una nueva fila
            const nuevaFila = document.createElement('tr');
            nuevaFila.innerHTML = `
                <td>${moneda}</td>
                <td>${cantidad}</td>
                <td>${precio}</td>
                <td>${metodo}</td>
                <td></td>
            `;

            // Agregar la nueva fila a la tabla
            document.querySelector('#ofertasTable tbody').appendChild(nuevaFila);

            // Reiniciar el formulario
            this.reset();
        });// Obtener el elemento HTML donde quieres mostrar el precio de las monedas
