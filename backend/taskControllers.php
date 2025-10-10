<?php

$action = $_POST['action'];
if($action == "insert"){

$id = $_POST['id'];
$title = $_POST['title'];
$description= $_POST['description'];
$department = $_POST['department'];
$status= $_POST['status'];
$deadline = $_POST['deadline'];
$user = $_POST['user'];
$created_at = $_POST['created_at'];

$title=$_POST['title'];
if(empty($titel)){
    $errors[]="Vul de titel in.";
}

$description=$_POST['description'];
if(empty($beschrijving)){
    $errors[]="Vul de beschrijving in.";
}

$department=$_POST['department'];
if(empty($afdeling)){
    $errors[]="Vul de afdeling in.";
}

$status=$_POST['status'];
if(empty($status)){
    $errors[]="Vul de status in.";
}

$user=$_POST['user'];
if(empty($user)){
    $errors[]="Vul de user in.";
}

if(isset($errors))
{
    var_dump($errors);
    die();
}

  require_once 'backend/conn.php';

  $query = "INSERT INTO taken (id, title, description, department, status, deadline, users, created_at) VALUES (:id, :title, :description, :department, :status :deadline, :users, :created_at)";

  $statement = $conn->prepare($query);

     $statement->execute([
         ":id" => $id,
         ":title" => $title,
        ":description" => $description,
         ":department" => $department,
         ":status" => $status,
         ":deadline" => $deadline,
         ":users" => $user,
         "created_at" => $created_at
    ]);

    header("location: ../index.php?msg=Meldingopgeslagen ");
}

//update query


//delete query
?>

