var mensagem2 = "";
var casag = "";

class obj_endereco{
  constructor(address, lat, long) {
  this.address = "";
  this.lat = 0;
  this.long = 0;
}
}

function iniciar_mapa(origem,destino){
  if(origem.lat == undefined) return;
  var element = document.getElementById("mapid");
  element.innerHTML = "";
  element.class = "";
  	var mymap = L.map('mapid').setView([origem.lat, origem.long], 13);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

	L.marker([origem.lat, origem.long]).addTo(mymap);
  L.marker([destino.lat, destino.long]).addTo(mymap);
}

function endereco(address, casa) {
  var enderecos = {};
  var objeto = new obj_endereco();
  enderecos['Unilasalle-RJ'] = function() {
    objeto.address = "Rua Gastão Gonçalves, 79";
    objeto.lat = -22.897113;
    objeto.long = -43.106530;
    return objeto;
//    return "Rua Gastão Gonçalves, 79";
  }
  enderecos['Terminal'] = function() {
    objeto.address = "Terminal Rodoviário Roberto Silveira, Av. Felíciano Sodré, S/N - Centro, Niterói - RJ, 24030-010";
    objeto.lat = -22.885340;
    objeto.long = -43.122006;
    return objeto;
  }
  enderecos['Rodoviária'] = function() {
    objeto.address = "Av. Visconde do Rio Branco, S/N - Centro, Niterói - RJ, 24020-000";
    objeto.lat = -22.890035;
    objeto.long = -43.124245;
    return objeto;
  }
  enderecos['Barcas'] = function() {
    objeto.address = "Praça Arariboia, Praça Araribóia - Centro, Niterói - RJ, 24020-030";
    objeto.lat = -22.895633;
    objeto.long = -43.124914;
    return objeto;
  }
  enderecos['Mestre do Suco'] = function() {
    objeto.address = "R. Dr. Paulo César, 221 - Pé Pequeno, Niterói - RJ, 24220-401";
    objeto.lat = -22.898802;
    objeto.long = -43.106465;
    return objeto;
  }
  enderecos['Plaza Shopping'] = function() {
    objeto.address = "Rua Quinze de Novembro, 8 - Centro, Niterói - RJ, 24020-125";
    objeto.lat = -22.896793;
    objeto.long = -43.123880;
    return objeto;
  }
  enderecos['Bay Market'] = function() {
    objeto.address = "Av. Visconde do Rio Branco, 360 - Centro, Niterói - RJ, 24020-002";
    objeto.lat = -22.892002;
    objeto.long = -43.124583;
    return objeto;
  }
  enderecos[casa] = function() {
    objeto.address = casa;
    var url= "https://maps.googleapis.com/maps/api/geocode/json?address="+casa+"&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
    dados = loadJSON(url);
    if(dados.results != undefined){
    objeto.lat = undefined;
    objeto.long = undefined;
  }
    return objeto;
  }

  if (typeof enderecos[address] == 'function') {
    return enderecos[address]();
  } else {
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
  obj_origem = endereco(origem, casa);
  obj_destino = endereco(destino, casa);
  if(obj_origem == undefined || obj_destino== undefined) return;
  origem = obj_origem.address;
  destino = obj_destino.address;

  if (origem == undefined || destino == undefined) {
    document.getElementById("estimativas")
      .innerHTML = "";
    return;
  }
  let url = "";
  switch (transporte) {
    case "A pé":
      mensagem2 = "<br><br>Opa, notei que a pé demora ";
      url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + origem + "&mode=walking&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
      loadJSON(url, callback);
      iniciar_mapa(obj_origem,obj_destino);
      return;
    case "Carro":
    case "Uber":
    case "Táxi":
      mensagem2 = "<br><br>Opa, notei que de carro nesse momento está demorando ";
      url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
      loadJSON(url, callback);
      iniciar_mapa(obj_origem,obj_destino);
      return;
    case "bus":
      mensagem2 = "<br><br>Opa, notei que de ônibus, nesse momento está demorando ";
      url = "https://maps.googleapis.com/maps/api/distancematrix/json?&departure_time=now&mode=transit&transit_mode=bus&origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
      loadJSON(url, callback);
      iniciar_mapa(obj_origem,obj_destino);
      return;
    case "Bicicleta":
      mensagem2 = '<br><br>Opa, notei que de bike nesse momento está demorando ';
      url = "https://maps.googleapis.com/maps/api/distancematrix/json?&mode=bicycling&origins=" + origem + "&destinations=" + destino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
      loadJSON(url, callback);
      iniciar_mapa(obj_origem,obj_destino);
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
