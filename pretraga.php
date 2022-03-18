<?php
 include 'broker.php';
 
 $upit1="SELECT * FROM rezervacija r JOIN clan c ON c.idClan=r.idClan WHERE r.knjiga LIKE '%".$_POST['knjiga']."%'" ;
 
 
 $rezultat=mysqli_query($conn,$upit1);
if(mysqli_num_rows($rezultat)>0){
    while($r=mysqli_fetch_assoc($rezultat)){
      
      
        echo "<tr>
        <td></td>
        <td></td>  
        <td> ".$r['imePrezime']."</td>
        <td>".$r['knjiga']."</td>
        <td>".$r['pisac']."</td>
        <td>".$r['datum']."</td>
        </tr>";
      
       
    }
}else{
    echo "<tr><td>Nema pronadjenih rezervacija na osnovu knjige!</td></tr>";
}


?>