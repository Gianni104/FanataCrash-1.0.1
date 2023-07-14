<?php
   error_reporting(E_ALL & ~E_NOTICE); 
   session_start();
?>

<?php

function OpenPDO()
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
/*
function insertdata($player, $punti)
{
   try
   {
   if( isset( $player ) && isset( $punti ) )
   {
	   $db = OpenPDO();  
	   if( isset( $db )) {
            $sql = "INSERT INTO rank (player, punti) values (:play, :points ) ";
            $scc = $db->prepare($sql);
            $scc->bindParam(':play',$giocatore);
            $scc->bindParam(':points',$punteggio);
            $result=$scc->execute();  
	   }  
   }
  } catch (Exception $e) {
     
        echo( $e);
  }
}
*/
function getdataR()
{
   $db = OpenPDO();  
   if( isset( $db )) {

	    $sql = "SELECT * from rank order by punti DESC";
        $stmt=$db->prepare($sql);
        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
       
	  return $result;
   }  
}

function getdataC()
{
   $db = OpenPDO();  
   if( isset( $db )) {

	    $sql = "SELECT * from rank order by incidenti DESC";
        $stmt=$db->prepare($sql);
        $stmt->execute(); 
        $result = $stmt->fetchAll(PDO::FETCH_OBJ); 
       
	  return $result;
   }  
}

function updatedataPunti($idR, $punteggio,)
{
   if( isset( $id ))
   {
	   $db = OpenPDO();  
	   if( isset( $db )) {
	   
		 $sql = "UPDATE rank SET punti=:puntt where id=:plid";
		 $scc = $db->prepare($sql);
		 $scc->bindParam(':plid',$idR);
       $scc->bindParam(':puntt',$punteggio);
		 $result=$scc->execute();  
	   }  
   }
}

function updatedataCrash($idR, $crashR,)
{
   if( isset( $id ))
   {
	   $db = OpenPDO();  
	   if( isset( $db )) {
	   
		 $sql = "UPDATE rank SET incidenti=:crr where id=:plid";
		 $scc = $db->prepare($sql);
		 $scc->bindParam(':plid',$idR);
       $scc->bindParam(':crr',$crashR);
		 $result=$scc->execute();  
	   }  
   }
}

function updateElementC($id, $newData) {
   try {
      $db = OpenPDO();

      $sql = "UPDATE rank SET incidenti = :val1 WHERE id = :id";
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':val1', $newData, PDO::PARAM_INT);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();

      return true; // Aggiornamento riuscito
   } catch (PDOException $e) {
      echo "Errore durante l'aggiornamento dell'elemento: " . $e->getMessage();
      return false; // Aggiornamento fallito
   }
}

function updateElementP($id, $newData) {
   try {
      $db = OpenPDO();

      $sql = "UPDATE rank SET punti = :val1 WHERE id = :id";
      $stmt = $db->prepare($sql);
      $stmt->bindParam(':val1', $newData, PDO::PARAM_INT);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();

      return true; // Aggiornamento riuscito
   } catch (PDOException $e) {
      echo "Errore durante l'aggiornamento dell'elemento: " . $e->getMessage();
      return false; // Aggiornamento fallito
   }
}



?>