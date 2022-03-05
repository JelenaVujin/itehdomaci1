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
 