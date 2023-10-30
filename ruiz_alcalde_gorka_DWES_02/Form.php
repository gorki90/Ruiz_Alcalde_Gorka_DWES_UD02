<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Formulario en PHP</title>
  <link rel="stylesheet" href="CSS/Style.css">
</head>

<body>



<?php

function devolucion(){
$fechact=new DateTime ($_POST['fecha']);
$fechact->add(new DateInterval('P10D'));
echo "La fecha de devolución es: " .$fechact->format("d-m-Y");
}

function comprobarEmail(){
if(isset($_POST['email'])){
$email=$_POST['email'];

if(str_contains ($email,'@')){
  echo "El email "."$email "."es correcto.";
}
}
}

function comprobarDni(){
if(isset($_POST['dni']))
$dniarr=$_POST['dni'];
$separacion=str_split($dniarr,8);
unset($separacion[1]);
foreach($separacion as $separacion){
  $num=(int)$separacion;
}
$resto=$num%23;
//echo $resto;

switch ($resto) {
  case 0:
    $letra='T';
    break;
  case 1:
    $letra='R';
    break;
  case 2:
    $letra='W';
    break;
  case 3:
    $letra='A';
    break;
  case 4:
    $letra='G';
    break;
  case 5:
    $letra='M';
    break;
  case 6:
    $letra='Y';
    break;
  case 7:
    $letra='F';
    break;
  case 8:
    $letra='P';
    break;
  case 9:
    $letra='D';
    break;
  case 10:
    $letra='X';
    break;
  case 11:
    $letra='B';
    break;
  case 12:
    $letra='N';
    break;
  case 13:
    $letra='J';
    break;
  case 14:
    $letra='Z';
    break;
  case 15:
    $letra='S';
    break;
  case 16:
    $letra='Q';
    break;
  case 17:
    $letra='V';
    break;
  case 18:
    $letra='H';
    break;
  case 19:
    $letra='L';
    break;
  case 20:
    $letra='C';
    break;
  case 21:
    $letra='K';
    break;
  case 22:
    $letra='E';
    break;
  default:
    echo "El DNI no es correcto.";

}
 //echo "$letra";
 echo "El DNI correcto es: ". "$num"."$letra";

}




if(isset($_POST['enviar']) && !empty($_POST['fecha'])){
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $libro = $_POST['libro'];
  
   
    echo devolucion(). "<br />";
    echo comprobarEmail(). "<br />";
    echo comprobarDni(). "<br />";
  } else {
   
 
?>

  <form class="ej" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <fieldset style="width:20%">
      <legend><h3>Formulario para alquiler de libros</h3></legend>
      Nombre<br>
      <input type="text" name="nombre" value="" autofocus pattern="[A-Za-z ñÑáéíóúÁÉÍÓÚüÜ]+" minlength="2" maxlength="20" required>
      <br>
      <br>
      Apellidos<br>
      <input type="text" name="apellidos" value="" pattern="[A-Za-z 'ñÑáéíóúÁÉÍÓÚüÜ]+" minlength="4" maxlength="40" required>
      <br>
      <br>
      Email<br>
      <input type="email" name="email" value="" pattern="[a-z0-9]+@+[a-z0-9]+\.[a-z]{2,4}" required>
      <br>
      <br>
      Libro<br>
      <input type="text" name="libro" value="" placeholder="Libro alquilado" required>
      <br>
      <br>
      Fecha del alquiler<br>
      <input type="date" name="fecha" value="" min="<?php echo date('Y-m-d'); ?>">
      <br>
      <br>
      DNI<br>
      <input type="text" name="dni" value="" pattern="([0-9]{8})([a-zA-Z]{1})" required>
      <br>
      <br>
      <input class="boton1" type="submit" name="enviar" value="Enviar"> <input class="boton2" type="reset" name="borrar" value="Borrar formulario">
    </fieldset>

  </form>
  <?php
}

?>
</body>

</html>
