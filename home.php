<?php
session_start();
include 'broker.php';
include 'model/rezervacija.php';


if (!isset($_SESSION['user_id'])) {
  header('Location: index.php');
  exit();
}

$rez = Rezervacija::vratiSveRezervacije($conn);
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
</head>

<body>
  <div class="jumbotron" style="color:#D1BE7C">
    <h1>BIBLIOTEKA</h1>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <a class="btn btn-success btn-block" id="dodajRezervaciju" href="dodajRez.php">Dodaj rezervaciju</a>
      </div>
      <div class="col-sm">
        <button type="button" class="btn  btn-success btn-block" id="pretraziRezervacijuDugme">Pretrazi rezervacije</button>
      </div>
      <div class="col-sm">
        <a class="btn btn-success btn-block" id="dodajClanaDugme" href="dodajClana.php">Dodaj clana</a>
      </div>

      <div class="col-sm">
        <button type="button" class="btn  btn-success btn-block" id="sortiraj">Sortiranje</button>
      </div>

    </div>
  </div>
  </div>

  <div class="panel-body table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Izmena/Brisanje</th>
          <th>RBR</th>
          <th>Ime clana</th>
          <th>Knjiga</th>
          <th>Pisac</th>
          <th>Datum</th>
        </tr>
      </thead>
      <tbody>
     
        <?php 
          $i = 1; 
          foreach($rez as $r):
         $rID=$r['idR'];
        ?>
          <tr>
            <td>
              <ul class="action-list">
                <li><a href="izmeniRezervaciju.php" class="btn btn-primary"><i class="bi bi-pencil"></i></a></li>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>