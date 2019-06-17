<?php

require('./conexion.php');

$hash = password_hash('yilson', PASSWORD_DEFAULT);
$resultado_consulta = executeQuery("INSERT INTO usuario(email, nombre, contrasena, fechaNacimiento)
VALUES ('yilson@gmail.com', 'yilson mitte', '".$hash."', '1990-12-12');");

$hash = password_hash('dellanira', PASSWORD_DEFAULT);
$resultado_consulta = executeQuery("INSERT INTO usuario(email, nombre, contrasena, fechaNacimiento)
VALUES ('dellanira@gmail.com', 'dellanira quiñonez', '".$hash."', '1989-10-15');");

$hash = password_hash('johan', PASSWORD_DEFAULT);
$resultado_consulta = executeQuery("INSERT INTO usuario(email, nombre, contrasena, fechaNacimiento)
VALUES ('johan@gmail.com', 'johan mitte', '".$hash."', '1989-05-25');");


if ($resultado_consulta > 0)
{
    echo "<script> alert('usuarios registrados'); </script>";
}



 ?>
