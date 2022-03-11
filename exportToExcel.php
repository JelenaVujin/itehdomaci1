<?php
include 'broker.php';
include 'model/rezervacija.php';
$rezervacija= Rezervacija::vratiSveRezervacije($conn);
$html="<table><tr><td>Clan</td><td>Knjiga</td><td>Pisac</td><td>Datum</td></tr>";
foreach($rezervacija as $r){
    $html.='<tr><td>'.$r["imePrezime"].'</td><td>'.$r["knjiga"].'</td><td>'.$r["pisac"].'</td><td>'.$r["datum"].'</td></tr>';
    
}
$html.='</table>';
header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=clanovi.xls');
echo $html;

?>