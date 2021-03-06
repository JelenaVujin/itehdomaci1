<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
    <style>
      .error{
        background:#F2DEDE;
        color:#A94442;
        padding:10px;
        width:95%;
        border-radius:5px;
        margin: 20px auto;
        font-size:20px;
      }
    </style>
</head>
<body>
<section class="vh-100" style="background-color: #D1BE7C;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img
                src="slike/naslovna.png"
                alt="login form"
                class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
              />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="verifikacija.php">
      <?php if(isset($_GET['error'])):?>
          <p class="error"><?php echo $_GET['error'];?></p>
      <?php endif;?>
                  
                <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h1 fw-bold mb-0">Biblioteka</span>
                  </div>
                <div class="form-outline mb-4">
                    <input type="text" id="form2Example17" name="username" class="form-control form-control-lg" />
                    <label class="username" for="form2Example17">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="password">Password</label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn  btn-lg btn-block" style="background-color:#D1BE7C" type="submit" id="logInDugme" name="submit">Prijava</button>
                  </div>

                  
                  
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>