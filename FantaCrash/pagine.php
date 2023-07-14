<?php

function AccessPage(){
    header("Location: http://gdp.kozow.com/FantaCrash/");
    //header("Location: http://127.0.0.1/FantaCrash/");
}

function loadingPage(){
    header("Location: http://gdp.kozow.com/FantaCrash/PagCaricamento/check.php");
    //header("Location: http://127.0.0.1/FantaCrash/PagCaricamento/check.php");
}

function AdminPage(){
    header("Location: http://gdp.kozow.com/FantaCrash/PagAdmin/");
    //header("Location: http://127.0.0.1/FantaCrash/PagAdmin/");
}

function RulePage(){
    header("Location: http://gdp.kozow.com/FantaCrash/PagRegole");
    //header("Location: http://127.0.0.1/FantaCrash/PagCommon");
}

?>