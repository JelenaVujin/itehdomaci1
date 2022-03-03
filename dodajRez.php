<?php
include 'broker.php';
include 'model/rezervacija.php';
include 'model/clan.php';
$clanovi=Clan::vratiSveClanove($conn);

?>

<!DOCTYPE html>
<?php ?>
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
    <div class="modal" id="modalDR" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="#" name="dodajRezervaciju" method="post" id="dodajR">

                        <h3 style="color: black; text-align: center"> <i class="bi bi-folder-plus"></i> Dodaj rezervaciju</h3>
                        <div class="row">
                            <div class="col-md-11 ">
                                <div class="form-group">
                                    <label for="">Clan</label>
                                    <input type="text" style="border: 1px solid black" name="clan" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="">Knjiga</label>
                                    <input type="text" style="border: 1px solid black" name="knjiga" class="form-control" />
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Datum</label>
                                        <input type="date" style="border: 1px solid black" name="datum" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button id="btnDodaj" type="submit" class="btn btn-success btn-block" tyle="background-color: orange; border: 1px solid black;">Sacuvaj</button>
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