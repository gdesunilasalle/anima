var mensagem2 = "";

function loadestimativa(casa) {

    var origem = document.getElementById("select-origem").options[document.getElementById("select-origem").selectedIndex].value;
    var destino = document.getElementById("select-destino").options[document.getElementById("select-destino").selectedIndex].value;
    var transporte = document.getElementById("select-transporte").options[document.getElementById("select-transporte").selectedIndex].value;
    if (origem == ""|| destino == "") {
        document.getElementById("estimativas").innerHTML = "";
        return;
    }
    let url="";
    switch (transporte){
      case "A pé":
        mensagem2 = "<br><br>Opa, notei que a pé demora ";
        url = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + origem + "&mode=walking&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
        loadJSON(url, callback);
        return;
      case "Carro":
      case "Uber":
      case "Táxi":
        mensagem2 = "<br><br>Opa, notei que de carro nesse momento está demorando ";
        url= "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
        loadJSON(url, callback);
        return;
      case "bus":
        mensagem2 = "<br><br>Opa, notei que de ônibus, nesse momento está demorando ";
        url = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?&departure_time=now&mode=transit&transit_mode=bus&origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
        loadJSON(url, callback);
        return;
      case "Bicicleta":
        mensagem2 = '<br><br>Opa, notei que de bike nesse momento está demorando ';
        url = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?&mode=bicycling&origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
        loadJSON(url, callback);
        return;
      default:
        return;
    }

}

function callback(data) {
    let distancia = data.rows[0].elements[0].distance.text;
    let tempo = data.rows[0].elements[0].duration.text;
    let mensagem1 = "A distancia da origem até destino é aproximadamente ";
    document.getElementById("estimativas").innerHTML = mensagem1 + distancia + mensagem2 + tempo;
}
function setup(){}
