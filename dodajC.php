<?php
include 'broker.php';
include 'model/clan.php';


if(isset($_POST['imePrezime']) && isset($_POST['clanOd']) && isset($_POST['clanDo'])){
    $imeprezime=$_POST['imePrezime'];
    $clanod=$_POST['clanOd'];
    $clando=$_POST['clanDo'];
   $clan =new Clan(null,$imeprezime,$clanod,$clando);
    $status=Clan::dodajClana($clan,$conn);
    if($status){
        echo"Uspesno dodat clan!";
        }else{
            echo "Clan nije dodat!";
        }
}




?>