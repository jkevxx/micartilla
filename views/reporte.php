<?php
session_start();
// Valida si existe la sesión de usuario
if (empty($_SESSION['user'])) {
    header("Location: ../index.php");
}

ob_start();

require_once '../models/UserModel-consult.php';
require_once '../models/VaccineModel-consult.php';

$idUsuario = $_SESSION['idUsuario'];

$consultar = new UserModel();
$usuarios = $consultar->readUser($idUsuario);

$consultNameV = new VaccineModel();
$consult = new VaccineModel();

$nameVaccines = $consultNameV->consultVaccineName($idUsuario);
$registers = $consult->consultVaccineRegister($idUsuario);
if (empty($nameVaccines) && empty($registers)) {
    header("Location: ./esquema.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/views/assets/css/reporte-styles.css">
  <title>Reportes</title>
</head>

<body>
  <main class="report__container">


    <table class="table__report">
      <thead>
        <tr>
          <th colspan="2">
            <?php foreach ($usuarios as $user) {?>

            <h2 class="table__report-title"> Reporte de Vacunación de
              <?php echo $user['nombre'] . " " . $user['apellidos'] ?>
            </h2>
            <?php }?>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <p class="table__report-tableTitle"> Nombre de la Vacuna</p>
          </td>
          <td>
            <p class="table__report-tableTitle"> Fechas de Dosis</p>
          </td>
        </tr>
        <?php foreach ($nameVaccines as $nameVaccine) {?>
        <tr>
          <td rowspan="1">
            <p class="table__report-vaccine"><?php echo $nameVaccine['Nvacuna'] ?></p>
          </td>
          <td>
            <?php $i = 1;foreach ($registers as $register) {
    if ($nameVaccine['idVacuna'] == $register['idVacuna']) {
        $date = $register['fecha'];
        $formatDate = explode('-', $date);
        $newFormatDate = $formatDate[2] . "-" . $formatDate[1] . "-" . $formatDate[0]
        ?>
            <p class="table__report-dose"><?php echo $i++ . "° Dosis: " . $newFormatDate ?></p>
            <?php }?>
            <?php }?>
          </td>
        </tr>
        <?php }?>

      </tbody>
    </table>
  </main>
</body>

</html>

<?php
$html = ob_get_clean();
// echo $html;

require_once '../library/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHTML($html);

$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream("esquema.pdf", array("Attachment" => false));

?>