// Efecto POPUP
let btnAbrirPopup = document.getElementById('btn-abrir-popup'),
  overlay = document.getElementById('overlay'),
  popup = document.getElementById('popup'),
  btnCerrarPopup = document.getElementById('btn-cerrar-popup');

let inputDate = document.getElementById('fechaActual');
let titleVaccine = document.getElementById('title-vaccine');
let btnText = document.getElementById('btn__option-text');
// let inputFecha = document.getElementById('fechaNueva');

// inputFecha.disabled = true;

btnAbrirPopup.addEventListener('click', function () {
  titleVaccine.innerHTML = "Selecciona la fecha de tu dosis";
  btnText.innerHTML = "Añadir";
  overlay.classList.add('active');
  popup.classList.add('active');
  inputDate.value = '';

});

btnCerrarPopup.addEventListener('click', function (e) {
  e.preventDefault();
  overlay.classList.remove('active');
  popup.classList.remove('active');
  inputDate.value = '';
});


// CREATE REGISTER

$(function () {
  // console.log("works");
  let edit = false;
  const idV = $('#idV').val();
  const idU = $('#idU').val();
  readRegister(idV, idU);

  $('#form-vaccine').submit(function (e) {
    e.preventDefault();
    const postData = {
      fecha: $('#fechaActual').val(),
      id_vacuna: $('#id_vacuna').val(),
      id_usuario: $('#id_usuario').val(),
      idRegister: $('#idRegister').val()
    };

    // PATH TO SENT INFO
    let urlCreate = '../controllers/register/RegisterController-create.php';
    let urlEdit = '../controllers/register/RegisterController-update.php';

    let url = edit === false ? urlCreate : urlEdit;

    if (url) {
      $('#formulario__mensaje-exito').addClass('formulario__mensaje-exito-activo'); setTimeout(() => {
        $('#formulario__mensaje-exito').removeClass('formulario__mensaje-exito-activo');
      }, 2000);
    }
    // DATA SENT
    $.post(url, postData, function (response) {
      // console.log(response);

      $('#form-vaccine').trigger('reset');
      readRegister(idV, idU);

    });


  });// Button Submit

  function readRegister(idV, idU) {
    let path = '../controllers/register/RegisterController-consult.php';
    $.ajax({
      url: path,
      type: 'POST',
      data: { idV, idU },
      success: function (response) {
        let registers = JSON.parse(response);
        // console.log(registers);
        let template = '';
        let cont = 1;
        registers.forEach(register => {
          template += `
          <div class="vaccine__card">
          <div class="vaccine__card-form">
            <div class="vaccine__card-content">
              <div class="list__button-click" idRegistro="${register.idRegistro}" >
                <p>${cont++}° Dosis</p>
                <label for="fecha" class="section__input">Fecha de Dosis:
                  <input type="date" id="fechaNueva" name="fecha" class="vaccine__date" placeholder="dd/mm/yyyy" value="${register.fecha}" disabled>
                </label>
                <div class="vaccine__card-options">
                  <button id="btn-abrir-popup" class="vaccine__card-button btn-update">
                    <ion-icon name="bookmark"></ion-icon>
                  </button>
                  <button class="vaccine__card-button btn-delete">
                    <ion-icon name="trash"></ion-icon>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
            `
        });

        $('#section__registerVaccine').html(template);

      }
    })

  }// readRegister

  // Add classes
  $(document).on('click', '#btn-abrir-popup', function () {
    // console.log("update");
    $("#overlay").addClass('active');
    $("#popup").addClass('active');
    $(".btn__option-add").addClass('active');
    $(".btn__option-update").removeClass('active');
  });

  $(document).on('click', '#btn-cerrar-popup', function () {
    // console.log("update");
    $("#overlay").removeClass('active');
    $("#popup").removeClass('active');
  });


  //Button Delete and Update
  $(document).on('click', '.btn-delete', function () {
    if (confirm('Estas seguro de eliminar el registro')) {
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr('idRegistro');
      // console.log(id);
      let path = '../controllers/register/RegisterController-delete.php';
      $.post(path, { id }, function (response) {
        // console.log(response);
        readRegister(idV, idU);
      })// response of post
    }
  });// btn-delete

  $(document).on('click', '.btn-update', function () {
    $("#title-vaccine").text('Selecciona la nueva fecha');
    $("#btn__option-text").text('Actualizar');
    $(".btn__option-add").removeClass('active');
    $(".btn__option-update").addClass('active');

    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr('idRegistro');

    let path = '../controllers/register/RegisterController-single.php';

    $.post(path, { id }, function (response) {
      const register = JSON.parse(response);
      // console.log(register[0].fecha);
      $('#fechaActual').val(register[0].fecha);
      $('#idRegister').val(register[0].idRegistro);
      edit = true;
      // readRegister(idV, idU);


    });

  });// btn-update

});


