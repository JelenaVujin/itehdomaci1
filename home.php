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

      <div class="col-sm">
       <a href="logout.php" type="button" class="btn  btn-success btn-block" id="logout">Odjava</a> 
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
          <tr id="<?php echo $rID;?>">
            <td>
              <ul class="action-list">
                <li><a href="#" class="btn btn-primary edit" data-role="update"  data-id="<?php echo $rID?>"><i class="bi bi-pencil"></i></a></li>
                <li><a href='brisanjeRezervacije.php?id=<?php echo $rID;?>'class="btn btn-danger"><i class="bi bi-trash2"></i></a></li>
              </ul>
          </td>
            <td><?php echo $i;  $i++; ?></td>
            <td data-target="imePrezime"><?php echo $r['imePrezime']; ?></td>
            <td data-target="knjiga"><?php echo $r['knjiga']; ?></td>
            <td data-target="pisac"><?php echo $r['pisac']; ?></td>
            <td data-target="datum"><?php echo $r['datum']; ?></td>
          </tr>
        <?php  endforeach;?>
      </tbody>

    </table>
  </div>
<!--MODALI-->


<!-- DODAJ CLANA-->
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
<!-- DODAJ REZERVACIJU-->
<div class="modal fade" id="dodajRezervacijuModal" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
           <p class="error"></p>
              <form id="unosRezervacije">
                 <h3 style="color: black; text-align:left">Dodaj rezervaciju</h3>
                         
                          <div class="form-group">
                               <label for="">Knjiga: </label>
                               <input type="text" name="knjiga" id="knjiga" class="form-control" required=""/>
                          </div>
                          <div class="form-group">
                               <label for="">Pisac: </label>
                               <input type="text"  name="pisac" id="pisac" class="form-control" required=""/>
                          </div>
                          <div class="form-group">
                               <label for="">Datum: </label>
                               <input type="date"  name="datum" id="datum" class="form-control" required=""/>
                          </div>
                          <div class="form-group">
                              <label for="clanovi">Clan: </label>
                              <select class="form-control" name="idClan" id="idClan"required="">
                                <?php foreach($clanovi as $c):  ?>
                                    <option value='<?php echo $c['idClan'];?>'  >
                                   
                                   <?php echo $c['imePrezime'];?>
                                    </option>
                                 <?php endforeach; ?>
                    </select>
                          </div>
                         <button id="dodajRezervaciju" type="submit" class="btn btn-success ">Sacuvaj</button>
                         <button type="button"  class="btn btn-success " data-dismiss="modal">Zatvori</button>
                  </form>
          </div>
        </div>
      </div>
</div>
<!-- IZMENI REZERVACIJU-->
<div class="modal fade" id="izmeniRezervacijuModal" role="dialog">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-body">
                 <h3 style="color: black; text-align:left">Izmeni rezervaciju</h3>
                         
                          <div class="form-group">
                               <label for="">Knjiga: </label>
                               <input type="text"  id="knjigaIzmena" class="form-control" required=""/>
                          </div>
                          <div class="form-group">
                               <label for="">Pisac: </label>
                               <input type="text"   id="pisacIzmena" class="form-control" required=""/>
                          </div>
                          <div class="form-group">
                               <label for="">Datum: </label>
                               <input type="date"  id="datumIzmena" class="form-control" required=""/>
                          </div>
                          <div class="form-group">
                              <label for="clanovi">Clan: </label>
                              <select  class="form-control" required=""  id="idClanIzmena">
                                <?php foreach($clanovi as $c):  ?>
                                    <option   value='<?php echo $c['idClan'];?>'  >
                                   
                                   <?php echo $c['imePrezime'];?>
                                    </option>
                                 <?php endforeach; ?>
                    </select>
                          </div>
                          <input type="hidden" id="idR" class="form-control">
                         <a href="#" id="izmeniRezervaciju" class="btn btn-success " >Sacuvaj</a>
                         <button type="button"  class="btn btn-success " data-dismiss="modal">Zatvori</button>
                  
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
                idClan:$('#pretraziRezervacijuDugme').val(),
            },
            success:function(data){
                $("#tbd").html(data); //tdb id za tbody i dodajemo mu data
            }
        });
    });
    $('#dodajRezervaciju').click(function(){
        var knjiga=$("#knjiga").val();
        var pisac=$("#pisac").val();
        var datum=$("#datum").val();
        var idClan=$("#idClan").val();
        var svi="knjiga="+knjiga+"&pisac="+pisac+"&datum="+datum+"&idClan="+idClan;
        console.log(svi)
        $.ajax({
             type:'post',
             url:'dodajRez.php',
             data:svi,
             success:function(s){
                 console.log("dsdsd");
             },
             error:function(s){
                 alert("Rezervacija nije dodata!");
             }
        });
      });
      $(document).on('click','a[data-role=update]',function(){
        var id=$(this).data('id');
        var knjiga=$("#"+id).children('td[data-target=knjiga]').text();
        var pisac=$("#"+id).children('td[data-target=pisac]').text();
        var datum=$("#"+id).children('td[data-target=datum]').text();
        var idClan=$("#"+id).children('td[data-target=imePrezime]').html();
       $("#knjigaIzmena").val(knjiga);
       $("#pisacIzmena").val(pisac);
       $("#datumIzmena").val(datum);
       $('option#idClanIzmena select').html(idClan);
       $("#idR").val(id);
       $("#izmeniRezervacijuModal").modal('toggle');
    });
    $("#izmeniRezervaciju").on('click',function(){
      var id=$("#idR").val();
      var knjiga=$("#knjigaIzmena").val();
      var pisac=$("#pisacIzmena").val();
      var datum=$("#datumIzmena").val();
      var idClan=$("#idClanIzmena :selected").val();
      $.ajax({
        url:'izmeniRez.php',
        type:'POST',
        data:{id:id,knjiga:knjiga,pisac:pisac,datum:datum,idClan:idClan},
        success:function(response){
          $("#"+id).children('td[data-target=knjiga]').text(knjiga);
          $("#"+id).children('td[data-target=pisac]').text(pisac);
          $("#"+id).children('td[data-target=datum]').text(datum);
          $("#"+id).children('td[data-target=imePrezime]').text(idClan);
          $("#izmeniRezervacijuModal").modal('toggle');
          console.log(response);
        },
        error:function(response){
          console.log(response)
        }
      })
    })

 

});
</script>
</body>
</html>