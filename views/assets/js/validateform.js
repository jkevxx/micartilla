const formulario = document.getElementById('form');
const inputs = document.querySelectorAll('#form input');
let respuesta = document.querySelector('.respuesta');

const expresiones = {
  usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  password: /^.{4,12}$/ // 4 a 12 digitos.
}

const campos = {
  user: false,
  email: false,
  password: false
}

const validarFormulario = (e) => {
  switch (e.target.name) {// Trae el name de los inputs
    case "user":
      validarCampo(expresiones.usuario, e.target, 'user');
      // console.log(e.target); accede al input y con .value accede al valor del input
      break;
    case "email":
      validarCampo(expresiones.correo, e.target, 'email');
      break;
    case "password":
      validarCampo(expresiones.password, e.target, 'password');
      break;

    default:

      break;
  }
}

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {// Valida la expresión regular
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
    document.getElementById(`grupo__${campo}`).classList.remove('form__div-incorrecto');
    campos[campo] = true;

  } else {
    document.getElementById(`grupo__${campo}`).classList.add('form__div-incorrecto');
    document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
    campos[campo] = false;
  }
}

inputs.forEach((input) => {
  input.addEventListener('keyup', validarFormulario);
  input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
  e.preventDefault();// Evita que se envie el form
  const terminos = document.getElementById('checkbox');
  const http = new XMLHttpRequest();
  const formData = new FormData(form);
  const url = '../controllers/login/createLogin.php';
  http.open('POST', url, true);
  // http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// Codifica los datos que son enviados al servidor desde el navegador

  if (campos.user && campos.email && campos.password && terminos.checked) {

    // http.onreadystatechange = function () {
    //   if (http.readyState === 4 && http.status === 200) {
    //     // console.log(http.responseText);
    //     document.location.href = './dashboard.php';

    //   } else if (http.status === 404) {
    //     console.log("error");
    //   }
    // }
    http.addEventListener('load', e => {
      if (e.target.readyState == 4 && e.target.status == 200) {
        if (e.target.response == 'ok') {
          document.location.href = './usuario.php';
        } else {
          // console.log(e.target.response);
          respuesta.innerHTML = e.target.response;
        }
      }
    });

    http.send(formData);// Envio del formulario
  } else {
    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
  }
});