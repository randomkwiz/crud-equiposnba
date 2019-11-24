<?php
  require_once 'GestionEquipos.php';

class Utilidades{

  public static function pintarTablaEquipos(){
    $gestion = new GestionEquipos();
    $datos = $gestion->getListadoEquipos();

    if($datos != 0){
      echo '<table border=\"1\">';
      echo '<tr>';
      echo '<td>'. \Constantes_DB\tablaEquipos::ID  .'</td>';
      echo '<td>'. \Constantes_DB\tablaEquipos::NOMBRE  .'</td>';


     echo '<td>'. "Numero de jugadores"  .'</td>';
     echo '<td>' . " ". '</td>';
      echo '</tr>';
      for ($i = 0; $i < count($datos); $i++) {
        $jugadoresEquipo = $gestion->getNumeroJugadoresEquipo($datos[$i]["id"]);
        echo '<tr>';
          echo '<td>'. $datos[$i]["id"] .'</td>';
          echo '<td>'. $datos[$i]["nombre"] .'</td>';

          echo '<td>' ;
          echo $jugadoresEquipo;
          echo '</td>';
          echo '<td>';
          echo '<form action="paginaInformacionEquipo.php" method="post">';
          echo '<input type="hidden" name="idEquipo" value="';
          echo $datos[$i]["id"];
          echo '"  >' ;
          echo '';
          echo '</input>';
          echo '<input type="submit" name="botonVisible" value="';
          echo 'GO';
          echo '"  >' ;
          echo '</input>';
          echo '</form>';
          echo '</td>';
          /*El descubrimiento de un sabado/domingo a las 1:11 de la noche:
              https://codebeautify.org/html-to-php-converter
              le pones la instruccion HTML y te pone los "echo" automaticamente :DDD
          */

          echo '</tr>';

      }
     echo '</table>';
   } else {
     echo "No hay equipos ";
   }


  }

/*Pinta en pantalla una tabla con los jugadores de un equipo*/

  public static function pintarTablaJugadoresDeUnEquipo($idEquipo){
    $gestion = new GestionEquipos();
    $datos = $gestion->getDatosJugadoresEquipo($idEquipo);

    if($gestion->getNumeroJugadoresEquipo($idEquipo) > 0){
      echo '<table border=\"1\">';
      echo '<tr>';
      echo '<td>'. \Constantes_DB\tablaJugadores::ID  .'</td>';
      echo '<td>'. \Constantes_DB\tablaJugadores::NOMBRE  .'</td>';
      echo '<td>'. \Constantes_DB\tablaJugadores::APELLIDOS  .'</td>';
      echo '<td>'. \Constantes_DB\tablaJugadores::EDAD  .'</td>';
      echo '<td>'. \Constantes_DB\tablaJugadores::FOTO  .'</td>';
      echo '<td>'. \Constantes_DB\tablaJugadores::IDEQUIPO  .'</td>';
     //echo '<td>' . " ". '</td>';
     echo '<td>' . " ". '</td>';
     echo '<td>' . " ". '</td>';
      echo '</tr>';
      for ($i = 0; $i < count($datos); $i++) {
        echo '<tr>';
        echo '<td >';
        echo $datos[$i]["id"];
        echo  '</td>';
        echo '<td >';
        echo $datos[$i]["nombre"];
        echo  '</td>';
        echo '<td >';
        echo $datos[$i]["apellidos"];
        echo  '</td>';
        echo '<td >';
        echo $datos[$i]["edad"];
        echo  '</td>';
        echo '<td >';
        echo $datos[$i]["foto"];
        echo  '</td>';
        echo '<td >';
        echo $datos[$i]["idEquipo"];
        echo  '</td>';
        // echo '<td>';
        // echo '<form action="formDetallesJugador.php" method="post">';
        // echo '<input type="hidden" name="btnAdd" value="';
        // echo $datos[$i]["id"];
        // echo '">' ;
        // echo '</input>';
        // echo '<input type="submit" name="addButton" value="';
        // echo 'Añadir';
        // echo '"  >' ;
        // echo '</input>';
        // echo '</form>';
        // echo '</td>';

        echo '<td>';
        echo '<form action="operaciones.php" method="post">';
        echo '<input type="hidden" name="deleteJugador" value="';
        echo $datos[$i]["id"];
        echo '"  >' ;
        echo '';
        echo '</input>';
        echo '<input type="submit" name="delButton" value="';
        echo 'Eliminar';
        echo '"  >' ;
        echo '</input>';
        echo '</form>';
        echo '</td>';


        echo '<td>';
        echo '<form action="formDetallesJugador.php" method="post">';
        echo '<input type="hidden" name="btnEdit" value="';
        echo $datos[$i]["id"];
        echo '"  >' ;
        echo '';
        echo '</input>';
        echo '<input type="submit" name="editButton" value="';
        echo 'Editar';
        echo '"  >' ;
        echo '</input>';
        echo '</form>';
        echo '</td>';

        echo '</tr>';


      }
     echo '</table>';
   } else{
     echo "No hay jugadores";
   }

  }

/*Genera <option> (para una lista desplegable html) para los equipos disponibles en la bbdd*/
public static  function generarOptionEquipos(){

    $gestionarEquipos = new GestionEquipos();
    $equipos = $gestionarEquipos->getListadoEquipos();
    for($i = 0; $i < count($equipos); $i ++){
      echo '<br>';
      echo '<option value= "';
      echo $equipos[$i]["id"];
      echo '"> ';
      echo $equipos[$i]["nombre"] ;
      echo '</option>';
      echo '<br>';
    }
  }

  /*Genera <option> (para una lista desplegable html) para los equipos disponibles en la bbdd
    Tiene un equipo seleccionado por defecto.
    Ya funciona
  */
  public static function generarOptionEquiposConEquipoDefinido($idJugador){
      $gestionarEquipos = new GestionEquipos();
      $equipos = $gestionarEquipos->getListadoEquipos();

      for($i = 0; $i < count($equipos); $i ++){
        if( $gestionarEquipos->IsJugadorDeUnEquipo($idJugador, $equipos[$i]["id"])   ){
          echo " entra en selected ";
          echo ' <br> ';
          echo ' <option selected value= "';
          echo $equipos[$i]["id"];
          echo '"> ';
          echo $equipos[$i]["nombre"] ;
          echo '</option>';
          echo '<br>';
        }else{
          echo '<br>';
          echo '<option value= "';
          echo $equipos[$i]["id"];
          echo '"> ';
          echo $equipos[$i]["nombre"] ;
          echo '</option>';
          echo '<br>';
        }

      }
    }

}

 ?>
