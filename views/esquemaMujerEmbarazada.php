<?php
$menu = "";

include './header/header-dashboard.php';
// require_once '../models/VaccineModel-consult.php';
// $consultVaccine = new VaccineModel();
// $vaccines = $consultVaccine->readVaccine();

?>


<section class="schemaPregnantWoman">
  <table class="schemaPregnantWoman__table">
    <thead>
      <tr>
        <th colspan="12" class="schemaPregnantWoman__table-title">
          <h2> Esquema de Vacunación Mujeres Embarazadas</h2>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td rowspan="" class="schemaPregnantWoman__table-titleRow">Vacunas</td>
        <td colspan="" class="schemaPregnantWoman__table-titleMonth">Recomendada</td>
        <td colspan="" class="schemaPregnantWoman__table-titleYear">Contraindicada</td>
        <td colspan="" class="schemaPregnantWoman__table-titleYear">Condición Especial</td>

        </td>
      </tr>
      <tr>
        <td class="schemaPregnantWoman__table-vaccine">Neumococo Conjugada</td>
        <td>
          <div class="schemaPregnantWoman__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaPregnantWoman__table-vaccine">Influenza</td>
        <td>
          <div class="schemaPregnantWoman__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaPregnantWoman__table-vaccine">Hepatitis B (HepB)</td>
        <td>
          <div class="schemaPregnantWoman__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaPregnantWoman__table-vaccine">Hepatitis A (HepA)</td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaPregnantWoman__table__vaccine-item item-secondary"></div>
        </td>
      </tr>
      <tr>
        <td class="schemaPregnantWoman__table-vaccine">Sarampión Rubéola Parotiditis (SRP)</td>
        <td></td>
        <td>
          <div class="schemaPregnantWoman__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaPregnantWoman__table-vaccine">Varicela</td>
        <td></td>
        <td>
          <div class="schemaPregnantWoman__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaPregnantWoman__table-vaccine">Neumococo</td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaPregnantWoman__table__vaccine-item item-primary"></div>
        </td>
      </tr>
      <tr>
        <td class="schemaPregnantWoman__table-vaccine">Meningococo</td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaPregnantWoman__table__vaccine-item item-secondary"></div>
        </td>
      </tr>

    </tbody>
  </table>
</section>
<?php

include './footer/footer-dashboard.php';

?>