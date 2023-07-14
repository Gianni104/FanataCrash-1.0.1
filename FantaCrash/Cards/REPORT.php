<?php
    include "../DataBase/DB_Crash.php";

    session_start();

        if( !isset($_SESSION["online"]) || $_SESSION["online"] == false){
            AccessPage();
            }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Card</title>
    <style>

        .inputImg:hover{
            transform: scale(1.1);
        }

        input[type="file"] {
            display: none;
        }

        body::-webkit-scrollbar {
            width:10px;
        }

        /*track*/
        body::-webkit-scrollbar-track {
            background:transparent;
        }

        /*thumb*/
        body::-webkit-scrollbar-thumb {
            background: #fa5757;  
            border-radius:10px;
        }  

    </style>
</head> 

<?php
   if( isset($_SESSION['error']))
   echo($_SESSION['error']);
?>

<body style="overflow-x: hidden;">

        <div class="container-fluid d-flex flex-column align-items-center justify-content-center">
            <?php
                $records = getdata();

                if(isset($records ))
                {
                    foreach( $records as $row ) { 
                    echo('<div class="card text-white border border-dark display-fluid text-center mb-4 bg-danger" style=" width: 250px;">');
                    echo('<img src="data:image/jpeg;base64,'. $row->IMG . '" class="card-img-top rounded" style="height: 200px; width: 248px;" >');
                    echo('<div class="card-body border border-dark text-black">');
                    echo('<h5 class="card-title text-white">'."Autore: ".$row->UserID.'</h5>');
                    echo('<p class="card-text text-white">'.$row->Descrizione.'</p>');
                    echo('</div>');
                    echo('</div>');
                    }
                }
            ?>
        </div>
    
    

   
                          
</body>
</html>