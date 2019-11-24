<?php
require_once "Database.php";
require_once "tablaEquipos.php";
require_once "tablaJugadores.php";

class GestionEquipos{


  /*
  Signatura: function getNumeroJugadoresEquipo($idEquipo)
  Comentario: función que dado el ID de un equipo devuelve el numero de
  jugadores que tiene.
  Precondiciones:
  Entradas: la entrada sera un string, el ID del equipo
  Salidas: Entero con la cantidad de jugadores que posee.
  Postcondiciones: Asociado al nombre devuelve un entero con la cantidad de jugadores que posee,
  o bien -1 si el ID introducido no
  perteneciera a ningún equipo.
  Llama a getDatosJugadoresEquipo($id_equipo)
  */
  function getNumeroJugadoresEquipo($idEquipo){
    $db = Database::getInstance();
    $mysqli = $db->getConnection() ;
    $cantidadJugadores = "";
    $sql_query = 'SELECT COUNT(*) as cantidad FROM Jugadores WHERE idEquipo = ' . " '" .$idEquipo . "'";

    //echo $sql_query . "<br>";

    $result = $mysqli->query($sql_query);

    //echo $result->num_rows .  "<br>" ;

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $cantidadJugadores = $row["cantidad"] ;
    }else{
      $cantidadJugadores = 0;
    }
    return $cantidadJugadores;

  }

  /*
  Signatura: function getNombreEquipoPorID($IDEquipo)
  Comentario: función que dado el ID de un equipo devuelve su nombre
  Precondiciones:
  Entradas: la entrada sera un string, el ID del equipo
  Salidas: Cadena con el nombre del equipos
  Postcondiciones: Asociado al nombre devuelve un string con el nombre del equipo,
  o bien con la cadena "Sin coincidencias" si el ID introducido no
  perteneciera a ningún equipo.
  */
  function getNombreEquipoPorID($IDEquipo){
    $db = Database::getInstance();
    $mysqli = $db->getConnection() ;
    $nombreEquipo = "";
    $sql_query = " SELECT " .\Constantes_DB\tablaEquipos::NOMBRE . "" .
    " FROM " . \Constantes_DB\tablaEquipos::TABLE_NAME .
    " WHERE ID = ". "'". $IDEquipo . "'";

    //          echo $sql_query . "<br>";


    $result = $mysqli->query($sql_query);

    //echo $result->num_rows .  "<br>" ;

    if ($result->num_rows > 0) {
      //echo "Entra en el if ";
      while($row = $result->fetch_assoc()) {
        $nombreEquipo = $row["NOMBRE"];
        //echo "Entra";
      }

    }else{
      $nombreEquipo = "Sin coincidencias";
    }
    return $nombreEquipo;

  }


  /*
  Signatura: function getListadoEquipos()
  Comentario: función que devuelve un array de arrays asociativos con todos los equipos
  de la base de datos (array) y de cada equipo, su ID y su nombre (array asociativo).
  Precondiciones:
  Entradas:
  Salidas: Esta función devuelve un array de arrays asociativos
  con los datos (id, nombre) de cada equipo que exista en la BBDD.
  Postcondiciones: Asociado al nombre devuelve un array de arrays asociativos.
  // TODO: creo que si no hay datos devueltos en la consulta, peta. Hay que arreglarlo pero no sé inicializar un array de arrays asociativos xd
  */
  function getListadoEquipos(){
    $db = Database::getInstance();
    $mysqli = $db->getConnection() ;

    $sql_query = " SELECT " .\Constantes_DB\tablaEquipos::ID . ", "
    .\Constantes_DB\tablaEquipos::NOMBRE . "" .
    " FROM " . \Constantes_DB\tablaEquipos::TABLE_NAME
    ;

    //          echo $sql_query . "<br>";


    $result = $mysqli->query($sql_query);

    //echo $result->num_rows .  "<br>" ;

    if ($result->num_rows > 0) {
      //echo "Entra en el if ";
      while($row = $result->fetch_assoc()){
        /* Recojo los datos en forma de array de arrays asociativo para tener ID y nombre de cada equipo*/
        $arrayDeArraysAssocEquipos[] = array("id"=>$row[\Constantes_DB\tablaEquipos::ID], "nombre"=>$row[\Constantes_DB\tablaEquipos::NOMBRE]);
      }


    }else{
      $arrayDeArraysAssocEquipos = 0;
    }
    return $arrayDeArraysAssocEquipos;

  }

  /*
  Signatura: function getDatosJugadoresEquipo($id_equipo)
  Comentario: función que devuelve un array de arrays asociativos con todos los jugadores de un equipo.
  Precondiciones:
  Entradas: ID del equipo del que quieres mirar los jugadores
  Salidas: Esta función devuelve un array de arrays asociativos
  con los datos (id, nombrem apellidos, edad, foto, id del equipo al que pertenece) de cada jugador que exista del equipo indicado en la BBDD.
  Postcondiciones: Asociado al nombre devuelve un array de arrays asociativos.
  // TODO: creo que si no hay datos devueltos en la consulta, peta. Hay que arreglarlo pero no sé inicializar un array de arrays asociativos xd
  */

  function getDatosJugadoresEquipo($id_equipo){
    $db = Database::getInstance();

    $mysqli = $db->getConnection() ;

    $sql_query =  "SELECT " .\Constantes_DB\tablaJugadores::ID . ", "
    . \Constantes_DB\tablaJugadores::NOMBRE . ", "
    . \Constantes_DB\tablaJugadores::APELLIDOS . ", "
    . \Constantes_DB\tablaJugadores::EDAD .", "
    . \Constantes_DB\tablaJugadores::FOTO . ", "
    . \Constantes_DB\tablaJugadores::IDEQUIPO ." "
    . "FROM " . \Constantes_DB\tablaJugadores::TABLE_NAME
    . " WHERE " .  \Constantes_DB\tablaJugadores::IDEQUIPO . " = " . " '" .$id_equipo . "'";


    //    echo $sql_query . "<br>";


    $result = $mysqli->query($sql_query);

    //echo $result->num_rows .  "<br>" ;

    if ($result->num_rows > 0) {
      //echo "Entra en el if ";
      while($row = $result->fetch_assoc()){

        /*
        Recuerda:
        The double arrow operator, =>, is used as an access mechanism for arrays.
        This means that what is on the left side of it will have a corresponding
        value of what is on the right side of it in array context.
        This can be used to set values of any acceptable type into a corresponding
        index of an array. The index can be associative (string based) or numeric.
        */
        $arrayDeArraysAssocJugadoresDeUnEquipo[] =
        array("id"=>$row[\Constantes_DB\tablaJugadores::ID],
        "nombre"=>$row[\Constantes_DB\tablaJugadores::NOMBRE],
        "apellidos"=>$row[\Constantes_DB\tablaJugadores::APELLIDOS],
        "edad"=>$row[\Constantes_DB\tablaJugadores::EDAD],
        "foto"=>$row[\Constantes_DB\tablaJugadores::FOTO],
        "idEquipo"=>$row[\Constantes_DB\tablaJugadores::IDEQUIPO]
      );

    }


  }else {
    $arrayDeArraysAssocJugadoresDeUnEquipo = 0;
  }

  return $arrayDeArraysAssocJugadoresDeUnEquipo;

}


