let listElements = document.querySelectorAll('.list__button-click');

listElements.forEach(listElement => {
  listElement.addEventListener('click', () => {
    listElement.classList.toggle('arrow');
    let height = 0;
    let menu = listElement.nextElementSibling;
    // console.log(menu);
    console.log(menu.scrollHeight);

    if (menu.clientHeight == "0") {
      // height += 20;
      height = menu.scrollHeight;

    }
    // height += 20;
    menu.style.height = `${height}px`;
  })
});


// Efecto POPUP

let btnAbrirPopup = document.getElementById('btn-abrir-popup'),
  overlay = document.getElementById('overlay'),
  popup = document.getElementById('popup'),
  btnCerrarPopup = document.getElementById('btn-cerrar-popup');

btnAbrirPopup.addEventListener('click', function () {
  overlay.classList.add('active');
  popup.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function (e) {
  e.preventDefault();
  overlay.classList.remove('active');
  popup.classList.remove('active');
});

// CREATE REGISTER
const formulario = document.getElementById('form-vaccine');

formulario.addEventListener('submit', (e) => {
  e.preventDefault();// Evita que se envie el form

  const http = new XMLHttpRequest();
  const formData = new FormData(formulario);
  const url = '../controllers/vaccine/VaccineController-create.php';
  http.open('POST', url, true);
  // http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");// Codifica los datos que son enviados al servidor desde el navegador

  http.addEventListener('load', e => {
    if (e.target.readyState == 4 && e.target.status == 200) {
      if (e.target.response == 'ok') {
        // document.location.href = './vacuna.php';
        // console.log(form);
      } else {
        console.log(e.target.response);
        // respuesta.innerHTML = e.target.response;
      }
    }
  });

  http.send(formData);// Envio del formulario

});