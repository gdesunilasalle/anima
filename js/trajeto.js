

function endereco(address,casa){
if(address=="Unilasalle"){
  return"Rua Gastão Gonçalves, 79";
}
if(address=="Terminal"){
  return"Terminal Rodoviário Roberto Silveira, Av. Felíciano Sodré, S/N - Centro, Niterói - RJ, 24030-010";
}
if(address=="Barcas")
{
  return"Praça Arariboia, Praça Araribóia - Centro, Niterói - RJ, 24020-030"
}
if(address=="mestre")
{
  return "R. Dr. Paulo César, 221"
}
if(address==casa){
return casa;

}

return "Error";


}

function loadestimativa(casa)
{

  origem= document.getElementById("select-origem").options[document.getElementById("select-origem").selectedIndex].value;
  destino = document.getElementById("select-destino").options[document.getElementById("select-destino").selectedIndex].value;
  transporte=document.getElementById("select-transporte").options[document.getElementById("select-transporte").selectedIndex].value;
  if(transporte=="A pé")
  {
  if(endereco(origem,casa)!="Error"&&endereco(destino,casa)!="Error")
  {
  endorigem= endereco(origem,casa);
  enddestino= endereco(destino,casa);
  teste = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins="+endorigem+"&mode=walking&destinations="+enddestino+"&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
  loadJSON(teste, callback);
}
else {

    document.getElementById("estimativas").innerHTML = "";

}

}

if((transporte=="Carro")||(transporte=="Uber")||(transporte=="Táxi"))
{
if(endereco(origem,casa)!="Error"&&endereco(destino,casa)!="Error")
{
endorigem= endereco(origem,casa);
enddestino= endereco(destino,casa);
teste = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins="+endorigem+"&destinations="+enddestino+"&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
loadJSON(teste, callback_car);
}
else {

  document.getElementById("estimativas").innerHTML = "";

}

}
if(transporte=="bus")
{
if(endereco(origem,casa)!="Error"&&endereco(destino,casa)!="Error")
{
endorigem= endereco(origem,casa);
enddestino= endereco(destino,casa);
teste = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?&departure_time=now&mode=transit&transit_mode=bus&origins="+endorigem+"&destinations="+enddestino+"&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
loadJSON(teste, callback_bus);
}
else {

  document.getElementById("estimativas").innerHTML = "";

}

}

if(transporte=="Bicicleta")
{
if(endereco(origem,casa)!="Error"&&endereco(destino,casa)!="Error")
{
endorigem= endereco(origem,casa);
enddestino= endereco(destino,casa);
teste = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?&mode=bicycling&origins="+endorigem+"&destinations="+enddestino+"&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
loadJSON(teste, callback_bike);
}
else {

  document.getElementById("estimativas").innerHTML = "";

}

}

}

function setup(){
  origem="Terminal";
  destino = "Unilasalle";
  endorigem= endereco(origem);
  enddestino= endereco(destino);
  teste = "https://crossorigin.me/https://maps.googleapis.com/maps/api/distancematrix/json?origins="+endorigem+"&destinations="+enddestino+"&key=AIzaSyD7u7OILQGaak0e4TQoCgJHr5oDNxa6hgM";
  loadJSON(teste, callback);

  // document.getElementById("estimativas").value = testee.rows[0].elements[0].distance.text;

}

function callback(data){
  distancia= data.rows[0].elements[0].distance.text;
    tempo = data.rows[0].elements[0].duration.text;
  document.getElementById("estimativas").innerHTML = "A distancia da origem até destino é "+distancia+"<br><br>Opa, notei que a pé demora "+tempo;
}
function callback_bus(data){
  distancia= data.rows[0].elements[0].distance.text;
    tempo = data.rows[0].elements[0].duration.text;
  document.getElementById("estimativas").innerHTML = "A distancia da origem até destino é "+distancia+"<br><br>Opa, notei que de ônibus ta demorando "+tempo+' nesse momento.';
}
function callback_car(data){
  distancia= data.rows[0].elements[0].distance.text;
  tempo = data.rows[0].elements[0].duration.text;
  document.getElementById("estimativas").innerHTML = "A distancia da origem até destino é "+distancia+"<br><br>Opa, notei que de carro nesse momento está demorando "+tempo;
}
function callback_bike(data){
  distancia= data.rows[0].elements[0].distance.text;
  tempo = data.rows[0].elements[0].duration.text;
  document.getElementById("estimativas").innerHTML = "A distancia da origem até destino é "+distancia+"<br><br>Opa, notei que de bike nesse momento está demorando "+tempo;
}


function draw(){

//  origem = document.getElementById("select-origem").options[document.getElementById("select-origem").selectedIndex].value;
//  destino = document.getElementById("select-destino").options[document.getElementById("select-destino").selectedIndex].value;
//console.log(origem);
 //loadestimativa();




}
