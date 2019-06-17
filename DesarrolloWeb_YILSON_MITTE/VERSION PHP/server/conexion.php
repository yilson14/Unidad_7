<?php
function conectar()
{ 
    $hostname = 'localhost:3306';
    $database = 'agenda';
    $username = 'root';
    $password = '';
    
    try 
    {
        $con = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
    }
    catch (PDOException $e)
    {
        print "¡Error!: " . $e->getMessage() . "";
        die();
        exit();
    }

    return $con;
    
}

function execRunQuery($sql,$params = array(),$update = false,$trans = false)
{
    try 
    {
        $conexion = conectar();
        $stmt = $conexion->prepare($sql);
        (empty($params)) ? $stmt->execute():$stmt->execute($params);
        $rows = ($update == false) ? $stmt->fetchAll(PDO::FETCH_BOTH): $stmt->rowCount();
        return json_encode($rows);
    }
    catch (PDOException $e)
    {
        return null;
    }
  }

  function executeQuery($sql){
    $rows =0;
    try {
        $conexion = conectar();
        // set the PDO error mode to exception
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // use exec() because no results are returned
        $rows = $conexion->exec($sql);
        }
    catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }

    $conn = null;

    return $rows;
  }

  function Select($query)
  {
    try 
    {
        $conexion = conectar();
        //$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conexion->prepare($query); 
        $stmt->execute();
        return $result = $stmt->fetchAll();
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
  }

  function otroselect()
  {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  }
  ?>
