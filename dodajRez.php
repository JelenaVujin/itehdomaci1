<?php
include 'broker.php';
include 'model/rezervacija.php';
include 'model/clan.php';
$clan=Clan::vratiSveClanove($conn);
if(isset($_POST['knjiga']) && isset($_POST['pisac']) && isset($_POST['datum']) && isset($_POST['idClan'])){
    $knjiga=$_POST['knjiga'];
    $pisac=$_POST['pisac'];
    $datum=$_POST['datum'];
    $clan=$_POST['idClan'];
    $niz=array(
        'knjiga'=>$knjiga,
        'pisac'=>$pisac,
        'datum'=>$datum,
        'idClan'=>$clan
    );
    $rezervacija=new Rezervacija(null,$knjiga,$pisac,$datum,$clan);
   
   $rezervacija->ubaciRezervaciju($niz,$conn);
    
    if($status){
        echo"Uspesno dodata rezervacija!";
        }else{
            echo "Nije moguce dodati rezervaciju!";
        }
}

?>