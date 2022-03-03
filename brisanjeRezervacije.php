<?php
include "broker.php";
include "model/rezervacija.php";

if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn,$_GET['id']);
        
        $rezerv=new Rezervacija();
        $status=$rezerv->obrisiR($conn,$id);
        if ($status){
            echo '<script>window.location.href="home.php";</script>';
        }
}
    





 ?>