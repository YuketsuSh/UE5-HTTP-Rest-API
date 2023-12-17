<?php

require_once("DBManager.php");

private $db;

try {
    $db = new DBManager();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $annonce = $_POST["annonce"];

        $stmt = $conn->prepare("INSERT INTO annonces (annonce) VALUES (:annonce)");
        $stmt->bindParam(':annonce' . $annonce);
        $stmt->execute();

        header("Location: index.php");
        exit();
    }
}catch (PDOException $e){
    echo "Error : " . $e->getMessage();
}

$conn = null;

?>