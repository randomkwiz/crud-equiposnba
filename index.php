<?php
  require_once 'Utilidades.php';
  require_once 'GestionEquipos.php';
//  echo "Hola mundo";
$gestionarEquipos = new GestionEquipos();

  echo '<h1>Equipos : </h1>';
  Utilidades::pintarTablaEquipos();
  echo '<form action="/addEquipoForm.php" method="post" >';
  echo '<button type="submit" value="addTeam">Añadir equipo</button>';
  echo '</form>';
  echo '';


  /*
  $gestionarEquipos->addJugador("Angela", "Vazquez Dominguez", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" );
  $gestionarEquipos->addJugador("Pepe", "Default", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" );
  $gestionarEquipos->addJugador("Pepe", "Default", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" );
  $gestionarEquipos->addJugador("Pepe", "Default", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" );
  $gestionarEquipos->addJugador("Pepe", "Default", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" );
  $gestionarEquipos->addJugador("Pepe", "Default", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" );
  $gestionarEquipos->addJugador("Pepe", "Default", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" );
  $gestionarEquipos->addJugador("Pepe", "Default", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" );
  $gestionarEquipos->addJugador("Pepe", "Default", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" );
*/
?>
