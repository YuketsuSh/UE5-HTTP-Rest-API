<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("php/DBManager.php");
require_once("php/AnnonceManager.php");


if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $annonceManager = new AnnonceManager();

    $text_annonce = $_POST["annonce"];

    $annonceManager->addAnnonce($text_annonce);

    header("Location: index.php");
    exit();

}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>OrStudio - Web Application API [News Publier]</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.2/css/bootstrap.min.css" rel="stylesheet">
    <style src="css/main.css"></style>
    </head>
<body>
    <div class="container">
        <h2>Publish a announcement</h2>
        <hr>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="annonce" class="form-label">Your announce :</label>
                <textarea class="form-control" id="annonce" name="annonce" row="5" placeholder="Input your announcement message in this case."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publish</button>
        </form>
    </div>
</body>
</html>