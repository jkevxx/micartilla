<?php
$menu = "";

include './header/header-dashboard.php';
// require_once '../models/VaccineModel-consult.php';
// $consultVaccine = new VaccineModel();
// $vaccines = $consultVaccine->readVaccine();

?>


<section class="schemaOlderAdult">
  <table class="schemaOlderAdult__table">
    <thead>
      <tr>
        <th colspan="12" class="schemaOlderAdult__table-title">
          <h2> Esquema de Vacunación Adultos Mayores de 60 años</h2>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td rowspan="1"></td>
        <td colspan="9" class="schemaOlderAdult__table-subtitle">Intervalo de Vacunación</td>
      </tr>
      <tr>
        <td rowspan="1" class="schemaOlderAdult__table-titleRow">Vacunas</td>
        <td></td>
        <td colspan="3" class="schemaOlderAdult__table-titleMonth">Meses</td>
        <td colspan="4" class="schemaOlderAdult__table-titleYear">Años</td>
        <td colspan="1">

        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <div class="schemaOlderAdult__table__first">
            1ra Dosis
          </div>
        </td>
        <td>1</td>
        <td>2</td>
        <td>6</td>
        <td>1</td>
        <td>3</td>
        <td>5</td>
        <td>10</td>
        <td>
          <div class="schemaOlderAdult__table-titleAnual">
            Anual
          </div>
        </td>
        <!-- <td>2</td> -->
      </tr>
      <tr>
        <td class="schemaOlderAdult__table-vaccine">Neumococo Conjugada</td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td class="schemaOlderAdult__table-vaccine">Influenza</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-secondary"></div>
        </td>
      </tr>
      <tr>
        <td class="schemaOlderAdult__table-vaccine">Herpes Zoster</td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaOlderAdult__table-vaccine">Sarampión Rubéola Parotiditis (SRP)</td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaOlderAdult__table-vaccine">Varicela</td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-secondary"></div>
        </td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaOlderAdult__table-vaccine">Hepatitis A (HepA)</td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaOlderAdult__table-vaccine">Hepatitis B (HepB)</td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-secondary"></div>
        </td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>


      <tr>
        <td class="schemaOlderAdult__table-vaccine">Meningococo</td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaOlderAdult__table-vaccine">Tifoidea</td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

      <tr>
        <td class="schemaOlderAdult__table-vaccine">Fiebre Amarilla</td>
        <td>
          <div class="schemaOlderAdult__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>

    </tbody>
  </table>
</section>
<?php

include './footer/footer-dashboard.php';

?>