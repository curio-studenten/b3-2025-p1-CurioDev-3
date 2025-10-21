<?php

$action = $_POST['action']?? null;
if($action == "insert")
{

$id = $_POST['id'];
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
if(empty($user)){
    $errors[]="user cannot be empty.";
}

if(isset($errors))
{
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
?>

