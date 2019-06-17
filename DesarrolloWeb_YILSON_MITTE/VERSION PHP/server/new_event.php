<?php
  /*
  
    $hostname = 'localhost:3306';
    $database = 'agenda';
    $username = 'root';
    $password = '';

    $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);

    $data = array();

    $query = "INSERT INTO evento (titulo, fechaInicio, horaInicio, fechaFinalizacion, horaFinalizacion, todoDia) 
    VALUES ('$titulo',  '$start_date',  '$start_hour', '$end_date','$end_hour',$allDay); ");

    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();

    foreach($result as $row)
    {
        $data[] = array(
        'id'   => $row["id"],
        'title'   => $row["titulo"],
        'start'   => $row["todoDia"]===0 ? $row["fechaInicio"]. ' '. $row["horaInicio"] : $row["fechaInicio"],
        'end'   => $row["todoDia"]===0 ? $row["fechaFinalizacion"]. ' '. $row["horaFinalizacion"] : $row["fechaFinalizacion"],
        'allDay' => (bool)$row["todoDia"]
        );
    }
    $response['msg']="OK";
    $response['eventos']=$data;

    echo json_encode($response);*/


    require('../server/conexion.php');

    $titulo=$_POST['titulo'];
    $start_date=$_POST['start_date'];
    $allDay=$_POST['allDay'];
    $end_date=$_POST['end_date'];
    $end_hour=$_POST['end_hour'];
    $start_hour=$_POST['start_hour'];

    $resultado_consulta = executeQuery("INSERT INTO evento (titulo, fechaInicio, horaInicio, fechaFinalizacion, horaFinalizacion, todoDia) 
    VALUES ('$titulo',  '$start_date',  '$start_hour', '$end_date','$end_hour',$allDay); ");

    $data['msg']="OK";

    echo json_encode($data)


 ?>
