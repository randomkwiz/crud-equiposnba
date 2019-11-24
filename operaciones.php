<?php
require_once 'Utilidades.php';
require_once 'GestionEquipos.php';
//  echo "Hola mundo";
$gestionarEquipos = new GestionEquipos();

if ( $_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['deleteJugador'])) {
      //ha pulsado eliminar jugador
      $idJugador = $_POST['deleteJugador'];
      $gestionarEquipos->eliminarJugador($idJugador);
      echo "<br>Has eliminado al jugador<br>";
      echo '<form action="/index.php" method="post" >';
      echo '<button type="submit" value="Home">Inicio</button>';
      echo '</form>';
      echo '';

    }else if (isset($_POST['addJugadorNuevo'])) {
      //ha pulsado añadir un nuevo jugador
      $nombre = $_POST['txtNombre'];
      $apellidos = $_POST['txtApellidos'];
      $edad = $_POST['txtEdad'];
      $foto = $_POST['txtFoto'];
      $equipo = $_POST['team'];
      $gestionarEquipos->addJugador($nombre, $apellidos, $edad, $foto,$equipo);
      echo "<br>Has añadido al jugador <br>";
      echo '<form action="/index.php" method="post" >';
      echo '<button type="submit" value="Home">Inicio</button>';
      echo '</form>';
      echo '';

    }else if (isset($_POST['editJugador'])){
      $idJugadorAModificar = $_POST['editJugador'];
      $nombre = $_POST['txtNombre'];
      $apellidos = $_POST['txtApellidos'];
      $edad = $_POST['txtEdad'];
      $foto = $_POST['txtFoto'];
      $equipo = $_POST['team'];
      $gestionarEquipos->updateJugadorCompleto($idJugadorAModificar,$nombre, $apellidos, $edad, $foto,$equipo);
      echo "<br>Has modificado al jugador<br>";
      echo '<form action="/index.php" method="post" >';
      echo '<button type="submit" value="Home">Inicio</button>';
      echo '</form>';
      echo '';

    } else if(isset($_POST['addEquipo'])){
      $nombreEquipoNuevo = $_POST['txtNombreEquipo'];
      $gestionarEquipos->addEquipo($nombreEquipoNuevo);
      echo "<br>Has añadido un nuevo equipo<br>";
      echo '<form action="/index.php" method="post" >';
      echo '<button type="submit" value="Home">Inicio</button>';
      echo '</form>';
      echo '';
    }




// TODO: hacer que no se abra una pestaña nueva al darle a eliminar. Hacer que se actualice la pagina sola.
}else{

  echo "No entra";
}


 ?>
