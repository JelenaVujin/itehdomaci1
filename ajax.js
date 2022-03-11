//DODAVANJE CLANA
$(document).ready(function(){
    $('#dodaj').click(function(){
       var imePrezime=$("#imePrezime").val();
       var clanOd=$("#clanOd").val();
       var clanDo=$("#clanDo").val();
       var svi="imePrezime="+imePrezime+"&clanOd="+clanOd+"&clanDo="+clanDo;
         $.ajax({
            type:'post',
            url:'dodajC.php',
            data:svi,
            success:function(s){
                if(imePrezime=="" || clanOd=="" || clanDo==""){
                    $('.error').append("Morate popuniti sva polja!");
                }else{
                    alert("Clan uspesno dodat!");
                }
            },
            error:function(s){
                alert("Clan nije dodat!");
            }
       });
     });
 });
 //DODAVANJE REZERVACIJE KNJIGE
 $(document).ready(function(){
    $('#dodajRezervaciju').click(function(){
       var knjiga=$("#knjiga").val();
       var pisac=$("#pisac").val();
       var datum=$("#datum").val();
       var idClan=$("#idClan").val();
       var svi="knjiga="+knjiga+"&pisac="+pisac+"&datum="+datum+"&idClan="+idClan;
       $.ajax({
            type:'post',
            url:'dodajRez.php',
            data:svi,
            success:function(s){
                if(knjiga=="" || pisac=="" || datum=="" || idClan==""){
                    $('.error').append("Morate popuniti sva polja!");
                }else{
                    $('.error').append("Rezervacija uspesno dodata!");
                }
            },
            error:function(s){
                alert("Rezervacija nije dodata!");
            }
       });
     });
 });



 
