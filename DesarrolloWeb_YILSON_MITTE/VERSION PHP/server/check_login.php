<?php

/* require('./server/conexion.php');

    $con = new ConectorBD();
    $response['conexion']=$con->initConexion('agenda');
    $userName=$_POST['username'];
    $passwrd=$_POST['passw'];*/
    require('../server/conexion.php');

    $userName=$_POST['username'];
    $passwrd=$_POST['password'];

    $resultado_consulta = Select("SELECT id, email, nombre, contrasena, fechaNacimiento FROM usuario WHERE email='".$userName."';");

    
   if( count($resultado_consulta) > 0 )
   {
     
      foreach($resultado_consulta as $campo => $value)
      {
         $pwdhash=$value['contrasena'];
      }
     
      if (password_verify($passwrd, $pwdhash))
      {
         $response['msg']='OK';
         //session_start();
           /* $response['acceso'] = 'concedido';
            $_SESSION['username'] = $resultado_consulta[0]["email"];
            $_SESSION['userIDss'] = $resultado_consulta[0]["id"];
            $_SESSION['userNomb'] = $resultado_consulta[0]["nombre"];
            $_SESSION['userSexo'] = $resultado_consulta[0]["sexo"];*/
      
      }
      else
      {
         $response['msg'] = 'Contraseña incorrecta';
      }
   }
   else
   {
      $response['msg'] = 'Correo es incorrecto';
   }
    echo json_encode($response);

 ?>
