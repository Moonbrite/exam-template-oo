<?php
require 'View/function.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container d-flex">

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nom de la techno</label>
            <input type="text" name="nom" value="<?php keepFormValue("nom")?>"  class="form-control <?php
            displayBsClassForm($errors,"nom");
            ?>"><?php
            displayBsErrorForm($errors, "nom");
            ?>
        </div>

        <!---------------------------------------------------------------------------->

        <div class="form-group">
            <label class="mb-2"" for="">photo</label>
            <input name="photos" type="file" class="form-control mb-3 <?php
            displayBsClassForm($errors,"photos");
            ?>">
            <?php
            displayBsErrorForm($errors, "photos");
            ?>
        </div>

        <!---------------------------------------------------------------------------->

        <div class="form-group">
            <label for="">categorie</label>
            <select name="categorie" class="form-select <?php displayBsClassForm($errors,"categorie");?>" id="">
                <option value="<?php htmlspecialchars(" ")?>"></option>
                <?php
                foreach (Techno::$allowedTechno as $techno){
                    $actif = "";
                    if($_SERVER["REQUEST_METHOD"]=='POST' && $_POST["categorie"] == $techno){
                        $actif = 'selected';
                    }
                    echo ('<option '.$actif.'  value="'.htmlspecialchars($techno).'">'.htmlspecialchars($techno).'</option>');
                }
                ?>
            </select>
            <?php displayBsErrorForm($errors, "categorie"); ?>
        </div>

        <!---------------------------------------------------------------------------->

        <button class="btn btn-success" type="submit">Insertion</button>

    </form>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></body>
</html>