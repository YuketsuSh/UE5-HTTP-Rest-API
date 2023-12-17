<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('php/DBManager.php');
require_once('php/AnnonceManager.php');

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action === 'lastnews') {
        $annonceManager = new AnnonceManager();
        $lastAnnonceText = $annonceManager->getLastAnnonceText();

        $response = $lastAnnonceText;
        header('Content-Type: application/json');
        echo $response;
        exit();
    }
    if ($action === 'news') {
        $annonceManager = new AnnonceManager();
        $annonces = $annonceManager->getAnnonces();

        header('Content-Type: text/plain');
        foreach($annonces as $annonce){
            echo $annonce . "\n";
        }
        exit();
    }
}
?>
