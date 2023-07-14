<?php
    session_start();

    $totale = 0;

        if( !isset($_SESSION["online"]) || $_SESSION["online"] == false){
            AccessPage();
            }         
  include "../DataBase/DB_Rank.php";
  include "../DataBase/DB_Monte.php";
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
    <title>Montepremi FantaCrash</title>
    <link rel="icon" href="img/Loghi/Nanoso_Limited.png">
</head>

<body class="overflow">
    <div class="d-flex" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fas fa-car-crash me-2"></i>FANTACRASH</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fa-sharp fa-solid fa-pen-ruler me-2"></i>Common</a>
                <a href="card_new.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-sharp fa-solid fa-newspaper me-2"></i>Card</a>
                <a href="classifica.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-sharp fa-solid fa-ranking-star me-2"></i></i>Classifica</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-sharp fa-solid fa-money-bill-wave me-2"></i>Pagamenti</a>
                <a href="../" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                    <i class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Pagamenti</h2>
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
                                <i class="fas fa-user me-2"></i><?php echo($_SESSION["nome"]); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="../">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>  

            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <div class="row border rounded-5 p-3 bg-white shadow box-area mx-4 mb-5" >
                    
                    <div class="col-md-12 right-box py-2"  >
                        <div class="container text-center rounded text-black position-relative" style="overflow-y: auto;" id="boxp">
                        
                        <?php
                            $records = getdataMon();

                            if(isset($records ))
                            {
                                foreach( $records as $row ) {
                                echo('<div class="row mt-2 pt-2 border-bottom pb-2 ">');
                                echo('<div class="col-5 d-flex align-items-center flex-coloumn">');
                                echo('<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16"> <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/> <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/> </svg>');
                                echo('<p class="ms-2 mb-0" data-bs-toggle="tooltip" data-bs-title="'.$row->descrizione.'" data-bs-placement="right">€ '.$row->importo.' <br> '.$row->data.'</p>');
                                echo('</div>');

                                if($row->user== "Jeff"){
                                    $immagineGIO = "../PagCommon/img/Profile/Ceccarelli_L_IMG.jpeg";
                                }
                                else if($row->user == "FatCEO"){
                                    $immagineGIO = "../PagCommon/img/Profile/Ballerini_L_IMG.jpeg";
                                }
                                else if($row->user == "Fededj"){
                                    $immagineGIO = "../PagCommon/img/Profile/Fiesoli_F_IMG.jpg";
                                }
                                else if($row->user == "sbrugna"){
                                    $immagineGIO = "../PagCommon/img/Profile/Pozzi_M_IMG.jpeg";
                                }
                                else if($row->user == "infinite_racist"){
                                    $immagineGIO = "../PagCommon/img/Profile/Grandi_A_IMG.jpeg";
                                }
                                else if($row->user == "acquilone_invasore"){
                                    $immagineGIO = "../PagCommon/img/Profile/Fiesoli_D_IMG.jpeg";
                                }
                                else if($row->user == "Santo19741"){
                                    $immagineGIO = "../PagCommon/img/Profile/Santini_A_IMG.jpg";
                                }
                                else if($row->user == "fili06"){
                                    $immagineGIO = "../PagCommon/img/Profile/Santarelli_F_IMG.jpeg";
                                }
                                else if($row->user == "testabanano"){
                                    $immagineGIO = "../PagCommon/img/Profile/Santarelli_F_IMG.png";
                                }

                                echo('<div class="col-4 ms-auto">');
                                echo('<img src="'.$immagineGIO.'" class="rounded-circle me-2" style="height: 25px; width: 25px;">');
                                echo('<p class="text-truncate" style="font-size: smaller;" class="mb-0">'.$row->user." ID: ".$row->id.'</p>');
                                echo('</div>');
                                echo('</div>');

                                $totale +=$row->importo;
                                }
                            }
                        ?>

                        </div>
                        <div class="container bottom-0 border border-white rounded mt-3">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-start">
                                    <?php
                                        echo('<h3 class="ms-3">TOTALE: €'.$totale.'</h3>');
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>  
        <!-- /#page-content-wrapper -->
    </div>
    
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>