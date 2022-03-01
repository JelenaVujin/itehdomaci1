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
    <div class="jumbotron" style="color:#D1BE7C"  >
       <h1>BIBLIOTEKA</h1>
    </div>
<div class="container">
  <div class="row">
    <div class="col-sm">
    <a href="#" class="btn btn-success btn-block" id="dodajRezervacijuDugme" >Dodaj rezervaciju</a>
    </div>
    <div class="col-sm">
    <a href="#" class="btn  btn-success btn-block" id="pretraziRezervacijuDugme">Pretrazi rezervacije</a>
    </div>
    <div class="col-sm">
    <a href="#" class="btn btn-success btn-block" id="dodajClanaDugme" >Dodaj clana</a>
    </div>
    <div class="col-sm">
    <a href="#" class="btn  btn-success btn-block" id="dodajKnjiguDugme" >Dodaj knjigu</a>
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
        <tr>
           <td>
            <ul class="action-list">
              <li><a href="#" class="btn btn-primary"><i class="bi bi-pencil" ></i></a></li>
              <li><a href="#" class="btn btn-danger"><i class="bi bi-trash2"></i></a></li>
            </ul>
           </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
          </tr>
      </tbody>
    </table>
 </div>