const requireValues = document.querySelectorAll(".require");

const form = document.getElementById("formulario");
form.addEventListener("submit", (e) => {
  requireValues.forEach((i) => (i.style.display = "none"));
  e.preventDefault();
  let sendData = true;
  if (e.target.name.value == "") {
    requireValues[0].innerHTML = "Ingresa tu nombre";
    requireValues[0].style.display = "block";
    sendData = false;
  }
  if (e.target.email.value == "") {
    requireValues[1].innerHTML = "Ingresa tu correo";
    requireValues[1].style.display = "block";
    sendData = false;
  }
  if (
    e.target.email.value.length > 0 &&
    !/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(
      e.target.email.value
    )
  ) {
    requireValues[1].innerHTML = "Correo Invalido";
    requireValues[1].style.display = "block";
    sendData = false;
  }
  if (e.target.package.value == "") {
    requireValues[2].innerHTML = "Seleccione un paquete";
    requireValues[2].style.display = "block";
    sendData = false;
  }
  if (e.target.movie.value == "") {
    requireValues[3].innerHTML = "Ingresa tu pelicula ";
    requireValues[3].style.display = "block";
    sendData = false;
  }
  if (sendData) {
    const data = new FormData(form);
    postData(data);
  }
});

const postData = async (data) => {
  const send = await fetch("php/validar.php", {
    method: "POST",
    body: data,
  });
  const response = await send.json();
  console.log(response);
};
