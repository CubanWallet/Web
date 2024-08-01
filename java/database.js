// database.js
let usuarios = [];

module.exports = {
    leerUsuarios: function() {
        return usuarios;
    },
    agregarUsuario: function(usuario) {
        usuarios.push(usuario);
    }
};
