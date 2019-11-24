<?php
// TODO: pagina del formulario donde se veran los datos del jugador o bien desde donde se podran rellenar los campos para uno nuevo
require_once 'Utilidades.php';
require_once 'GestionEquipos.php';
//  echo "Hola mundo";
$gestionarEquipos = new GestionEquipos();
if ( $_SERVER["REQUEST_METHOD"] == "POST") {
          echo "Has pulsado añadir equipo";
          echo '<fieldset>';
          echo '<legend>Formulario</legend>';
          echo '<form action="operaciones.php" method="post">';
          echo '<label for="name" >Nombre: </label>';
          echo '<input type="text" name="txtNombreEquipo" value=""/>';
          echo '<br>';
          echo '<button type="submit" name="addEquipo">Enviar</button>';

          echo '';
          echo '</form>';
          echo '</fieldset>';




}else{

  echo "No entra";
}




 ?>
