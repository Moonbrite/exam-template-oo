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

<?php require "View/Parts/header.php"?>

<div class="container d-flex justify-content-center mt-5">

    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Nom de la Marque</label>
            <input type="text" name="mark" value="<?php echo(htmlspecialchars($motoEdit->getMark()))?>"  class="form-control <?php
            displayBsClassForm($errors,"mark");
            ?>"><?php
            displayBsErrorForm($errors, "mark");
            ?>
        </div>

        <!---------------------------------------------------------------------------->

        <div class="form-group">
            <label>Nom du model</label>
            <input type="text" name="model" value="<?php echo(htmlspecialchars($motoEdit->getModel()))?>"  class="form-control <?php
            displayBsClassForm($errors,"model");
            ?>"><?php
            displayBsErrorForm($errors, "model");
            ?>
        </div>

        <!---------------------------------------------------------------------------->

        <?php
        echo ('<img class="img-previsu img-thumbnail mb-3" src="'.htmlspecialchars($motoEdit->getPicture()).'?id='.uniqid().'" alt="">');
        ?>

        <div class="form-group">
            <label class="mb-2"" for="">Photo</label>
            <input name="photos" type="file" class="form-control mb-3 <?php
            displayBsClassForm($errors,"photos");
            ?>">
            <?php
            displayBsErrorForm($errors, "photos");
            ?>
        </div>

        <!---------------------------------------------------------------------------->

        <div class="form-group">
            <label for="">Type</label>
            <select name="type" class="form-select <?php displayBsClassForm($errors,"type");?>" id="">
                <option value="<?php htmlspecialchars(" ")?>"></option>
                <?php
                foreach (Moto::$allwoedType as $motoType){
                    $actif = "";
                    if($motoEdit->getType() ==$motoType ){
                        $actif = 'selected';
                    }
                    echo ('<option '.$actif.'  value="'.htmlspecialchars($motoType).'">'.htmlspecialchars($motoType).'</option>');
                }
                ?>
            </select>
            <?php displayBsErrorForm($errors, "type");?>
        </div>


        <!---------------------------------------------------------------------------->

        <button class="btn btn-success" type="submit">Insertion</button>

    </form>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></body>
</html>
