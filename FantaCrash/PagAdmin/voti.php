<?php
include "../DataBase/DB_Rank.php";
include "../DataBase/DB_Monte.php";
include "../DataBase/DB_Voto.php";
include "../DataBase/DB_Address.php";
?>

<?php
    if($_POST["scelta1"] != $_POST["scelta2"]){
        if($_POST["scelta1"] != $_POST["scelta3"]){
            if($_POST["scelta1"] != "Seleziona un partecipante"){
                if($_POST["scelta2"] != "Seleziona il cavallo" && $_POST["scelta3"] != "Seleziona il coniglio"){
                $votante = $_POST["scelta1"];
                $cavallo = $_POST["scelta2"];
                $coniglio = $_POST["scelta3"];
                $records = updatedataVoto($votante, $cavallo, $coniglio);
                } 
            }
        }
        else{
            echo "<script>alert('Non è possibile selezionare questo giocatore');</script>";
        }
    }
    else{
        echo "<script>alert('Non è possibile selezionare questo giocatore');</script>";
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

<body class="overflow">
    <div class="d-flex" id="wrapper" >
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <i class="fas fa-car-crash me-2"></i>FANTACRASH</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="card.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-project-diagram me-2"></i>Card</a>
                <a href="punteggio.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-person-falling-burst me-2"></i>Incidenti/Punteggio</a>
                <a href="pagamenti.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-shopping-cart me-2"></i>Pagamenti</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-sharp fa-solid fa-square-poll-vertical me-2"></i>Voti</a>
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
                    <h2 class="fs-2 m-0">Voti</h2>
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
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>  

            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <div class="row border rounded-5 p-3 bg-white shadow box-voti mx-4 mb-5">
                    
                    <div class="col-lg-6 right-box border-end" >
                        <div class="row align-items-center">
                            <div class="header-text mb-4">
                                <h2>Gestione Voti</h2>
                                <p>OH PIPO</p>
                            </div>
                            <form action="voti.php" method="post">
                                <div class="input-group mb-3">
                                        <label for="utenti" class="form-label"></label>
                                        <select name="scelta1" id="utenti" class="form-select form-control form-control-lg bg-light fs-6 rounded">
                                            <option>Seleziona un partecipante</option>
                                            <?php 
                                            unset($records);
                                            $records = getdataVoto();
                                            if(isset($records)){
                                                foreach($records as $row){
                                                echo('<option>'.$row->user.'</option>');
                                                }
                                            }
                                            unset($records);
                                            ?>
                                        </select>                                 
                                </div>
                                <div class="input-group mb-3">
                                    <label for="cavalli" class="form-label"></label>
                                    <select name="scelta2" id="cavalli" class="form-select form-control form-control-lg bg-light fs-6 rounded">
                                        <option>Seleziona il cavallo</option>
                                        <?php 
                                            $records = getdataVoto();
                                            if(isset($records)){
                                                foreach($records as $row){
                                                    echo('<option>'.$row->user.'</option>');
                                                }
                                            }
                                            unset($records);
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="conigli" class="form-label"></label>
                                    <select name="scelta3" id="conigli" class="form-select form-control form-control-lg bg-light fs-6 rounded">
                                        <option>Seleziona il coniglio</option>
                                        <?php 
                                            $records = getdataVoto();
                                            if(isset($records)){
                                                foreach($records as $row){
                                                    echo('<option>'.$row->user.'</option>');
                                                }
                                            }
                                            unset($records);
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <button class="btn btn-lg btn-danger w-100 fs-6">Invia</button>
                                </div>
                            </form>
                        </div>
                    </div>




                    <div class="col-lg-6 right-box">
                        <div class="row align-items-center">
                            <div class="header-text">
                                <h2>Gestione Voti</h2>
                                <p>Non fare cazzate NANETTO</p>
                            </div>
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <td scope="row">VOTANTE</td>
                                            <td>CAVALLO</td>
                                            <td>CONIGLIO</td>
                                        </tr>
                                        <?php 
                                            $records = getdataVoto();
                                            if(isset($records)){
                                                foreach($records as $row){
                                                    echo("<tr>");
                                                    echo('<td scope="col">'.$row->user.'</td>');
                                                    echo('<td scope="col">'.$row->cavallo.'</td>');
                                                    echo('<td scope="col">'.$row->coniglio.'</td>');
                                                    echo("</tr>");
                                                }
                                            }
                                            unset($records);
                                        ?>
                                </table>
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