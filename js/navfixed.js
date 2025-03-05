// navbar principal
document.addEventListener("DOMContentLoaded", function() {
  fetch("/html/Pagina Principal/nav-principal.html")  
      .then(response => response.text())
      .then(data => {
          document.getElementById("nav-principal").innerHTML = data;
          const navbar = document.querySelector(".navbar");
          window.addEventListener("scroll", () => {
              if (window.scrollY > 80) {
                  navbar.classList.add("fixed");
              } else {
                  navbar.classList.remove("fixed");
              }
          });
      })
      .catch(err => console.error('Error cargando el navbar:', err));
});

//navbar trabajo
document.addEventListener("DOMContentLoaded", function() {
  fetch("/html/Pagina Trabajo (Pascual Work)/navbar-trabajo.html")  
      .then(response => response.text())
      .then(data => {
          document.getElementById("nav-trabajo").innerHTML = data;
          const navbar = document.querySelector(".navbar");
          window.addEventListener("scroll", () => {
              if (window.scrollY > 80) {
                  navbar.classList.add("fixed");
              } else {
                  navbar.classList.remove("fixed");
              }
          });
      })
      .catch(err => console.error('Error cargando el navbar:', err));
});