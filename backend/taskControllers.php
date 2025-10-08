<?php
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
    $errors[]="Vul de titel in.";
}

$beschrijving=$_POST['beschrijving'];
if(empty($beschrijving)){
    $errors[]="Vul de beschrijving in.";
}

$afdeling=$_POST['afdeling'];
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

echo $id . " / " . $titel. " / " . $beschrijving
?>