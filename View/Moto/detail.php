<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<?php require "View/Parts/header.php"?>
<div class="container d-flex mt-5">
    <?php
    echo ('<div class="card" style="width: 18rem;">
                <img src="'.htmlspecialchars($detail->getPicture().'?id='.uniqid()).'" class="card-img-top" alt="...">
                <div class="card-body">
    <h5 class="card-title">'.htmlspecialchars($detail->getMark()).'</h5>
    <p>'.htmlspecialchars($detail->getModel()).'</p>
    <a class="btn btn-danger" href="?controller=moto&action=delete&id='.$detail->getId().'">Delete</a>
    <a class="btn btn-secondary" href="?controller=moto&action=modif&id='.$detail->getId().'">Modif</a>
  </div>');
    ?>
</div>


<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
