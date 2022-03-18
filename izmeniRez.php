<?php
include 'broker.php';
if(isset($_POST['id'])){
$knjiga=$_POST['knjiga'];
$pisac=$_POST['pisac'];
$datum=$_POST['datum'];
$idClan=$_POST['idClan'];
$id=$_POST['id'];

    $upit="UPDATE rezervacija SET knjiga='$knjiga',pisac='$pisac',datum='$datum',idClan='$idClan'
     WHERE idR='$id'";
     $rezultat = mysqli_query($conn,$upit);
    
     if($rezultat) {
         echo "URA";
         } 
}else{
    echo "NO";
}

?>