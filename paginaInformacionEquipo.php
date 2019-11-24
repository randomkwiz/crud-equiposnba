<?php
require_once 'Utilidades.php';
require_once 'GestionEquipos.php';
// se comprueba si se ha enviado bien por el metodo indicado
if ( $_SERVER["REQUEST_METHOD"] == "POST") {

  //echo "Entra";

  // se recogen los datos a partir del atributo name del html

  $idEquipo = $_POST['idEquipo'];
  $gestionarEquipos = new GestionEquipos();
  echo '<h3>Información del equipo: ';
  echo $gestionarEquipos->getNombreEquipoPorID($idEquipo);
  echo '</h3>';
  echo '<form action="formDetallesJugador.php" method="post">';
  echo '<input type="hidden" name="btnAdd" value="';
  echo "Add";
  echo '">' ;
  echo '</input>';
  echo '<input type="submit" name="addButton" value="';
  echo 'Añadir jugador';
  // TODO: Estaria guay que al darle a añadir pillara el equipo en el que estabas y lo pusiera como selected en el desplegable
  echo '"  >' ;
  echo '</input>';
  echo '</form>';
  Utilidades::pintarTablaJugadoresDeUnEquipo($idEquipo);

}else{

  echo "No entra";
}


?>
