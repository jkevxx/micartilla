// VALIDACIÓN DE FORMULARIO
const formulario = document.getElementById('form-perfil');
const inputs = document.querySelectorAll('#form-perfil input');



const expresiones = {
  nombre: /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/, // Letras, numeros, guion y guion_bajo
  // fecha: /^(0[1-9]|[1-2]\d|3[01])(\/)(0[1-9]|1[012])\2(\d{4})$/
  fecha: /^(?:(?:(?:0?[1-9]|1\d|2[0-8])[/](?:0?[1-9]|1[0-2])|(?:29|30)[/](?:0?[13-9]|1[0-2])|31[/](?:0?[13578]|1[02]))[/](?:0{2,3}[1-9]|0{1,2}[1-9]\d|0?[1-9]\d{4}|[1-9]\d{3})|29[/]0?2[/](?:\d{1,2}(?:0[48]|[2468][048]|[13579][26])|(?:0?[48]|[13579][26]|[2468][048])00))$/
}

const campos = {
  nombre: false,
  apellido: false,
  fecha: false
}

// function validarInput() {
//   let nombre = document.getElementById('name').value;
//   let apellido = document.getElementById('apellido').value;
//   let sexo = document.getElementById('sexo').value;
//   let fecha = document.getElementById('fecha').value;

//   if (nombre.length == 0 && apellido.length == 0 && fecha.length == 0) {
//     campos[nombre] = false;
//     campos[apellido] = false;
//     campos[fecha] = false;
//   } else {
//     campos[nombre] = true;
//     campos[apellido] = true;
//     campos[fecha] = true;
//   }
// }

const validarFormulario = (e) => {
  switch (e.target.name) {// Trae el name de los inputs
    case "nombre":
      validarCampo(expresiones.nombre, e.target, 'nombre');
      // console.log(e.target); accede al input y con .value accede al valor del input
      break;
    case "apellido":
      validarCampo(expresiones.nombre, e.target, 'apellido');
      break;
    case "fecha":
      validarCampoFecha(expresiones.fecha, e.target, 'fecha');
      break;

    default:

      break;
  }
}

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {// Valida la expresión regular

    document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
    // document.getElementById('formulario__mensaje-fecha').classList.remove('formulario__mensaje-fecha-activo');
    campos[campo] = true;
  } else {
    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    // document.getElementById('formulario__mensaje-fecha').classList.add('formulario__mensaje-fecha-activo');
    campos[campo] = false;
  }
}

const validarCampoFecha = (expresion, input, campo) => {
  // console.log(input.value);
  if (expresion.test(input.value) && validacionCumple(input.value)) {// 
    document.getElementById('formulario__mensaje-fecha').classList.remove('formulario__mensaje-fecha-activo');
    campos[campo] = true;
  } else {
    document.getElementById('formulario__mensaje-fecha').classList.add('formulario__mensaje-fecha-activo');
    campos[campo] = false;
  }
}

function validacionCumple(cumple) {
  const fecha = new Date();
  let hoyActual = fecha.getDate();
  let mesActual = fecha.getMonth() + 1;
  let anioActual = fecha.getFullYear();

  let cumpleArray = cumple.split("/");
  let day = cumpleArray[0];
  let month = cumpleArray[1];
  let year = cumpleArray[2];

  if (month == mesActual && year <= anioActual && day > hoyActual) {
    // console.log("error");
    return false;
  } else if (year > anioActual) {
    // console.log("error anio");
    return false;
  } else if (month < mesActual || year <= anioActual) {
    // console.log("ok");
    return true;
  } else if (month == mesActual && year <= anioActual && day <= hoyActual) {
    // console.log("yes");
    return true;
  }
}

inputs.forEach((input) => {
  input.addEventListener('keyup', validarFormulario);
  input.addEventListener('blur', validarFormulario);
});

// Envio de datos
formulario.addEventListener('submit', (e) => {
  e.preventDefault();// Evita que se envie el form
  // const terminos = document.getElementById('checkbox');
  // validarInput();
  const http = new XMLHttpRequest();
  const formData = new FormData(formulario);
  const url = '../controllers/users/UserController-update.php';
  http.open('POST', url, true);
  // http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// Codifica los datos que son enviados al servidor desde el navegador

  http.addEventListener('load', e => {
    if (e.target.readyState == 4 && e.target.status == 200) {
      if (e.target.response == 'ok') {
        // document.location.href = './perfil.php';
        // console.log(form);
      } else {
        console.log(e.target.response);
        // respuesta.innerHTML = e.target.response;
      }
    }
  });

  http.send(formData);// Envio del formulario

  document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
  setTimeout(() => {
    document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
  }, 2000);

  // if (campos.nombre || campos.apellido) {
  // }
  // else {
  //   // document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
  //   console.log("problemas");
  // }
});