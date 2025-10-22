<?php

$action = $_POST['action']?? null;
if($action == "insert")
{


$titel = $_POST['titel'];
$beschrijving= $_POST['beschrijving'];
$afdeling = $_POST['afdeling'];
$status= $_POST['status'];
$deadline = $_POST['deadline'];
$user = $_POST['user'];
$created_at = $_POST['created_at'];

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
    $errors[]="status cannot be empty";
}

$user=$_POST['user'];
if(!is_numeric($user)){
    $errors[]="user has to have an numeric value.";
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

  require_once '../backend/conn.php';

  $query = "INSERT INTO taken ( titel, beschrijving, afdeling, status, deadline, user, created_at) VALUES ( :titel, :beschrijving, :afdeling, :status, :deadline, :user, :created_at)";

  $statement = $conn->prepare($query);

     $statement->execute([
         ":titel" => $titel,
        ":beschrijving" => $beschrijving,
         ":afdeling" => $afdeling,
         ":status" => $status,
         ":deadline" => $deadline,
         ":user" => $user,
         ":created_at" => $created_at
    ]);

    header("location: ../index.php?msg=Meldingopgeslagen ");
}

//update query


//delete query
if ($action == "delete") {
    $id = $_POST['id'] ?? null;

    if (empty($id)) {
        // geen id opgegeven
        die("Geen id opgegeven om te verwijderen.");
    }

    require_once 'backend/conn.php';

    $query = "DELETE FROM taken WHERE id = :id";
    $statement = $conn->prepare($query);
    $statement->execute([":id" => $id]);

    header("Location: ../index.php?msg=Verwijderd");
    exit;
}
?>

