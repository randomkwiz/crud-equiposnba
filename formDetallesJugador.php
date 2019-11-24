<?php
// TODO: pagina del formulario donde se veran los datos del jugador o bien desde donde se podran rellenar los campos para uno nuevo
require_once 'Utilidades.php';
require_once 'GestionEquipos.php';
//  echo "Hola mundo";
$gestionarEquipos = new GestionEquipos();
if ( $_SERVER["REQUEST_METHOD"] == "POST") {

  // se recogen los datos a partir del atributo name del html
  if (isset($_POST['btnAdd'])) {
          echo "Has pulsado Add";
          echo '<fieldset>';
          echo '<legend>Formulario</legend>';
          echo '<form action="operaciones.php" method="post">';
          echo '<label for="name" >Nombre: </label>';
          echo '<input type="text" name="txtNombre" value=""/>';
          echo '<br>';
          echo '<label for="surname" >Apellidos: </label>';
          echo '<input type="text" name="txtApellidos" value=""/>';
          echo '';
          echo '';
          echo '<br>';
          echo '<label for="age" >Edad: </label>';
          echo '<input type="text" name="txtEdad" value=""/>';
          echo '<br>';
          echo '<label for="foto" >Foto: </label>';
          echo '<input type="text" name="txtFoto" value=""/>';
          echo '';
          echo '<br>';
          echo '<label for="team" >Equipo: </label>';
          echo '<select  name="team">';
          Utilidades::generarOptionEquipos();
          echo '</select>';
          echo '';
          echo '';
          echo '<br>';
          echo '<input type="hidden" name="addJugadorNuevo" value="';
          echo "Añadir";
          echo '"  >' ;
          echo '<button type="submit" name="button">Enviar</button>';




          echo '';
          echo '</form>';
          echo '</fieldset>';



      } else if (isset($_POST['btnEdit'])){
        //hay que mostrar los datos del jugador
          $idJugador = $_POST['btnEdit'];

          //echo $idJugador ;
          echo "<br>Has pulsado Edit";
          echo '<fieldset>';
          echo '<legend>Formulario</legend>';
          echo '<form action="operaciones.php" method="post">';
          echo '<label for="name" >Nombre: </label>';
          echo '<input type="text" name="txtNombre" value="';
          echo $gestionarEquipos->obtenerDatosJugador($idJugador)["nombre"];
          echo '"/>';
          echo '<br>';
          echo '<label for="surname" >Apellidos: </label>';

          echo '<input type="text" name="txtApellidos" value="';
          echo $gestionarEquipos->obtenerDatosJugador($idJugador)["apellidos"];
          echo '"/>';
          echo '';
          echo '';
          echo '<br>';
          echo '<label for="age" >Edad: </label>';

          echo '<input type="text" name="txtEdad" value="';
          echo $gestionarEquipos->obtenerDatosJugador($idJugador)["edad"];
          echo '"/>';
          echo '<br>';
          echo '<label for="foto" >Foto: </label>';

          echo '<input type="text" name="txtFoto" value="';
          echo $gestionarEquipos->obtenerDatosJugador($idJugador)["foto"];
          echo '"/>';
          echo '';
          echo '<br>';
          echo '<label for="team" >Equipo: </label>';
          echo '<select  name="team">';
          Utilidades::generarOptionEquiposConEquipoDefinido($idJugador);
          echo '</select>';
          echo '';
          echo '';
          echo '<br>';
          echo '<input type="hidden" name="editJugador" value="';
          echo $idJugador;
          echo '"  >' ;
          echo '<button type="submit" name="button">Enviar</button>';
          echo '';
          echo '</form>';
          echo '</fieldset>';

      }
}else{

  echo "No entra";
}




 ?>
