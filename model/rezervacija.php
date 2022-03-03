<?php
class Rezervacija
{
    public $id;
    public $clan;
    public $knjiga;
    public $pisac;
    public $datum;
    public function __construct($id = null, $clan = null, $knjiga = null, $datum = null, $pisac = null)
    {
        $this->id = $id;
        $this->clan = $clan;
        $this->knjiga = $knjiga;
        $this->datum = $datum;
        $this->pisac = $pisac;
    }
    public static function vratiSveRezervacije(mysqli $conn)
    {

        $query = "SELECT * FROM rezervacija r  JOIN clan c ON(r.idClan=c.idClana)";
       
        $result=$conn->query($query) or die($conn->error);
        return $result;
    }
    public function obrisiR($conn,$id) {
        $query = "DELETE FROM rezervacija WHERE idR='".$id."'";
        $result = $conn->query($query) or die("Error in query2".$conn->error);
        return $result;
    }
    public function ubaciRezervaciju($data,$conn){
		
		if($data['clan'] === '' || $data['datum'] === '' || $data['knjiga'] === ''|| $data['pisac'] === ''){
		$this-> poruka ='Polja moraju biti popunjena';
		
		}else{
		
			$save=$conn->query("INSERT INTO rezervacija(knjiga,pisac,datum,id_clan) VALUES ('".$data['knjiga']."','".$data['pisac']."','".$data['datum']."','".$data['idClan']."')") or die($conn->error);
			
		}
	}
    
	
}
