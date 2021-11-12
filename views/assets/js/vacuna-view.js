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

$(function () {
  // console.log("works");
  const idV = $('#idV').val();
  const idU = $('#idU').val();
  readRegister(idV, idU)

  $('#form-vaccine').submit(function (e) {
    e.preventDefault();
    const postData = {
      fecha: $('#fecha').val(),
      id_vacuna: $('#id_vacuna').val(),
      id_usuario: $('#id_usuario').val()
    };


    // console.log(postData);

    // DATA SENT
    const url = '../controllers/register/RegisterController-create.php';
    $.post(url, postData, function (response) {
      console.log(response);

      $('#form-vaccine').trigger('reset');
      readRegister(idV, idU);

    });


  });

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
        registers.forEach(register => {
          template += `
          <div class="vaccine__card">
          <form action="#" class="vaccine__card-form">
            <div class="vaccine__card-content">
              <div class="list__button-click">
                <p>1° Dosis</p>
                <label for="fecha">Fecha de Dosis:
                  <input type="date" name="fecha" class="vaccine__date" placeholder="dd/mm/yyyy" value="${register.fecha}">
                </label>
                <img src="./assets/img/chevron-forward.svg" alt="" class="list__arrow">
              </div>
              <div class="vaccine__card-dropdown">
                <button type="" class="vaccine__card-button">
                  <ion-icon name="bookmark"></ion-icon>Guardar
                </button>
                <button type="" class="vaccine__card-button">
                  <ion-icon name="trash"></ion-icon>Eliminar
                </button>
              </div>
            </div>
          </form>
        </div>
            `
        });

        $('#section__registerVaccine').html(template);

      }
    })

  }

});

