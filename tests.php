<?php

require_once "Database.php";
require_once "tablaEquipos.php";
require_once "tablaJugadores.php";
require_once "GestionEquipos.php";

$gestionarEquipos = new GestionEquipos();

//echo $gestionarEquipos->getNombreEquipoPorID("123") . "<br>";

//echo " <br> Aqui termina 1 <br>";

//echo $gestionarEquipos->getNombreEquipoPorID("23332843-ecef-11e9-ac83-02c036b03311") . "<br>";
//echo " <br> Aqui termina 2 <br>";

//echo count($gestionarEquipos->getListadoEquipos());
//echo "///////////";
/*
for ($i = 0; $i < count($gestionarEquipos->getListadoEquipos()); $i++) {
  echo "Elemento $i <br>";
    echo $gestionarEquipos->getListadoEquipos()[$i]["id"] . "<br>";
    echo $gestionarEquipos->getListadoEquipos()[$i]["nombre"] . "<br>";

}
*/
/*
for ($i = 0; $i < count($gestionarEquipos->getDatosJugadoresEquipo('23332843-ecef-11e9-ac83-02c036b03311')); $i++) {
  echo "Jugador $i <br>";
    echo "ID: <br>";
    echo $gestionarEquipos->getDatosJugadoresEquipo('23332843-ecef-11e9-ac83-02c036b03311')[$i]["id"] . "<br>";
    echo "Nombre: <br>";
    echo $gestionarEquipos->getDatosJugadoresEquipo('23332843-ecef-11e9-ac83-02c036b03311')[$i]["nombre"] . "<br>";

}
*/

//$gestionarEquipos->eliminarEquipo("23332843-ecef-11e9-ac83-02c036b03311");    //Ya testeado. Funciona: elimina el equipo y a su vez se eliminan los jugadores del equipo.
//no lo ejecutes mas

//$gestionarEquipos->addEquipo("EquipoESTOVAAFUNCIONAR");


//$gestionarEquipos->addJugador("Angela", "Vazquez Dominguez", "22", "./img/micara.jpg","13544917-ed2e-11e9-ac83-02c036b03311" ); //funsiona :D


//$gestionarEquipos->updateJugadorCompleto("2b908b52-ed2f-11e9-ac83-02c036b03311", "AngelaCambiado", "VazquezCambiado", "170", "./img/fotoCambiada.jpg","2337a9a5-ecef-11e9-ac83-02c036b03311" );
