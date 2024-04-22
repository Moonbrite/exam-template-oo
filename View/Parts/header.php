<?php
if (!isset($_SESSION)){
    session_start();
}
?>
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
            <a class="navbar-brand" href="index.php?controller=moto&action=list">
                <img src="Public/Img/logo-nav.png" alt="Bootstrap" width="50" height="50">
            </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a style="color: white" class="nav-link active" aria-current="page" href="index.php?controller=moto&action=list">Home</a>
                </li>
                <?php
                if (!array_key_exists("user",$_SESSION)){
                    echo ('<li class="nav-item">
                    <a style="color: white" class="nav-link" href="index.php?controller=security&action=login">Connection</a>
                </li>');
                }
                ?>

                <?php
                if (array_key_exists("user",$_SESSION)){
                    echo (' <li class="nav-item">
                    <a style="color: white" class="nav-link" href="index.php?controller=security&action=logout">Se déconnecter</a>
                </li>');
                }
                ?>
                <li class="nav-item dropdown">
                    <a style="color: white" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Types de motos
                    </a>
                    <ul class="dropdown-menu">
                        <?php
                        foreach (Moto::$allwoedType as $type){
                            echo('<li><a class="dropdown-item" href="index.php?controller=moto&action=sort&type='.$type.'">'.$type.'</a></li>');
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>