// Seleccionamos el navbar
const navbar = document.getElementById("navbar");

// Añadimos un evento al hacer scroll
window.addEventListener("scroll", () => {
  // Verificamos si el scroll es mayor a 50px (ajústalo según tu diseño)
  if (window.scrollY > 70) {
    navbar.classList.add("fixed");
  } else {
    navbar.classList.remove("fixed");
  }
});