/*
Signatura: function eliminarEquipo($id_equipo)
Comentario: procedimiento que elimina un equipo de la base de datos.
Precondiciones:
Entradas: ID del equipo que quieres borrar.
Salidas: Es un procedimiento, no devuelve nada.
Postcondiciones: El equipo indicado quedará eliminado de la BBDD si existe, así como todos sus jugadores.
Si el ID dado no correspondiera con ningún equipo, no haría nada.
*/
function eliminarEquipo($id_equipo){
  $db = Database::getInstance();

  $mysqli = $db->getConnection() ;

  $sql_query =  "DELETE "
  . "FROM " . \Constantes_DB\tablaEquipos::TABLE_NAME
  . " WHERE " .  \Constantes_DB\tablaEquipos::ID . " = " . " '" .$id_equipo . "'";
  //    echo $sql_query . "<br>";
  $mysqli->query($sql_query);
}

/*Procedimiento para añadir un equipo a la
BBDD
Sin prepared Statement
function addEquipo($nombreEquipo){
$db = Database::getInstance();
$mysqli = $db->getConnection() ;
$sql_query =  "INSERT INTO ". \Constantes_DB\tablaEquipos::TABLE_NAME . " ("
.\Constantes_DB\tablaEquipos::ID . ", "
.\Constantes_DB\tablaEquipos::NOMBRE . ") "
. " VALUES (UUID(),"
. " '" .$nombreEquipo . "')"
;

//    echo $sql_query . "<br>";
$mysqli->query($sql_query);
}
*/

