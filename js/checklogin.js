document.addEventListener("DOMContentLoaded", function() {
    const registerOption_mobile = document.getElementById("register-mobile");
    const loginOption_mobile = document.getElementById("login-mobile");
    const logoutOption_mobile = document.getElementById("logout-mobile");

    // Verifica si el usuario ha iniciado sesión
    const usuarioIniciado_mobile = JSON.parse(localStorage.getItem("usuarioIniciado"));

    if (usuarioIniciado_mobile && usuarioIniciado_mobile.isLoggedIn) {
        // Mostrar solo el botón de "Cerrar Sesión"
        registerOption_mobile.style.display = "none";
        loginOption_mobile.style.display = "none";
        logoutOption_mobile.style.display = "block";
    } else {
        // Mostrar solo "Registrarse" y "Iniciar Sesión"
        registerOption_mobile.style.display = "block";
        loginOption_mobile.style.display = "block";
        logoutOption_mobile.style.display = "none";
    }

    // Manejo del botón "Cerrar Sesión"
    logoutOption.addEventListener("click", function(event) {
        event.preventDefault();
        // Cerrar sesión
        localStorage.setItem("usuarioIniciado", JSON.stringify({ isLoggedIn: false }));
        alert("Has cerrado sesión exitosamente.");
        location.reload(); // Recarga la página para aplicar cambios
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const registerOption_pc = document.getElementById("register-pc");
    const loginOption_pc = document.getElementById("login-pc");
    const logoutOption_pc = document.getElementById("logout-pc");

    // Verifica si el usuario ha iniciado sesión
    const usuarioIniciado_pc = JSON.parse(localStorage.getItem("usuarioIniciado"));

    if (usuarioIniciado_pc && usuarioIniciado_pc.isLoggedIn) {
        // Mostrar solo el botón de "Cerrar Sesión"
        registerOption_pc.style.display = "none";
        loginOption_pc.style.display = "none";
        logoutOption_pc.style.display = "block";
    } else {
        // Mostrar solo "Registrarse" y "Iniciar Sesión"
        registerOption_pc.style.display = "block";
        loginOption_pc.style.display = "block";
        logoutOption_pc.style.display = "none";
    }

    // Manejo del botón "Cerrar Sesión"
    logoutOption.addEventListener("click", function(event) {
        event.preventDefault();
        // Cerrar sesión
        localStorage.setItem("usuarioIniciado", JSON.stringify({ isLoggedIn: false }));
        alert("Has cerrado sesión exitosamente.");
        location.reload(); // Recarga la página para aplicar cambios
    });
});