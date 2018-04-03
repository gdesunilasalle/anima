var mensagem2 = "";
var casag = "";

function endereco(address, casa) {
  switch (address) {
    case "Unilasalle-RJ":
      return "Rua Gastão Gonçalves, 79";
    case "Terminal":
      return "Terminal Rodoviário Roberto Silveira, Av. Felíciano Sodré, S/N - Centro, Niterói - RJ, 24030-010";
    case "Rodoviária":
      return "Terminal Rodoviário Roberto Silveira, Av. Felíciano Sodré, S/N - Centro, Niterói - RJ, 24030-010";
    case "Barcas":
      return "Praça Arariboia, Praça Araribóia - Centro, Niterói - RJ, 24020-030";
    case "Mestre dos Sucos":
      return "R. Dr. Paulo César, 221 - Pé Pequeno, Niterói - RJ, 24220-401";
    case casa:
      return casa
    default:
      return undefined;
  }
}

function loadestimativa(casa) {
  casag = casa;
  var estimativa = document.getElementById("estimativas");
  estimativa.innerHTML = "";
  estimativa.style.display = "none";
  var origem = document.getElementById("select-origem")
    .options[document.getElementById("select-origem")
      .selectedIndex].value;
  var destino = document.getElementById("select-destino")
    .options[document.getElementById("select-destino")
      .selectedIndex].value;
  var transporte = document.getElementById("select-transporte")
    .options[document.getElementById("select-transporte")
      .selectedIndex].value;
  origem = endereco(origem, casa);
  destino = endereco(destino, casa);

  if (origem == undefined || destino == undefined) {
    document.getElementById("estimativas")
      .innerHTML = "";
    return;
  }
  let url = "";
  switch (transporte) {
    case "A pé":
      mensagem2 = "<br><br>Opa, notei que a pé demora ";
      url = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + origem + "&mode=walking&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
      loadJSON(url, callback);
      return;
    case "Carro":
    case "Uber":
    case "Táxi":
      mensagem2 = "<br><br>Opa, notei que de carro nesse momento está demorando ";
      url = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
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
  document.getElementById("estimativas")
    .innerHTML = mensagem1 + distancia + mensagem2 + tempo;
  document.getElementById("estimativas")
    .style.display = "block";
}

function setup() {
  noCanvas();
  setInterval(loadestimativa(casag), 1000);
}