/*Procedimiento para añadir un equipo a la
BBDD con prepared statement
*/
function addEquipo($nombreEquipo){
  $db = Database::getInstance();
  $mysqli = $db->getConnection() ;
  $stmt = $mysqli->prepare("INSERT INTO ". \Constantes_DB\tablaEquipos::TABLE_NAME ." ("
  . \Constantes_DB\tablaEquipos::ID . ", "
  . \Constantes_DB\tablaEquipos::NOMBRE .") "
  . "VALUES (UUID(), ?)");

  // Vinculamos parámetros a variables
  $stmt->bind_param('s', $nombreEquipo);


  //ejecutamos
  $stmt->execute();

}




/*
Signatura: function eliminarJugador($id_jugador)
Comentario: procedimiento que elimina a un jugador de la base de datos.
Precondiciones:
Entradas: ID del jugador que quieres borrar.
Salidas: Es un procedimiento, no devuelve nada.
Postcondiciones: El jugador indicado quedará eliminado de la BBDD si existe.
Si el ID dado no correspondiera con ningún jugador, no haría nada.
*/
function eliminarJugador($id_jugador){
  $db = Database::getInstance();

  $mysqli = $db->getConnection() ;

  $sql_query =  "DELETE "
  . "FROM " . \Constantes_DB\tablaJugadores::TABLE_NAME
  . " WHERE " .  \Constantes_DB\tablaJugadores::ID . " = " . " '" .$id_jugador . "'";
  //    echo $sql_query . "<br>";
  $mysqli->query($sql_query);
}


/*
Signatura: function addJugador($nombreJugador, $apellidosJugador, $edadJugador, $fotoJugador, $idEquipoJugador)
Comentario: procedimiento que añade un jugador a la base de datos.
Precondiciones:
Entradas: nombre, apellidos, edad, ruta de la foto y equipo del Jugador que quieres añadir.
Salidas: Es un procedimiento, no devuelve nada.
Postcondiciones: El jugador quedará añadido a la BBDD con los datos pasados como parámetro.
El id será autogenerado con la funcionalidad UUID() de MySQL.
Sin prepared statement
*/
/*
function addJugador($nombreJugador, $apellidosJugador, $edadJugador, $fotoJugador, $idEquipoJugador){
$db = Database::getInstance();
$mysqli = $db->getConnection() ;
$sql_query =  "INSERT INTO ". \Constantes_DB\tablaJugadores::TABLE_NAME . " ("
.\Constantes_DB\tablaJugadores::ID . ", "
.\Constantes_DB\tablaJugadores::NOMBRE . ", "
.\Constantes_DB\tablaJugadores::APELLIDOS . ", "
.\Constantes_DB\tablaJugadores::EDAD . ", "
.\Constantes_DB\tablaJugadores::FOTO . ", "
.\Constantes_DB\tablaJugadores::IDEQUIPO . ") "
. " VALUES (UUID(),"
. " '" .$nombreJugador . "',"
. " '" .$apellidosJugador . "',"
. " '" .$edadJugador . "',"
. " '" .$fotoJugador . "',"
. " '" .$idEquipoJugador . "')"
;

//    echo $sql_query . "<br>";
$mysqli->query($sql_query);
}
*/

/*
Signatura: function addJugador($nombreJugador, $apellidosJugador, $edadJugador, $fotoJugador, $idEquipoJugador)
Comentario: procedimiento que añade un jugador a la base de datos.
Precondiciones:
Entradas: nombre, apellidos, edad, ruta de la foto y equipo del Jugador que quieres añadir.
Salidas: Es un procedimiento, no devuelve nada.
Postcondiciones: El jugador quedará añadido a la BBDD con los datos pasados como parámetro.
El id será autogenerado con la funcionalidad UUID() de MySQL.

Con prepared statement

*/
function addJugador($nombreJugador, $apellidosJugador, $edadJugador, $fotoJugador, $idEquipoJugador){
  $db = Database::getInstance();
  $mysqli = $db->getConnection() ;
  $stmt = $mysqli->prepare( "INSERT INTO ". \Constantes_DB\tablaJugadores::TABLE_NAME . " ("
  .\Constantes_DB\tablaJugadores::ID . ", "
  .\Constantes_DB\tablaJugadores::NOMBRE . ", "
  .\Constantes_DB\tablaJugadores::APELLIDOS . ", "
  .\Constantes_DB\tablaJugadores::EDAD . ", "
  .\Constantes_DB\tablaJugadores::FOTO . ", "
  .\Constantes_DB\tablaJugadores::IDEQUIPO . ") "
  . " VALUES (UUID(),?, ?, ?, ?, ?) " );

  //bindeamos

  $stmt->bind_param('sssss', $nombreJugador, $apellidosJugador,$edadJugador,$fotoJugador,$idEquipoJugador);

  //ejecutamos

  $stmt->execute();
}






