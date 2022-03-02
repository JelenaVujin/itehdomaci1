<?php
class Rezervacija{
    public $id;
    public $clan;
    public $knjiga;
    public $pisac;
    public $datum;
    public function __construct($id=null,$clan=null,$knjiga=null,$datum=null,$pisac=null)
    {
        $this->id = $id;
        $this->clan = $clan;
        $this->knjiga = $knjiga;
        $this->datum=$datum;
        $this->pisac=$pisac;
    }
    public static function vratiSveRezervacije(mysqli $conn){
       
        $query="SELECT c.imePrezime, k.naziv, r.pisac, r.datum FROM rezervacija r   JOIN clan c ON(r.idClan=c.id)  JOIN knjiga k ON(r.knjiga=k.idKnjiga)";
        return $conn->query($query);
    }
}

?>