var error = document.getElementById("error");
error.style.color = "red";

var form = document.getElementById("formulario");
form.addEventListener("submit", function (e) {
  e.preventDefault();
  let message = [];
  if (e.target.name.value == "") {
    message.push("ingresa tu nombre");
  }
  if (e.target.email.value == "") {
    message.push("ingresa tu correo");
  }
  if (e.target.movie.value == "") {
    message.push("ingresa tu pelicula ");
  }
  if (e.target.package.value == "") {
    message.push("Selecciona una paquete");
  }
  if (message.length > 0) {
    error.innerHTML = message.join(",  ");
    return;
  }

  const data = {
    name: e.target.name.value,
    email: e.target.email.value,
    package: e.target.package.value,
    movie: e.target.movie.value,
  };
  sendData(data);
});

const sendData = async (data) => {
  const send = await fetch("php/validar.php", {
    method: "POST",
    body: data,
  });
};
