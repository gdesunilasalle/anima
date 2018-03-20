var mensagem2 = "";

function endereco(address, casa) {
    if (address == "Unilasalle") {
        return "Rua Gastão Gonçalves, 79";
    }
    if (address == "Terminal") {
        return "Terminal Rodoviário Roberto Silveira, Av. Felíciano Sodré, S/N - Centro, Niterói - RJ, 24030-010";
    }
    if (address == "Barcas") {
        return "Praça Arariboia, Praça Araribóia - Centro, Niterói - RJ, 24020-030"
    }
    if (address == "mestre") {
        return "R. Dr. Paulo César, 221"
    }
    if (address == casa) {
        return casa;

    }

    return "Error";


}

function loadestimativa(casa) {

    origem = document.getElementById("select-origem").options[document.getElementById("select-origem").selectedIndex].value;
    destino = document.getElementById("select-destino").options[document.getElementById("select-destino").selectedIndex].value;
    transporte = document.getElementById("select-transporte").options[document.getElementById("select-transporte").selectedIndex].value;
    endorigem = endereco(origem, casa);
    enddestino = endereco(destino, casa);
    if (endorigem == "Error" || enddestino == "Error") {
        document.getElementById("estimativas").innerHTML = "";
        return;
    }
    if (transporte == "A pé") {
        mensagem2 = "<br><br>Opa, notei que a pé demora ";
        teste = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + endorigem + "&mode=walking&destinations=" + enddestino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
        loadJSON(teste, callback);
        return;
    }

    if ((transporte == "Carro") || (transporte == "Uber") || (transporte == "Táxi")) {

        mensagem2 = "<br><br>Opa, notei que de carro nesse momento está demorando ";
        teste = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins=" + endorigem + "&destinations=" + enddestino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
        loadJSON(teste, callback);
        return;
    }


    if (transporte == "bus") {
        mensagem2 = "<br><br>Opa, notei que de ônibus, nesse momento está demorando ";
        teste = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?&departure_time=now&mode=transit&transit_mode=bus&origins=" + endorigem + "&destinations=" + enddestino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
        loadJSON(teste, callback);
        return;
    }


    if (transporte == "Bicicleta") {
            endorigem = endereco(origem, casa);
            enddestino = endereco(destino, casa);
            mensagem2 = '<br><br>Opa, notei que de bike nesse momento está demorando ';
            teste = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?&mode=bicycling&origins=" + endorigem + "&destinations=" + enddestino + "&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
            loadJSON(teste, callback);
            return;
    }
}

function setup() {

}

function callback(data) {
    distancia = data.rows[0].elements[0].distance.text;
    tempo = data.rows[0].elements[0].duration.text;
    let mensagem1 = "A distancia da origem até destino é ";
    document.getElementById("estimativas").innerHTML = mensagem1 + distancia + mensagem2 + tempo;
}

function draw() {



}
