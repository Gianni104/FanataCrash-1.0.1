<?php
   include "pagine.php";
   
   session_start();

   function dati(){
        $_SESSION["nome"] = $_POST["nome"];
        $_SESSION["pass"] = $_POST["pass"];
        $_SESSION["online"] = true;
   }

    $Ballerini_L = [
        "username" => "FatCEO",
        "password" => "admin"
    ];

    $Fiesoli_F = [
        "username" => "Fededj",
        "password" => "Fe14de11ri05co!"
    ];
    
    $Ceccarelli_L = [
        "username" => "Jeff",
        "password" => "Bezos"
    ];

    $Santarelli_F = [
        "username" => "fili06",
        "password" => "f28102006"
    ];

    $Santini_A = [
        "username" => "Santo19741",
        "password" => "cadi"
    ];

    $Fiesoli_D = [
        "username" => "acquilone_invasore",
        "password" => "Ronesexyporcoilpapa"
    ];

    $Pozzi_M = [
        "username" => "sbrugna",
        "password" => "hostatoio2"
    ];

    $Grandi_A = [
        "username" => "infinite_racist",
        "password" => "andreag05"
    ];

    $Ummmaro_G = [
        "username" => "testabanano",
        "password" => "Grandiscoppiato69"
    ];

    $tutorial_Ins = [
        "username" => "Tutorial",
        "password" => "Tutorial"
    ];

    $MaxAdministrator = [
        "username" => "admin",
        "password" => "TWF4QWRtaW5pc3RyYXRvcg=="
    ];

    if($_POST["nome"] == $MaxAdministrator["username"]){
        if($MaxAdministrator["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Loghi/Nanoso_Limited.png";
            $_SESSION["user_LG"] = "img/Loghi/Max_A_LG.png";
            AdminPage();
        }
        else{
            AccessPage(); 
        }
    }
    
    else if($_POST["nome"] == $tutorial_Ins["username"]){
        if($tutorial_Ins["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Loghi/Nanoso_Limited.png";
            $_SESSION["user_LG"] = "img/Loghi/Max_A_LG.png";
            LoadingPage();
        }
        else{
            AccessPage(); 
        }
    }

    else if ($_POST["nome"] == $Ballerini_L["username"]){
        if($Ballerini_L["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Profile/Ballerini_L_IMG.jpeg";
            $_SESSION["user_LG"] = "img/Loghi/Ballerini_L_LG.png";
            LoadingPage();
        }
        else{
            AccessPage(); 
        }
    }
    else if($_POST["nome"] == $Fiesoli_F["username"]){
        if($Fiesoli_F["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Profile/Fiesoli_F_IMG.jpg";
            $_SESSION["user_LG"] = "img/Loghi/Fiesoli_F_LG.png";
            LoadingPage();
        }
        else{
            AccessPage();
        }
    }
    else if($_POST["nome"] == $Ceccarelli_L["username"]){
        if($Ceccarelli_L["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Profile/Ceccarelli_L_IMG.jpeg";
            $_SESSION["user_LG"] = "img/Loghi/Ceccarelli_L_LG.png";
            LoadingPage();
           
        }
        else{
            AccessPage();
        }
    }

    else if($_POST["nome"] == $Santarelli_F["username"]){
        if($Santarelli_F["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Profile/Santarelli_F_IMG.jpeg";
            $_SESSION["user_LG"] = "img/Loghi/Santarelli_F_LG.png";
            LoadingPage();
           
        }
        else{
            AccessPage();
        }
    }

    else if($_POST["nome"] == $Santini_A["username"]){
        if($Santini_A["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Profile/Santini_A_IMG.jpg";
            $_SESSION["user_LG"] = "img/Loghi/Santini_A_LG.png";
            LoadingPage();
           
        }
        else{
            AccessPage();
        }
    }

    else if($_POST["nome"] == $Fiesoli_D["username"]){
        if($Fiesoli_D["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Profile/Fiesoli_D_IMG.jpeg";
            $_SESSION["user_LG"] = "img/Loghi/Fiesoli_D_LG.png";
            LoadingPage();
           
        }
        else{
            AccessPage();
        }
    }

    else if($_POST["nome"] == $Pozzi_M["username"]){
        if($Pozzi_M["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Profile/Pozzi_M_IMG.jpeg";
            $_SESSION["user_LG"] = "img/Loghi/Pozzi_M_LG.png";
            LoadingPage();
           
        }
        else{
            AccessPage();
        }
    }

    else if ($_POST["nome"] == $Ummmaro_G["username"]){
        if($$Ummmaro_G["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Profile/Ummaro_G_IMG.png";
            $_SESSION["user_LG"] = "img/Loghi/Ummaro_G_LG.png";
            LoadingPage();
        }
        else{
            AccessPage(); 
        }
    }

    else if($_POST["nome"] == $Grandi_A["username"]){
        if($Grandi_A["password"] == $_POST["pass"]){
            dati();
            $_SESSION["user_IMG"] = "img/Profile/Grandi_A_IMG.jpeg";
            $_SESSION["user_LG"] = "img/Loghi/Grandi_A_LG.png";
            LoadingPage();
           
        }
        else{
            AccessPage();
        }
    }
    
    else{
        AccessPage();
    }


?>
