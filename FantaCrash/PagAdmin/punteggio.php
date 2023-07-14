<?php
include "../DataBase/DB_Rank.php";
include "../DataBase/DB_Monte.php";
include "../DataBase/DB_Voto.php";
include "../DataBase/DB_Address.php";
?>

<?php
    
    $now_crash = 0;
    $now_points = 0;

    $save_id = 0;

    $new_crash = 0;
    $new_points = 0;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST["InviaUtente1"])){
            $utenteCrash = $_POST["InviaUtente1"];

            $records = getdataR();

            foreach($records as $row){
                if($row->player == $utenteCrash){
                    $now_crash = $row->incidenti;
                    $save_id = $row->id;
                    break;
                }
            }

            unset($records);

            if(isset($_POST["NewCrashN"])){
                $new_crash = $_POST["NewCrashN"];
                $records = updateElementC($save_id, $new_crash);   
            }
            unset($records);
        }
        if(isset($_POST["InviaUtente2"])){
            $utentePoints = $_POST["InviaUtente2"];
            $records = getdataR();

            foreach($records as $row){
                if($row->player == $utentePoints){
                    $now_points = $row->punti;
                    $save_id = $row->id;
                    break;
                }
            }
            unset($records);

            if(isset($_POST["NewRankP"])){
                $new_points = $_POST["NewRankP"];
                $records = updateElementP($save_id, $new_points);   
            }
            unset($records);
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

<body class="overflow-hidden">
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
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-solid fa-person-falling-burst me-2"></i>Incidenti/Punteggio</a>
                <a href="pagamenti.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-shopping-cart me-2"></i>Pagamenti</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                    <h2 class="fs-2 m-0">Incidenti/Punteggio</h2>
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

            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <div class="row border rounded-5 p-3 bg-white shadow box-area mx-4">
                    
                    <div class="col-md-6 right-box" >
                        <form action="punteggio.php" method="post">
                            <div class="row align-items-center">
                                <div class="header-text mb-4">
                                    <h2>Gestione Incidenti</h2>
                                    <p>OH NO</p>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <label for="utenti" class="form-label"></label>
                                    <select id="utenti" name="InviaUtente1" class="form-select form-control form-control-lg bg-light fs-6 rounded">
                                        <option>Seleziona un partecipante</option>
                                        <?php
                                            $records = getdataR();

                                            if(isset($records )){
                                                foreach( $records as $row ) {
                                                    echo('<option>'.$row->player.'</option>');                                            
                                                }
                                            }
                                        ?> 
                                    </select> 
                                </div>
                                <div class="input-group mb-1">
                                    <input type="number" name="NewCrashN" class="form-control form-control-lg bg-light fs-6" placeholder="Nuovo N. Incidenti">
                                </div>
                                <div class="input-group mb-3 mt-2">
                                        <button type="submit" class="btn btn-lg btn-danger w-100 fs-6">Invia</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6 right-box">
                        <form action="punteggio.php" method="post"">
                            <div class="row align-items-center">
                                <div class="header-text mb-4">
                                    <h2>Gestione Punteggi</h2>
                                    <p>Non fare cazzate NANETTO</p>
                                </div>

                                
                                <div class="input-group mb-3">                 
                                    <label for="utenti" class="form-label"></label>
                                    <select id="utenti" name="InviaUtente2" class="form-select form-control form-control-lg bg-light fs-6 rounded">
                                        <option>Seleziona un partecipante</option>
                                        <?php
                                            $records = getdataR();

                                            if(isset($records )){
                                                foreach( $records as $row ) {
                                                    echo('<option>'.$row->player.'</option>');
                                                }
                                            }
                                        ?> 
                                    </select>  
                                </div>
                                
                                <div class="input-group mb-1">
                                    <input name="NewRankP" type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Nuovo Punteggio">
                                </div>
                                <div class="input-group mb-3 mt-2">
                                    <button class="btn btn-lg btn-danger w-100 fs-6">Invia</button>
                                </div>
                            </div>
                        </form>
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