<?php
  
      $hostname = 'localhost:3306';
      $database = 'agenda';
      $username = 'root';
      $password = '';

      $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);

      $data = array();

      $query = "SELECT * FROM evento ORDER BY id";

      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();

      foreach($result as $row)
      {
          $data[] = array(
          'id'   => $row["id"],
          'title'   => $row["titulo"],
          'start'   => (bool)$row["todoDia"]===false ? $row["fechaInicio"]. ' '. $row["horaInicio"] : $row["fechaInicio"],
          'end'   => (bool)$row["todoDia"]===false ? $row["fechaFinalizacion"]. ' '. $row["horaFinalizacion"] : $row["fechaFinalizacion"],
          'allDay' => (bool)$row["todoDia"]
          );
      }
      $response['msg']="OK";
      $response['eventos']=$data;

      echo json_encode($response);


     
  /*  $hostname = 'localhost:3306';
    $database = 'agenda';
    $username = 'root';
    $password = '';

    $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);

    $data = array();

    $query = "SELECT * FROM evento ORDER BY id";

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

    echo json_encode($data);*/

 ?>
