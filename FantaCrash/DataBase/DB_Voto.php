<?php
   error_reporting(E_ALL & ~E_NOTICE); 
   session_start();
?>

<?php

function OpenPDOV()
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

function updatedataVoto($votante, $cavallo, $coniglio)
{
   if( isset( $votante ))
   {
	   $db = OpenPDO();  
	   if( isset( $db )) {
	   
		 $sql = "UPDATE voto SET cavallo=:val2, coniglio=:val3 where user=:val1";
		 $scc = $db->prepare($sql);
		 $scc->bindParam(':val1',$votante);
       $scc->bindParam(':val2',$cavallo);
       $scc->bindParam(':val3',$coniglio);
		 $result=$scc->execute();  
	   }  
   }
}

function getdataVoto()
{
   $db = OpenPDO();  
   if( isset( $db )) {

	    $sql = "SELECT * from voto order by id asc";
        $stmt=$db->prepare($sql);
        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
       
	  return $result;
   }  
}

?>