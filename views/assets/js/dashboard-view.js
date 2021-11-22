$(function () {
  // console.log("Works");
  let empty = '';
  readVaccine(empty);


  $('#search').keyup(function () {
    let search = $('#search').val();
    if ($('#search').val()) {
      readVaccine(search);
    } else {
      // search = '';
      readVaccine(empty);

    }
  })

  function readVaccine(search) {
    let path = '../controllers/vaccine/VaccineController-consult.php';
    $.ajax({
      url: path,
      type: 'POST',
      data: { search },
      success: function (response) {
        let vaccines = JSON.parse(response);
        // console.log(vaccines);
        let template = '';
        vaccines.forEach(vaccine => {
          template += `
            <div class="card">
              <div class="card__body">
                <h3 class="card-title">${vaccine.Nvacuna}</h3>
                <div class="card-content">
                <p class="card-content-question">
                  ¿Qué es lo que provoca no vacunarse contra ${vaccine.Nvacuna}?
                  </p>
                  ${vaccine.sintomas}
                </div>
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

