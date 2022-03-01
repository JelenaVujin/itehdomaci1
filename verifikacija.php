<?php
session_start();
include 'broker.php';



if(isset($_POST['username']) && isset($_POST['password'])){
    
    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $un=validate($_POST['username']);
    $ps=validate($_POST['password']);

    if(empty($un)){
        header("Location:index.php?error=Morate uneti korisnicko ime");
        exit();
    }else if(empty($ps)){
        header("Location:index.php?error=Morate uneti lozinku");
        exit();
    }else{
       $upit="SELECT * FROM zaposleni WHERE username='$un' AND lozinka='$ps'";
       $odg=$conn->query($upit);
       if($odg->num_rows==1){
           $red=mysqli_fetch_assoc($odg);
           if($red['username']==$un && $red['lozinka']==$ps){
        $_SESSION['user_id'] = $zaposleni->id;
        header('Location: home.php');
        exit();
           }else{
            header("Location:index.php?error=Pogresna lozinka ili username");
            exit();
           }
       }else{
        header("Location:index.php?error=Pogresna lozinka ili username");
        exit();
       }
    }
}else{
    header("Location:home.php");
    exit();
}