/*
Signatura: function updateJugador($idJugador,$campoAModificar, $nuevoValor)
Comentario: procedimiento que modifica el campo de un jugador en la base de datos.
Precondiciones:
Entradas: id del jugador que deseas actualizar, nombre del campo que quieres cambiar y el nuevo valor a asignarle.
Salidas: Es un procedimiento, no devuelve nada.
Postcondiciones: El jugador quedará actualizado en la BBDD con los datos pasados como parámetro.
Si el campo a modificar es el ID, mostrará en pantalla un mensaje de error.
// TODO: modificar esto, los subprogramas no leen ni escriben a no ser que ese sea su cometido.
*/

function updateJugador($idJugador,$campoAModificar, $nuevoValor){
$db = Database::getInstance();
$mysqli = $db->getConnection();

$sql_query = "UPDATE ". \Constantes_DB\tablaJugadores::TABLE_NAME . " "

. " SET " . $campoAModificar . " = ('" . $nuevoValor ." ') "
. " WHERE ". \Constantes_DB\tablaJugadores::ID . " = ('" . $idJugador ." ') ";

if($campoAModificar != 'id'){
$mysqli->query($sql_query);
}else{
echo "No puedes modificar el ID de un jugador";
}

}

/*
Signatura: function updateJugador($idJugador,$campoAModificar, $nuevoValor)
Comentario: procedimiento que modifica el campo de un jugador en la base de datos.
Precondiciones:
Entradas: id del jugador que deseas actualizar, nombre del campo que quieres cambiar y el nuevo valor a asignarle.
Salidas: Es un procedimiento, no devuelve nada.
Postcondiciones: El jugador quedará actualizado en la BBDD con los datos pasados como parámetro.
Si el campo a modificar es el ID, mostrará en pantalla un mensaje de error.
// TODO: modificar esto, los subprogramas no leen ni escriben a no ser que ese sea su cometido.
*/
/*Con prepared statement*/
/*
function updateJugador($idJugador,$campoAModificar, $nuevoValor){
  $db = Database::getInstance();
  $mysqli = $db->getConnection();

  switch ($campoAModificar) {
    case 'Nombre' :
    $stmt= $mysqli->prepare("UPDATE Jugadores SET 'Nombre' = '?' WHERE ". \Constantes_DB\tablaJugadores::ID . " = ('?') " );
    $stmt->bind_param('ss', $nuevoValor, $idJugador);

    $stmt->execute();
    break;

    case 'Apellidos' :
    $stmt= $mysqli->prepare("UPDATE ". \Constantes_DB\tablaJugadores::TABLE_NAME

    . " SET 'Apellidos' = '?' WHERE ". \Constantes_DB\tablaJugadores::ID . " = ('?') " );
    $stmt->bind_param('ss', $nuevoValor, $idJugador);

    $stmt->execute();
    break;

    case 'Edad' :
    $stmt= $mysqli->prepare("UPDATE ". \Constantes_DB\tablaJugadores::TABLE_NAME

    . " SET 'Edad' = '?' WHERE ". \Constantes_DB\tablaJugadores::ID . " = ('?') " );
    $stmt->bind_param('ss', $nuevoValor, $idJugador);

    $stmt->execute();
    break;

    case 'Foto' :
    $stmt= $mysqli->prepare("UPDATE ". \Constantes_DB\tablaJugadores::TABLE_NAME

    . " SET 'Foto' = '?' WHERE ". \Constantes_DB\tablaJugadores::ID . " = ('?') " );
    $stmt->bind_param('ss', $nuevoValor, $idJugador);

    $stmt->execute();
    break;

    case 'IDEquipo' :
    $stmt= $mysqli->prepare("UPDATE ". \Constantes_DB\tablaJugadores::TABLE_NAME

    . " SET 'IDEquipo' = '?' WHERE ". \Constantes_DB\tablaJugadores::ID . " = ('?') " );
    $stmt->bind_param('ss', $nuevoValor, $idJugador);

    $stmt->execute();
    break;
  }
}

*/



