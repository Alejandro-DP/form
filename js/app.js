var nombre  = document.getElementById('nombre');
var correo = document.getElementById('Email');
var movie = document.getElementById('Movie');
var error = document.getElementById('error');
error.style.color = 'red';


var form = document.getElementById('formulario');
form.addEventListener('submit', function(evt){
    evt.preventDefault();
    var message = [];
    if (nombre.value == null || nombre.value == ''){
        message.push('ingresa tu nombre');
    }
    if (correo.value == null || correo.value == ''){
        message.push('ingresa tu correo');
    }
    if (movie.value == null || movie.value == ''){
        message.push('ingresa tu pelicula ');
    }
    error.innerHTML= message.join(',  ');
    console.log("enviando . . ");
})