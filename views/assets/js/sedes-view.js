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
    let path = '../controllers/sedes/SedesController-consult.php';
    $.ajax({
      url: path,
      type: 'POST',
      data: { search },
      success: function (response) {
        let sedes = JSON.parse(response);
        // console.log(sedes);
        let template = '';
        sedes.forEach(sede => {
          template += `
        <div class="sedes__card">
          <div class="sedes__card__body">
            <h4 class="sedes__card-title">${sede.Nsede}</h4>
            <div class="sedes__card__data">
              <p class="sedes__card-direction">
                ${sede.direccion}
              </p>
              <p class="sedes__card-phone">
                CP. ${sede.cp}
              </p>
              <p class="sedes__card-capital">
              Estado: ${sede.Ncapital}
              </p>
              <p class="sedes__card-cp">
                Teléfono: ${sede.telefono}
              </p>
            </div>
          </div>
        </div>
            `
        });

        $('#sedes').html(template);

      }
    })
  }

});

