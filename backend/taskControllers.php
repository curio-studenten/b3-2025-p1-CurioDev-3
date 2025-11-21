<?php

$action = $_POST['action']?? null;
if($action == "insert")
{


$titel = $_POST['titel'];
$beschrijving= $_POST['beschrijving'];
$afdeling = $_POST['afdeling'];
$status= $_POST['status'];
$deadline = $_POST['deadline'];

$titel=$_POST['titel'];
if(empty($titel)){
    $errors[]="title cannot be empty";
}

$beschrijving=$_POST['beschrijving'];
if(empty($beschrijving)){
    $errors[]="description cannot be empty";
}

$afdeling=$_POST['afdeling'];
if(empty($afdeling)){
    $errors[]="department cannot be empty";
}

$status=$_POST['status'];
if(empty($status)){
    $status = 'todo';
}


if(isset($errors))
{
    var_dump($errors);
    die();
}

if(!empty($errors)){
    var_dump($errors);
    die();
}

  require_once  __DIR__ . '/../backend/conn.php';

  $query = "INSERT INTO taken ( titel, beschrijving, afdeling, status, deadline) VALUES ( :titel, :beschrijving, :afdeling, :status, :deadline)";

  $statement = $conn->prepare($query);

     $statement->execute([
         ":titel" => $titel,
        ":beschrijving" => $beschrijving,
         ":afdeling" => $afdeling,
         ":status" => $status,
         ":deadline" => $deadline,
    ]);

    header("location: ../tasks/index.php");
    exit();
}

//update query

$action = $_POST['action'];
if($action == "update")
{
    
    $titel = $_POST['titel'];
    $beschrijving= $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $status= $_POST['status'];
    $deadline = $_POST['deadline'];
    $id = $_POST['id'];
    
   

    require_once  __DIR__ . '/../backend/conn.php';

    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, afdeling = :afdeling, status = :status, deadline = :deadline WHERE id = :id";
    
    $statement = $conn->prepare($query);


    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
         ":afdeling" => $afdeling,
         ":status" => $status,
         ":deadline" => $deadline,
         ":id" => $id
    ]);



    header("location: ../tasks/index.php");
    exit();
}


//delete query
if ($action == "delete") {
    $id = $_POST['id'] ?? null;

    if (empty($id)) {
        die("Geen id opgegeven om te verwijderen.");
    }

    require_once   __DIR__ . '/conn.php';

    $query = "DELETE FROM taken WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([":id" => $id]);

    header("location: ../tasks/index.php");
    exit;
}
?>

