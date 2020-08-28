var nMassimoPrenotazioni = 30;
var nCorrentePersone = 0;
var curr = document.getElementById("current");
var limit = document.getElementById("limit");
var quantity = document.getElementById("quantity");

const fs = require("fs");

window.onload = function(e) {
	
	nCorrentePersone = getPrenotazioni();
	curr.innerHTML = nCorrentePersone;
	limit.innerHTML = nMassimoPrenotazioni;
	var d = new Date();
	var giorno=d.getDate();
	var n = d.getDay()
	giorno += 7-n; 
	document.getElementById("giornoSacramentale").innerHTML=giorno+"/"+parseInt(d.getMonth()+1);
}

increaseNumber = function(isUp){
	quantity=document.getElementById("quantity");

	if(isUp){
		if(parseInt(quantity.value))
		{
			quantity.value= parseInt(quantity.value)+1;
		}
		else{
			quantity.value= 1
		}
		
	}else{
		if(parseInt(quantity.value))
		{
			quantity.value= parseInt(quantity.value)-1;
			if(quantity.value==0) quantity.value=1;
		}
		else{
			quantity.value= 1
		}
	}
}

book = function(){
	var nome = document.getElementById("name");
	var fromHome = document.getElementById("home");
	var quantita = parseInt(quantity.value);
	var pDaCasa = document.getElementById("pDaCasa");


	if(nome.value == ""){
		alert("perfavore inserire un nome");
		return;
	}
	if(isNaN(quantita) || quantita==null){
		alerT("perfavore indicare quanti sarete");
		return;
	}
	if(parseInt(curr.innerHTML)+quantita > nMassimoPrenotazioni){
		alert("Impossibile prenotare!! Il numero massimo di prenotazioni '"+nMassimoPrenotazioni+"' è stato superato");
		return;
	}
	
	var li = document.createElement("li");
	var daCasa = fromHome.checked ? "Da casa" : "In chiesa";
	li.innerHTML = "Famiglia: "+nome.value+" | Persone: "+quantita+ " | "+daCasa;
	
	if(!fromHome.checked){
		var lista = document.getElementById('booked_list');
		curr.innerHTML = (parseInt(curr.innerHTML)+quantita);

	}else{
		var lista = document.getElementById('booked_list_home');
		pDaCasa.innerHTML = (parseInt(pDaCasa.innerHTML)+quantita);
	}
	lista.appendChild(li);

	nome.value=null;
	quantity.value=null;

	<?php
 		file_put_contents("data.txt","Hello World. Testing!");
	?>

}

getPrenotazioni = function(){
	return 0;
}