var mensagem2 = "";
var casag = "";

function endereco(address, casa) {
var cases = {};
cases['Unilasalle-RJ'] = function() {
  return 'Rua Gastão Gonçalves, 79';
};
cases['Terminal'] = function() {
  return 'Terminal Rodoviário Roberto Silveira, Av. Felíciano Sodré, S/N - Centro, Niterói - RJ, 24030-010';
};
cases['Rodoviária'] = function() {
  return 'Terminal Rodoviário Roberto Silveira, Av. Felíciano Sodré, S/N - Centro, Niterói - RJ, 24030-010';
};
cases['Barcas'] = function() {
  return 'Praça Arariboia, Praça Araribóia - Centro, Niterói - RJ, 24020-030';
};
cases['Mestre do Suco'] = function() {
  return 'R. Dr. Paulo César, 221 - Pé Pequeno, Niterói - RJ, 24220-401';
};
cases['Plaza Shopping'] = function() {
  return 'Rua Quinze de Novembro, 8 - Centro, Niterói - RJ, 24020-125';
};
cases['Bay Market'] = function() {
  return 'Av. Visconde do Rio Branco, 360 - Centro, Niterói - RJ, 24020-002';
};
cases[casa] = function() {
  return casa;
}

if(typeof cases[address] == 'function') {
  return cases[address]();
} else {
  return undefined;
}
}

function loadestimativa(casa) {
  casag = casa;
  var estimativa = document.getElementById("estimativas");
  estimativa.innerHTML = "";
  estimativa.style.display = "none";
  estimativa.style.height = "auto";
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
      url = "http://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + origem + "&mode=walking&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
      loadJSON(url, callback);
      return;
    case "Carro":
    case "Uber":
    case "Táxi":
      mensagem2 = "<br><br>Opa, notei que de carro nesse momento está demorando ";
      url = "http://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
      loadJSON(url, callback);
      return;
    case "Ônibus":
      mensagem2 = "<br><br>Opa, notei que de ônibus, nesse momento está demorando ";
      url = "http://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?&departure_time=now&mode=transit&transit_mode=bus&origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
      loadJSON(url, callback);
      return;
    case "Bicicleta":
      mensagem2 = '<br><br>Opa, notei que de bike nesse momento está demorando ';
      url = "http://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?&mode=bicycling&origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
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
}
