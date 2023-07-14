<?php
    include "../pagine.php";
    error_reporting(E_ALL & ~E_NOTICE); 
    session_start();
?>

<?php

        if( !isset($_SESSION["online"]) || $_SESSION["online"] == false){
                AccessPage();
            }
?>

<?php

    function OpenPDOP()
    {
    $dsn = 'mysql:dbname=fantacrash;host=127.0.0.1';
    $user = $_SESSION["nome"]; 
    $password = $_SESSION["pass"] ; 
    $db = new PDO($dsn, $user, $password);
    if($db === false){
        
        $_SESSION["error"] = "ERROR: Could not connect.<br>" . mysqli_connect_error()."<br>";
    }
    return $db;
    }
    
    function insertdataLOG( $utente, $password, $orario, $indirizzo)
    {
        try
        {
            
                $db = OpenPDOP();  
                if( isset( $db )) {
            
                    $sql = "INSERT INTO logaddress ( user, PassW, orario, indirizzo) values ( :Utente, :pss, :Temp, :Addr) ";
                    $scc = $db->prepare($sql);
                    $scc->bindParam(':Utente',$utente);
                    $scc->bindParam(":pss",$password);
                    $scc->bindParam(':Temp',$orario);
                    $scc->bindParam(':Addr',$indirizzo);
                    $result=$scc->execute();  
                }  
            
        } 
        catch (Exception $e) {
            echo( $e);
        }
    }

function getdataA()
{
   $db = OpenPDOP();  
   if( isset( $db )) {

	    $sql = "SELECT * from logaddress order by id DESC";
        $stmt=$db->prepare($sql);
        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
       
	  return $result;
   }  
}

?>
