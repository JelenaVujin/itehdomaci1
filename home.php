<?php
session_start();
include 'broker.php';
include 'model/rezervacija.php';
include 'model/clan.php';


if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
}

$rez = Rezervacija::vratiSveRezervacije($conn);
$clanovi=Clan::vratiSveClanove($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/home.css" type="text/css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <title>Document</title>
  <style>
  .error{
       
        color:#A94442;
        padding:10px;
        width:95%;
        border-radius:5px;
        text-align: center;
        margin: 20px auto;
        font-size:20px;
      }
      .sortiranje{
        cursor:pointer;
      }
      #sortTabela .th-sort-asc::after{
        content: "\25b4";
      }
      #sortTabela .th-sort-desc::after{
        content: "\25be";
      }
      </style>
</head>

<body>
  <div class="jumbotron" style="color:#D1BE7C">
    <h1>BIBLIOTEKA</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <button class="btn btn-success btn-block"   data-toggle="modal" data-target="#dodajRezervacijuModal">Dodaj rezervaciju</button>
      </div>
      <div class="col-sm">
        <input type="text" class="btn btn-block" id="pretraziRezervacijuDugme"placeholder="Pretrazi rezervacije">
      </div>
      <div class="col-sm">
        <button class="btn btn-success btn-block"  data-toggle="modal" data-target="#dodajClanaModal" >Dodaj clana</button>
      </div>

      <div class="col-sm">
       <a href="exportToExcel.php" type="button" class="btn  btn-success btn-block" id="exportToExcel">Export u Excel</a> 
      </div>

  </div>
  </div>

  <div class="panel-body table-responsive">
    <table class="table sortable" id="sortTabela">
      <thead>
        <tr>
          <th>Izmena/Brisanje</th>
          <th>RBR</th>
          <th class="sortiranje" data-sort="name">Ime clana</th>
          <th class="sortiranje" data-sort="name">Knjiga</th>
          <th class="sortiranje" data-sort="name">Pisac</th>
          <th class="sortiranje" data-sort="date">Datum</th>
        </tr>
      </thead>
      <tbody id="tbd">
     
        <?php 
          $i = 1; 
          foreach($rez as $r):
         $rID=$r['idR'];
        ?>
          <tr>
            <td>
              <ul class="action-list">
                <li><a  class="btn btn-primary"><i class="bi bi-pencil"></i></a></li>
                <li><a href='brisanjeRezervacije.php?id=<?php echo $rID?>'class="btn btn-danger"><i class="bi bi-trash2"></i></a></li>
              </ul>
          </td>
            <td><?php echo $i;  $i++; ?></td>
            <td><?php echo $r['imePrezime']; ?></td>
            <td><?php echo $r['knjiga']; ?></td>
            <td><?php echo $r['pisac']; ?></td>
            <td><?php echo $r['datum']; ?></td>
          </tr>
        <?php  endforeach;?>
      </tbody>

    </table>
  </div>
<!--MODALI-->



<div class="modal fade" id="dodajClanaModal" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
           <p class="error"></p>
              <form id="unosClana">
                 <h3 style="color: black; text-align:left">Dodaj clana</h3>
                          <div class="form-group">
                              <label for="">Ime i prezime</label>
                              <input type="text"  name="imePrezime" id="imePrezime" class="form-control" />
                          </div>
                          <div class="form-group">
                               <label for="">Clan od: </label>
                               <input type="date" name="clanOd" id="clanOd" class="form-control" />
                          </div>
                          <div class="form-group">
                               <label for="">Clan do: </label>
                               <input type="date"  name="clanDo" id="clanDo" class="form-control" />
                          </div>
                               <button id="dodaj" type="button" class="btn btn-success ">Sacuvaj</button>
                               <button type="button"  class="btn btn-success " data-dismiss="modal">Zatvori</button>
              </form>
          </div>
          </div>
         </div>
</div>



<div class="modal fade" id="dodajRezervacijuModal" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
           <p class="error"></p>
              <form id="unosRezervacije">
                 <h3 style="color: black; text-align:left">Dodaj rezervaciju</h3>
                         
                          <div class="form-group">
                               <label for="">Knjiga: </label>
                               <input type="text" name="knjiga" id="knjiga" class="form-control" />
                          </div>
                          <div class="form-group">
                               <label for="">Pisac: </label>
                               <input type="text"  name="pisac" id="pisac" class="form-control" />
                          </div>
                          <div class="form-group">
                               <label for="">Datum: </label>
                               <input type="date"  name="datum" id="datum" class="form-control" />
                          </div>
                          <div class="form-group">
                              <label for="clanovi">Clan: </label>
                              <select class="form-control" name="idClan" id="idClan">
                                <?php foreach($clanovi as $c):  ?>
                                    <option value='<?php echo $c['idClan'];?>'  >
                                   
                                   <?php echo $c['imePrezime'];?>
                                    </option>
                                 <?php endforeach; ?>
                    </select>
                          </div>
                         
                               <button id="dodajRezervaciju" type="button" class="btn btn-success ">Sacuvaj</button>
                               <button type="button"  class="btn btn-success " data-dismiss="modal">Zatvori</button>
                       
                    
              </form>
           
          </div>
        </div>
      </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="ajax.js" type="text/javascript"></script>
<script>

var poredjenje={
  name:function(a,b){//metoda sa nazivom name iz data-sort 
    if(a<b){
      return -1;
    }else{
      return a>b?1:0;
    }
  },
  date:function(a,b){//metoda sa nazivom date iz data-sort 
    a=new Date(a);
    b=new Date(b);
    return a-b;
  }
};
$('.sortable').each(function(){
  var $tabela=$(this);
  var $tbody=$tabela.find('tbody');
  var $hederi=$tabela.find('th');
  var redovi=$tbody.find('tr').toArray();
  $hederi.on('click',function(){
    var $heder=$(this);
    var vrsta=$heder.data('sort');
    var kolona;
    if($heder.is('.asc') || $heder.is('.desc')){
      $heder.toggleClass('asc desc');
      $tbody.append(redovi.reverse());
    }else{
      $heder.addClass('asc');
      $heder.siblings().removeClass('asc desc');
      if(poredjenje.hasOwnProperty(vrsta)){
        kolona=$hederi.index(this);
        redovi.sort(function(a,b){
          a=$(a).find('td').eq(kolona).text();
          b=$(b).find('td').eq(kolona).text();
          return poredjenje[vrsta](a,b);
        });
        $tbody.append(redovi);
      }
    }
  });

});
$(document).ready(function(){
    $('#pretraziRezervacijuDugme').keypress(function(){
        $.ajax({
            type:'post',
            url:'pretraga.php',
            data:{
                knjiga:$('#pretraziRezervacijuDugme').val(),
            },
            success:function(data){
                $("#tbd").html(data); //tdb id za tbody i dodajemo mu data
            }
        });
    });
});


</script>
</body>
</html>
