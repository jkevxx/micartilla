const formulario = document.getElementById('form__settings');
const inputs = document.querySelectorAll('#form__settings input');
const btnSent = document.getElementById("form__settings-btn");
let respuesta = document.querySelector('.respuesta');

const inputNewPassword = document.getElementById("newPassword");
const inputOldPassword = document.getElementById("oldPassword");

const expresiones = {
  password: /^.{4,12}$/ // 4 a 12 digitos.
}

const campos = {
  oldPassword: false,
  newPassword: false
}

validarInputs();

function validarInputs() {
  if (inputNewPassword.value == "" || inputOldPassword.value == "") {

    btnSent.disabled = true;
    // console.log("im inside");
  } else {
    btnSent.disabled = false;
  }

}


const validarFormulario = (e) => {
  switch (e.target.name) {// Trae el name de los inputs
    case "oldPassword":
      validarCampo(expresiones.password, e.target, 'oldPassword');
      // console.log(e.target); accede al input y con .value accede al valor del input
      validarInputs();
      break;
    case "newPassword":
      validarCampo(expresiones.password, e.target, 'newPassword');
      validarInputs();
      break;

    default:

      break;
  }
}

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {// Valida la expresión regular

    document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
    campos[campo] = true;
    // btnSent.disabled = true;
  } else {
    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    campos[campo] = false;
    // btnSent.disabled = false;
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
  const http = new XMLHttpRequest();
  const formData = new FormData(formulario);
  const url = '../controllers/login/LoginController-update.php';
  http.open('POST', url, true);

  // console.log(campos.sexo);
  if (campos.oldPassword || campos.newPassword) {
    http.addEventListener('load', e => {
      if (e.target.readyState == 4 && e.target.status == 200) {
        if (e.target.response == 'ok') {
          // document.location.href = './perfil.php';
          // console.log(formData);
          formulario.reset();
          document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
          setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
          }, 2000);
        } else {
          // console.log(e.target.response);
          respuesta.innerHTML = e.target.response;
          setTimeout(() => {
            respuesta.innerHTML = '';
          }, 6000);
        }
      }
    });

    http.send(formData);// Envio del formulario


  }
  else {
    // document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    console.log("problemas");
  }
});