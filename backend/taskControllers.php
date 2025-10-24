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

  $query = "INSERT INTO taken ( titel, beschrijving, afdeling, status, deadline) VALUES ( :titel, :beschrijving, :afdeling, :status, :deadline)";

  $statement = $conn->prepare($query);

     $statement->execute([
         ":titel" => $titel,
        ":beschrijving" => $beschrijving,
         ":afdeling" => $afdeling,
         ":status" => $status,
         ":deadline" => $deadline,
    ]);

    header("location: ../index.php?msg=Meldingopgeslagen ");
}

//update query

$action = $_POST['action'];
if($action == "edit")
{
    
    $titel = $_POST['titel'];
    $beschrijving= $_POST['beschrijving'];
    $afdeling = $_POST['afdeling'];
    $status= $_POST['status'];
    $deadline = $_POST['deadline'];

    
    //Haal variabelen op, doe inputvalidatie

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


    if(isset($errors))
    {
        var_dump($errors);
        die();
    }

    if(!empty($errors)){
        var_dump($errors);
        die();
    }
   

    //1. Haal de verbinding erbij
    require_once '../backend/conn.php';

    //2. Schrijf query met placeholders
    $query = "UPDATE taken SET titel = :titel, beschrijving = :beschrijving, afdeling = :afdeling, status = :status, deadline = :deadline, WHERE id = :id";
    
    //3. Zet query om naar statement
    $statement = $conn->prepare($query);

    //4. Voer statement uit, geef nu waarden mee voor de placeholders
    $statement->execute([
        ":titel" => $titel,
        ":beschrijving" => $beschrijving,
         ":afdeling" => $afdeling,
         ":status" => $status,
         ":deadline" => $deadline,
         ":id" => $id
    ]);

    //5. Niet van toepassing bij een UPDATE-query

    //Stuur gebruiker terug naar lijst met berichten (index.php in hoofdmap)
    //...
    header("location: ../index.php?taak=opgeslagen");
    exit();
}


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

    header("Location: ../index.php?Taak=Verwijderd");
    exit;
}
?>

