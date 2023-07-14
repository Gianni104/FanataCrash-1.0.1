<?php
include "../DataBase/DB_Rank.php";
include "../DataBase/DB_Monte.php";
include "../DataBase/DB_Voto.php";
include "../DataBase/DB_Address.php";

$accessi = 0;
$incidenti = 0;
$montepremi = 0;

$records = getdataR();

if(isset($records )){
    foreach( $records as $row ) {
        $incidenti += $row->incidenti;
    }
}

unset($records);

$records = getdataMon();

if(isset($records)){
    foreach($records as $row){
        $montepremi += $row->importo;
    }
}

unset($records);

$records = getdataA();

if(isset($records)){
    foreach($records as $row){  
        if($accessi<$row->id){
            $accessi = $row->id;
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">    

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Admin Dashboard</title>
    <link rel="icon" href="../PagRegole/img/Loghi/Nanoso_Limited.png">

</head>

<body>
    <div class="d-flex" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fas fa-car-crash me-2"></i>FANTACRASH</div>
            <div class="list-group list-group-flush my-3">
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="card.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i>Card</a>
                <a href="punteggio.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-person-falling-burst me-2"></i>Incidenti/Punteggio</a>
                <a href="pagamenti.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-shopping-cart me-2"></i>Pagamenti</a>
                <a href="voti.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-comment-dots me-2"></i>Voti</a>
                <a href="http://gdp.kozow.com/FantaCrash/" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="http://gdp.kozow.com/FantaCrash/">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo("$accessi"); ?></h3>
                                <p class="fs-5">Accessi</p>
                            </div>
                            <i class="fas fa-users-rectangle fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">€ <?php echo("$montepremi"); ?></h3>
                                <p class="fs-5">Montepremi</p>
                            </div>
                            <i
                                class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo("$incidenti"); ?></h3>
                                <p class="fs-5">Incidenti</p>
                            </div>
                            <i class="fas fa-burst fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>  

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Accessi Recenti</h3>
                    <div class="col">
                        <div style="padding-bottom:56.25%; position:relative; display:block; width: 100%">
                            <iframe width="100%" height="100%" src="AccessLog.php" frameborder="0" allowfullscreen="" style="position:absolute; top:0; left: 0"></iframe>
                        </div>
                    </div>
                </div>

            </div>  
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>