/*
Signatura: function updateJugadorCompleto($idJugador,$nuevoNombre, $nuevoApellido, $nuevaEdad, $nuevaFoto, $nuevoEquipo)
Comentario: procedimiento que actualiza todos los campo de un jugador en la base de datos.
Precondiciones:
Entradas: id del jugador que deseas actualizar, nuevo nombre, nuevo apellido, nueva edad, nueva foto, nuevo equipo.
Salidas: Es un procedimiento, no devuelve nada.
Postcondiciones: El jugador quedará actualizado en la BBDD con los datos pasados como parámetro.
Este procedimiento llama a updateJugador($idJugador,$campoAModificar, $nuevoValor);
*/
function updateJugadorCompleto($idJugador,$nuevoNombre, $nuevoApellido, $nuevaEdad, $nuevaFoto, $nuevoEquipo){

  $this->updateJugador($idJugador, "NOMBRE", $nuevoNombre);
  $this->updateJugador($idJugador, "APELLIDOS", $nuevoApellido);
  $this->updateJugador($idJugador, "EDAD", $nuevaEdad);
  $this->updateJugador($idJugador, "FOTO", $nuevaFoto);
  $this->updateJugador($idJugador, "IDEQUIPO", $nuevoEquipo);
}


/*
Signatura: function IsJugadorDeUnEquipo($idJugador, $idEquipo)
Comentario: Función que comprueba si un jugador pertenece a un equipo.
Precondiciones:
Entradas: id del jugador y id del equipo.
Salidas: Devuelve true o false dependiendo de si el jugador pertenece o no a ese equipo.
Postcondiciones: Asociado al nombre devuelve true o false dependiendo de si el jugador pertenece o no a ese equipo.
*/
function IsJugadorDeUnEquipo($idJugador, $idEquipo){
  $resultado = false;
  $db = Database::getInstance();
  $mysqli = $db->getConnection();

  $sql_query = "SELECT ". \Constantes_DB\tablaJugadores::ID . " "
  ." FROM " . \Constantes_DB\tablaJugadores::TABLE_NAME . " "
  ." WHERE ". \Constantes_DB\tablaJugadores::IDEQUIPO . " = '" . $idEquipo . "'"
  . " AND ". \Constantes_DB\tablaJugadores::ID . " = '" . $idJugador . "'" ;



  $result = $mysqli->query($sql_query);
  if ($result->num_rows > 0) {
    //echo "Entra en el if ";
    $resultado = true;
  }
  return $resultado;
}

/*
Signatura: function obtenerDatosJugador($idJugador)
Comentario: Función que devuelve todos los datos de un jugador.
Precondiciones:
Entradas: id del jugador
Salidas: Devuelve un array de arrays asociativos con los datos de un jugador
Postcondiciones: Asociado al nombre devuelve un array de arrays asociativos con los datos de un jugador.
// TODO: peta si la consulta no devuelve nada
*/
function obtenerDatosJugador($idJugador){
  $db = Database::getInstance();
  $mysqli = $db->getConnection();

  $sql_query = "SELECT ". \Constantes_DB\tablaJugadores::ID . ", "
  . \Constantes_DB\tablaJugadores::NOMBRE . ", "
  . \Constantes_DB\tablaJugadores::APELLIDOS . ", "
  . \Constantes_DB\tablaJugadores::EDAD . ", "
  . \Constantes_DB\tablaJugadores::FOTO . ", "
  . \Constantes_DB\tablaJugadores::IDEQUIPO . " "
  ." FROM " . \Constantes_DB\tablaJugadores::TABLE_NAME . " "
  ." WHERE ". \Constantes_DB\tablaJugadores::ID . " = '" . $idJugador . "'" ;


  $result = $mysqli->query($sql_query);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
      $arrayDatos = array("id"=>$row[\Constantes_DB\tablaJugadores::ID],
      "nombre"=>$row[\Constantes_DB\tablaJugadores::NOMBRE],
      "apellidos"=>$row[\Constantes_DB\tablaJugadores::APELLIDOS],
      "edad"=>$row[\Constantes_DB\tablaJugadores::EDAD],
      "foto"=>$row[\Constantes_DB\tablaJugadores::FOTO],
      "idEquipo"=>$row[\Constantes_DB\tablaJugadores::IDEQUIPO]
    );
  }
}else{
  $arrayDatos = 0;
}
return $arrayDatos;

}

}


?>
