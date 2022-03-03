<!DOCTYPE html>
<?php
include 'broker.php';
include 'model/clan.php';
if(isset($_POST['btnDodajCL'])){
  $imePrezime=trim($_POST['imePrezime']);
  $clanOd=trim($_POST['clanOd']);
  $clanDo=trim($_POST['clanDo']);
  
    $c=new Clan(null,$imePrezime,$clanOd,$clanDo);
    $clan->dodajClana($c,$conn);
    header("Location:dodajClana.php");
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php include 'home.php'; ?>
  <div class="modal" id="modalDCL" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" onsubmit="return validacijaForme()" method="post" id="dodajCL" name="clan">

            <h3 style="color: black; text-align: center"> <i class="bi bi-folder-plus"></i> Dodaj clana</h3>
            <div class="row">
              <div class="col-md-11 ">
                <div class="form-group">
                  <label for="">Ime i prezime</label>
                  <input type="text" style="border: 1px solid black" name="imePrezime" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="">Clan od: </label>
                  <input type="date" style="border: 1px solid black" name="clanOd" class="form-control" />
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Clan do: </label>
                    <input type="date" style="border: 1px solid black" name="clanDo" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <button id="btnDodajCL" type="submit" class="btn btn-success btn-block" tyle="background-color: orange; border: 1px solid black;">Sacuvaj clana</button>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script>

  </script>

</body>

</html>