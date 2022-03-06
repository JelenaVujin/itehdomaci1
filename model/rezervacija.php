<?php

class Rezervacija
{
    public $id;
    public $clan;
    public $knjiga;
    public $pisac;
    public $datum;
    public function __construct($id = null, $knjiga = null, $pisac = null, $datum = null, $clan = null)
    {
        $this->id = $id;
        $this->clan = $clan;
        $this->knjiga = $knjiga;
        $this->datum = $datum;
        $this->pisac = $pisac;
    }
    public static function vratiSveRezervacije(mysqli $conn)
    {

        $query = "SELECT * FROM rezervacija r  JOIN clan c ON(r.idClan=c.idClan)";
       
        $result=$conn->query($query) or die($conn->error);
        return $result;
    }
    public function obrisiR($conn,$id) {
        $query = "DELETE FROM rezervacija WHERE idR='".$id."'";
        $result = $conn->query($query) or die("Error in query2".$conn->error);
        return $result;
    }
    public function ubaciRezervaciju($r,$conn){
		$upit="INSERT INTO rezervacija (knjiga,pisac,datum,idClan) VALUES ('".$r['knjiga']."','".$r['pisac']."','".$r['datum']."','".$r['idClan']."')";
        
		$result=$conn->query($upit);
        return $result;
		
			
		
	
    }
	
}
