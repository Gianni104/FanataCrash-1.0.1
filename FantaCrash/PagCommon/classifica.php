<?php
    session_start();

    if( !isset($_SESSION["online"]) || $_SESSION["online"] == false){
        AccessPage();
    }

    $posizioni = array();

    $posizioni[0] = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-1-square-fill" viewBox="0 0 16 16"> <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm7.283 4.002V12H7.971V5.338h-.065L6.072 6.656V5.385l1.899-1.383h1.312Z"/> </svg>';
    $posizioni[1] = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-2-square" viewBox="0 0 16 16"> <path d="M6.646 6.24v.07H5.375v-.064c0-1.213.879-2.402 2.637-2.402 1.582 0 2.613.949 2.613 2.215 0 1.002-.6 1.667-1.287 2.43l-.096.107-1.974 2.22v.077h3.498V12H5.422v-.832l2.97-3.293c.434-.475.903-1.008.903-1.705 0-.744-.557-1.236-1.313-1.236-.843 0-1.336.615-1.336 1.306Z"/> <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/> </svg>';
    $posizioni[2] = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-3-square" viewBox="0 0 16 16"> <path d="M7.918 8.414h-.879V7.342h.838c.78 0 1.348-.522 1.342-1.237 0-.709-.563-1.195-1.348-1.195-.79 0-1.312.498-1.348 1.055H5.275c.036-1.137.95-2.115 2.625-2.121 1.594-.012 2.608.885 2.637 2.062.023 1.137-.885 1.776-1.482 1.875v.07c.703.07 1.71.64 1.734 1.917.024 1.459-1.277 2.396-2.93 2.396-1.705 0-2.707-.967-2.754-2.144H6.33c.059.597.68 1.06 1.541 1.066.973.006 1.6-.563 1.588-1.354-.006-.779-.621-1.318-1.541-1.318Z"/> <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/> </svg>';
    $posizioni[3] = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-4-square" viewBox="0 0 16 16"> <path d="M7.519 5.057c.22-.352.439-.703.657-1.055h1.933v5.332h1.008v1.107H10.11V12H8.85v-1.559H4.978V9.322c.77-1.427 1.656-2.847 2.542-4.265ZM6.225 9.281v.053H8.85V5.063h-.065c-.867 1.33-1.787 2.806-2.56 4.218Z"/> <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/> </svg>';
    $posizioni[4] = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-5-square" viewBox="0 0 16 16"> <path d="M7.994 12.158c-1.57 0-2.654-.902-2.719-2.115h1.237c.14.72.832 1.031 1.529 1.031.791 0 1.57-.597 1.57-1.681 0-.967-.732-1.57-1.582-1.57-.767 0-1.242.45-1.435.808H5.445L5.791 4h4.705v1.103H6.875l-.193 2.343h.064c.17-.258.715-.68 1.611-.68 1.383 0 2.561.944 2.561 2.585 0 1.687-1.184 2.806-2.924 2.806Z"/> <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/> </svg>';
    $posizioni[5] = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-6-square" viewBox="0 0 16 16"> <path d="M8.21 3.855c1.612 0 2.515.99 2.573 1.899H9.494c-.1-.358-.51-.815-1.312-.815-1.078 0-1.817 1.09-1.805 3.036h.082c.229-.545.855-1.155 1.98-1.155 1.254 0 2.508.88 2.508 2.555 0 1.77-1.218 2.783-2.847 2.783-.932 0-1.84-.328-2.409-1.254-.369-.603-.597-1.459-.597-2.642 0-3.012 1.248-4.407 3.117-4.407Zm-.099 4.008c-.92 0-1.564.65-1.564 1.576 0 1.032.703 1.635 1.558 1.635.868 0 1.553-.533 1.553-1.629 0-1.06-.744-1.582-1.547-1.582Z"/> <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/> </svg>';
    $posizioni[6] = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-7-square" viewBox="0 0 16 16"> <path d="M5.37 5.11V4.001h5.308V5.15L7.42 12H6.025l3.317-6.82v-.07H5.369Z"/> <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/> </svg>';
    $posizioni[7] = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-8-square" viewBox="0 0 16 16"> <path d="M10.97 9.803c0 1.394-1.218 2.355-2.988 2.355-1.763 0-2.953-.955-2.953-2.344 0-1.271.95-1.851 1.647-2.003v-.065c-.621-.193-1.33-.738-1.33-1.781 0-1.225 1.09-2.121 2.66-2.121s2.654.896 2.654 2.12c0 1.061-.738 1.595-1.336 1.782v.065c.703.152 1.647.744 1.647 1.992Zm-4.347-3.71c0 .739.586 1.255 1.383 1.255s1.377-.516 1.377-1.254c0-.733-.58-1.23-1.377-1.23s-1.383.497-1.383 1.23Zm-.281 3.645c0 .838.72 1.412 1.664 1.412.943 0 1.658-.574 1.658-1.412 0-.843-.715-1.424-1.658-1.424-.944 0-1.664.58-1.664 1.424Z"/> <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/> </svg>';
    $posizioni[8] = '<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-9-square" viewBox="0 0 16 16"><path d="M7.777 12.146c-1.593 0-2.425-.89-2.52-1.798h1.296c.1.357.539.72 1.248.72 1.36 0 1.88-1.353 1.834-3.023h-.076c-.235.627-.873 1.184-1.934 1.184-1.395 0-2.566-.961-2.566-2.666 0-1.711 1.242-2.731 2.87-2.731 1.512 0 2.971.867 2.971 4.014 0 2.836-1.02 4.3-3.123 4.3Zm.118-3.972c.808 0 1.535-.528 1.535-1.594s-.668-1.676-1.56-1.676c-.838 0-1.517.616-1.517 1.659 0 1.072.708 1.61 1.54 1.61Z"/><path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2Zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2Z"/></svg>';
    $posizioni[9] = '';
    $posizioni[10] = '';
    $posizioni[11] = '';
    $posizioni[12] = '';
    $posizioni[13] = '';
    $posizioni[14] = '';

        

    include "../DataBase/DB_Rank.php";
    include "../DataBase/DB_Monte.php";
    include "../DataBase/DB_Voto.php";

    $records = getdataR();
    $array_img = array();
    $array_user = array();
    $array_punti = array();
    $array_incidenti = array();

    $totale = 0;

            if(isset($records ))
            {
               foreach( $records as $row ) {
                $array_user[] = $row->player;
                $array_punti[] = $row->punti;
                $array_incidenti[] = $row->incidenti;

                if($row->player == "Jeff"){
                    $array_img[] = "../PagCommon/img/Profile/Ceccarelli_L_IMG.jpeg";
                }
                else if($row->player == "FatCEO"){
                    $array_img[] = "../PagCommon/img/Profile/Ballerini_L_IMG.jpeg";
                }
                else if($row->player == "Fededj"){
                    $array_img[] = "../PagCommon/img/Profile/Fiesoli_F_IMG.jpg";
                }
                else if($row->player == "sbrugna"){
                    $array_img[] = "../PagCommon/img/Profile/Pozzi_M_IMG.jpeg";
                }
                else if($row->player == "infinite_racist"){
                    $array_img[] = "../PagCommon/img/Profile/Grandi_A_IMG.jpeg";
                }
                else if($row->player == "acquilone_invasore"){
                    $array_img[] = "../PagCommon/img/Profile/Fiesoli_D_IMG.jpeg";
                }
                else if($row->player == "Santo19741"){
                    $array_img[] = "../PagCommon/img/Profile/Santini_A_IMG.jpg";
                }
                else if($row->player == "fili06"){
                    $array_img[] = "../PagCommon/img/Profile/Santarelli_F_IMG.jpeg";
                }
                else if($row->player == "testabanano"){
                    $array_img[] = "../PagCommon/img/Profile/Ummaro_G_IMG.png";
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
    <title>Classfica FantaCrash</title>
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
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
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
                    <h2 class="fs-2 m-0">Classifica</h2>
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
                    
                    <div class="col-md-6 right-box border-end" >
                        <div class="row align-items-center">
                            <div class="header-text mb-4">
                                <h2>Punti</h2>
                            </div>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[0]); ?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                        <p> <img src="<?php echo($array_img[0]) ?>"class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[0]." - ".$array_punti[0]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[1]); ?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                        <p> <img src="<?php echo($array_img[1]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[1]." - ".$array_punti[1]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[2]); ?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                        <p> <img src="<?php echo($array_img[2]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[2]." - ".$array_punti[2]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[3]); ?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                        <p> <img src="<?php echo($array_img[3]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[3]." - ".$array_punti[3]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[4]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                        <p> <img src="<?php echo($array_img[4]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[4]." - ".$array_punti[4]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[5]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                        <p> <img src="<?php echo($array_img[5]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[5]." - ".$array_punti[5]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[6]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                        <p> <img src="<?php echo($array_img[6]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[6]." - ".$array_punti[6]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[7]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                        <p> <img src="<?php echo($array_img[7]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[7]." - ".$array_punti[7]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[8]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                        <p> <img src="<?php echo($array_img[8]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[8]." - ".$array_punti[8]) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                        $records = getdataC();

                        $array_img = array();
                        $array_user = array();
                        $array_punti = array();
                        $array_incidenti = array();

                        if(isset($records ))
                        {
                            foreach( $records as $row ) {
                                $array_user[] = $row->player;
                                $array_punti[] = $row->punti;
                                $array_incidenti[] = $row->incidenti;

                            if($row->player == "Jeff"){
                                $array_img[] = "../PagCommon/img/Profile/Ceccarelli_L_IMG.jpeg";
                            }
                            else if($row->player == "FatCEO"){
                                $array_img[] = "../PagCommon/img/Profile/Ballerini_L_IMG.jpeg";
                            }
                            else if($row->player == "Fededj"){
                                $array_img[] = "../PagCommon/img/Profile/Fiesoli_F_IMG.jpg";
                            }
                            else if($row->player == "sbrugna"){
                                $array_img[] = "../PagCommon/img/Profile/Pozzi_M_IMG.jpeg";
                            }
                            else if($row->player == "infinite_racist"){
                                $array_img[] = "../PagCommon/img/Profile/Grandi_A_IMG.jpeg";
                            }
                            else if($row->player == "acquilone_invasore"){
                                $array_img[] = "../PagCommon/img/Profile/Fiesoli_D_IMG.jpeg";
                            }
                            else if($row->player == "Santo19741"){
                                $array_img[] = "../PagCommon/img/Profile/Santini_A_IMG.jpg";
                            }
                            else if($row->player == "fili06"){
                                $array_img[] = "../PagCommon/img/Profile/Santarelli_F_IMG.jpeg";
                            }
                            else if($row->player == "testabanano"){
                                $array_img[] = "../PagCommon/img/Profile/Ummaro_G_IMG.png";
                                }
                            }   
                        }
                    ?>

                    <div class="col-md-6 right-box">
                        <div class="row">
                            <div class="header-text mb-4">
                                <h2>Incidenti</h2>
                            </div>
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[0]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                    <p> <img src="<?php echo($array_img[0]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[0]." - ".$array_incidenti[0]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[1]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                    <p> <img src="<?php echo($array_img[1]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[1]." - ".$array_incidenti[1]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[2]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                    <p> <img src="<?php echo($array_img[2]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[2]." - ".$array_incidenti[2]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[3]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                    <p> <img src="<?php echo($array_img[3]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[3]." - ".$array_incidenti[3]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[4]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                    <p> <img src="<?php echo($array_img[4]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[4]." - ".$array_incidenti[4]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[5]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                    <p> <img src="<?php echo($array_img[5]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[5]." - ".$array_incidenti[5]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[6]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                    <p> <img src="<?php echo($array_img[6]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[6]." - ".$array_incidenti[6]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[7]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                    <p> <img src="<?php echo($array_img[7]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[7]." - ".$array_incidenti[7]) ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <?php echo($posizioni[8]);?>
                                    </div>
                                    <div class="col-9 d-flex justify-content-start">
                                    <p> <img src="<?php echo($array_img[8]); ?>" class="rounded-circle me-2" style="height: 40px; width: 40px;"><?php echo($array_user[8]." - ".$array_incidenti[8]) ?></p>
                                    </div>
                                </div>                               
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