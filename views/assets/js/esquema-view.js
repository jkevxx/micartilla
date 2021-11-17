$(function () {
  // console.log("Works");
  const empty = '';

  let idUsuario = $('#idUsuario').val();
  readVaccine(empty, idUsuario);
  // console.log(idUsuario);

  $('#search').keyup(function () {
    let search = $('#search').val();
    if ($('#search').val()) {
      readVaccine(search, idUsuario);
    } else {
      // search = '';
      readVaccine(empty, idUsuario);

    }
  })

  function readVaccine(search, idUsuario) {
    let path = '../controllers/vaccine/VaccineController-consultxUser.php';
    $.ajax({
      url: path,
      type: 'POST',
      data: { search, idUsuario },
      success: function (response) {
        let vaccines = JSON.parse(response);
        // console.log(vaccines);
        let template = '';
        vaccines.forEach(vaccine => {
          template += `
            <div class="card">
              <div class="card__body">
                <h3 class="card-title">${vaccine.Nvacuna}</h3>
                <p class="card-content">${vaccine.sintomas}</p>
              </div>
              <a href="./vacuna.php?id=${vaccine.idVacuna}" class="card-button">
                <ion-icon name="add-circle"></ion-icon>Añadir
              </a>
            </div>
            `
        });

        $('#cards').html(template);

      }
    })
  }

});

