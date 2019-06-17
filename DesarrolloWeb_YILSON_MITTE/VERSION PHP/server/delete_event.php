<?php

//delete.php

if(isset($_POST["id"]))
{

    $hostname = 'localhost:3306';
    $database = 'agenda';
    $username = 'root';
    $password = '';
    
    $connect = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);

        
    $query = "DELETE from evento WHERE id=" . $_POST["id"];
    $response['msg']='OK';
    $statement = $connect->prepare($query);
    $statement->execute(
    array(
    ':id' => $_POST['id']
    )
    );
    echo json_encode($response);
}

 ?>
