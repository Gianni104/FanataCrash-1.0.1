<?php
    session_start();

        if( !isset($_SESSION["online"]) || $_SESSION["online"] == false){
            AccessPage();
            }
?>

<?php 

    include "../DataBase/DB_Crash.php";

   if(isset($_POST["submit"]))
    {
        if( isset($_FILES["fileToUpload"]["tmp_name"]) && !empty($_FILES["fileToUpload"]["tmp_name"]) && (isset($_POST["fileDesc"]) && !empty($_POST["fileDesc"])))
        {
            unset($_SESSION['error']);
            $target_file = ($_FILES["fileToUpload"]["tmp_name"]);
            $_SESSION['error'] = insertdata( uniqid(), base64_encode(file_get_contents( $target_file)), $_POST["fileDesc"], $_SESSION["nome"]);
        }
    }

    unset($_POST["submit"]);

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
    <title>Report Incidenti</title>
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
                    <i class="fa-sharp fa-solid fa-pen-ruler me-2"></i>Regole</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-sharp fa-solid fa-newspaper me-2"></i>Card</a>
                <a href="classifica.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fa-sharp fa-solid fa-ranking-star me-2"></i></i>Classifica</a>
                <a href="pagamenti.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                    <h2 class="fs-2 m-0">Card</h2>
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
                       
                            <div class="row border rounded-5 p-3 bg-white shadow box-area mx-4 mb-5">
                                <div class="col-md-6 right-box border-end">
                                    <div class="row align-items-center">
                                        <div class="header-text mb-4">
                                            <h2>Aggiungi Card</h2>
                                            <p>Inserire l'immagine dell'incidente e una descrizione</p>
                                        </div>
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                                        <div class="input-group mb-3">
                                            <input id="file-upload" type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
                                            <label for="file-upload" id="inputImg-label" for="inputImg"  class="form-label"></label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <textarea name="fileDesc" class="form-control rounded bg-body-secondary"  style="resize: none;" placeholder="Descrizione Incidente.." required></textarea>
                                        </div>
                                        
                                        <div class="input-group mb-3">
                                            <button type="submit" value="Upload" name="submit" class="btn btn-lg btn-danger w-100 fs-6">Invia</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                

                        <div class="col-md-6 right-box" id="col2" >                      
                            <div style="padding-bottom:56.25%; position:relative; display:block; width: 100%; height:100%">
                                <iframe width="100%" height="100%" src="../Cards/REPORT.php" frameborder="0" allowfullscreen="" style="position:absolute; top:0; left: 0"></iframe>
                            </div>
                        </div>                 
                    </div>
                </div> 
            </div>
        </div>
    <!-- /#page-content-wrapper -->

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