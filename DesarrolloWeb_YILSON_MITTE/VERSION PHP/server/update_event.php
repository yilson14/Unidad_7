<?php
 
    $hostname = 'localhost:3306';
    $database = 'agenda';
    $username = 'root';
    $password = '';

    $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);


    if(isset($_POST["id"]))        
    {
        $start_date=$_POST["start_date"];
        $start_hour=$_POST["start_hour"];
        $end_date=$_POST["end_date"];
        $end_hour=$_POST["end_hour"];
      
        //actual
        $query = "UPDATE evento SET fechaInicio='".$start_date."', fechaFinalizacion='".$end_date."',
                                    horaInicio='".$start_hour."', horaFinalizacion='".$end_hour."'
                   WHERE id=" . $_POST["id"] ;
        $data['msg']='OK';
        $statement = $connect->prepare($query);
        $statement->execute(
        array(
        ':id' => $_POST['id']
        )
        );
    }

    echo json_encode($data);

 ?>
