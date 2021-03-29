const error = document.getElementById("error");
error.style.color = "red";

const form = document.getElementById("formulario");
form.addEventListener("submit", (e) => {
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

  const data = new FormData(form);
  sendData(data);
});

const sendData = async (data) => {
  const send = await fetch("php/validar.php", {
    method: "POST",
    body: data,
  });
  const response = await send.json();
  console.log(response);
};
