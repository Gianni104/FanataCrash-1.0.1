<?php
   error_reporting(E_ALL & ~E_NOTICE); 
   session_start();
?>

<?php

function OpenPDOM()
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

function insertdataMon($giocatore, $orario, $soldi, $Descrizione)
{
   try
   {
   if( isset( $giocatore ) && isset( $soldi ) )
   {
	   $db = OpenPDO();  
	   if( isset( $db )) {
            $sql = "INSERT INTO montepremi (user, data, importo, descrizione) values (:val1, :val2, :val3, :val4 ) ";
            $scc = $db->prepare($sql);
            $scc->bindParam(':val1',$giocatore);
            $scc->bindParam(':val2',$orario);
            $scc->bindParam(':val3',$soldi);
            $scc->bindParam(':val4', $Descrizione);
            $result=$scc->execute();  
	   }  
   }
  } catch (Exception $e) {
     
        echo( $e);
  }
}

function getdataMon()
{
   $db = OpenPDO();  
   if( isset( $db )) {

	    $sql = "SELECT * from montepremi order by id DESC";
        $stmt=$db->prepare($sql);
        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
       
	  return $result;
   }  
}

function deletedataPay($id)
{
   $db = OpenPDO();  
   if( isset($id))
   {
      $sql = "DELETE FROM montepremi where ID = :val1 ";
      $scc = $db->prepare($sql);
      $scc->bindParam(':val1',$id);
      $result=$scc->execute();  
   }
}

?>