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
<?php
require 'View/Parts/header.php'
?>

<div class="d-flex justify-content-center mt-4 mb-4">
    <a style="text-decoration: none;color: white" href="?controller=moto&action=add">
        <button class="button">
        Insertion
        </button>
    </a>
</div>



<?php
if (count($allMoto)!=0){
    echo ('<div class="container">
        <div class="row">');
    foreach ($allMoto as $tec){
        echo ('<div class="col-md-4 animate__animated animate__backInDown">
                <div class="wsk-cp-product">
                    <div class="wsk-cp-img">
                        <img  src="'.htmlspecialchars($tec->getPicture().'?id='.uniqid()).'" alt="Product" class="img-responsive animate__animated animate__rubberBand animate__delay-2s" />
                    </div>
                    <div class="wsk-cp-text">
                        <div class="category">
                            <span>'.htmlspecialchars($tec->getMark()).'</span>
                        </div>
                        <div class="title-product">
                            <h3>'.htmlspecialchars($tec->getType()).'</h3>
                        </div>
                        <div class="description-prod">
                            <p>'.htmlspecialchars($tec->getModel()).'</p>
                        </div>
                        <div class="card-footer">
                            <div class=""><a href="?controller=moto&&action=detail&&id='.$tec->getId().'" class="buy-btn animate__animated animate__bounce animate__delay-3s">En savoir Plus</a></div>
                        </div>
                    </div>
                </div>
            </div>
            ');
    }
}else{
    echo ('<div class="d-flex justify-content-center">Pas de Moto dans la Base</div>');
}

?>



<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> </script>
</body>
</html>
