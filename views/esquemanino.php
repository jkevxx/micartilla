<?php
$menu = "";

include './header/header-dashboard.php';
// require_once '../models/VaccineModel-consult.php';
// $consultVaccine = new VaccineModel();
// $vaccines = $consultVaccine->readVaccine();

?>


<section class="schemaKid">
  <table class="schemaKid__table">
    <thead>
      <tr>
        <th colspan="12" class="schemaKid__table-title">
          <h2> Esquema de Vacunación Niños menores de 7 años</h2>
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td rowspan="2" class="schemaKid__table-titleRow">Vacunas</td>
        <td colspan="9" class="schemaKid__table-titleMonth">Meses</td>
        <td colspan="2" class="schemaKid__table-titleYear">Años</td>
      </tr>
      <tr>
        <td>0</td>
        <td>2</td>
        <td>4</td>
        <td>6</td>
        <td>7</td>
        <td>9</td>
        <td>12</td>
        <td>15</td>
        <td>18</td>
        <td>2</td>
        <td>4-6</td>
      </tr>
      <tr>
        <td class="schemaKid__table-vaccine">Tuberculosis (BCG)</td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
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
        <td class="schemaKid__table-vaccine">Hepatitis B (HepB)</td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
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
        <td class="schemaKid__table-vaccine">Poliomielitis (SABIN)</td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
      </tr>

      <tr>
        <td class="schemaKid__table-vaccine">Difteria (DTPa)</td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
      </tr>
      <tr>
        <td class="schemaKid__table-vaccine">Rotavirus (RV)</td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
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
        <td class="schemaKid__table-vaccine">Neumococo Conjugada</td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaKid__table-vaccine">Virus de Influenza</td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class="schemaKid__table-vaccine">Sarampión Rubéola (SRP)</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-secondary"></div>
        </td>
      </tr>
      <tr>
        <td class="schemaKid__table-vaccine">Tifoidea</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
          <div class="schemaKid__table__vaccine-item item-primary"></div>
        </td>
      </tr>
    </tbody>
  </table>
</section>
<?php

include './footer/footer-dashboard.php';

?>