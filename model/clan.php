<?php 
    class Clan{
    public $id;
    public $imePrezime;
    public $clanOd;
    public $clanDo;
   
    public function __construct($id=null,$imePrezime=null,$clanOd=null,$clanDo=null)
    {
        $this->id = $id;
        $this->imePrezime = $imePrezime;
        $this->clanOd = $clanOd;
        $this->clanDo=$clanDo;
    }
    public static function dodajClana(Clan $clan,mysqli $conn){
        if($clan->imePrezime=='' || $clan->clanOd=='' || $clan->clanDo==''){
            echo "Morate popuniti sva polja";
        }
     
        $query="INSERT INTO clan ( imePrezime, clanOd, clanDo) VALUES ('$clan->imePrezime','$clan->clanOd','$clan->clanDo')";
        $result=$conn->query($query);
       
      
       
    
    }
    public static function vratiSveClanove(mysqli $conn)
    {
        $query = "SELECT * FROM clan";
        $result=$conn->query($query) or die($conn->error);
        return $result;
    }
    }
    


?>