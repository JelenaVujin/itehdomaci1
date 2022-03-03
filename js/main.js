$(document).ready(function () {
    $("#modalDR").modal('show');
});

$(document).ready(function () {
    $("#modalDCL").modal('show');
});
function validacijaForme() {
    var imePrezime = document.forms["clan"]["imePrezime"].value;
    var clanOd = document.forms["clan"]["clanOd"].value;
    var clanDo = document.forms["clan"]["clanDo"].value;

    if (imePrezime == "" || clanOd == "" || clanDo == "") {
        
        alert("Morate popuniti sva polja!");
       
      return false;
    }
  }