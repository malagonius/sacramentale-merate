var nMassimoPrenotazioni = 30;
var nCorrentePersone = 0;
var curr = document.getElementById("current");
var limit = document.getElementById("limit");
var quantity = document.getElementById("quantity");
var pDaCasa = document.getElementById("pDaCasa");
var dragEvent = "";
var accessToken = "be4b6915e78cb6475565781eaf0f9fc17c093bf1";
var CORS = "https://cors-anywhere.herokuapp.com/";


window.onload = function(e) {
	
	curr.innerHTML = nCorrentePersone;
	limit.innerHTML = nMassimoPrenotazioni;
	var d = new Date();
	var giorno=d.addDays(7-d.getDay());
	var myDateString = ("0"+giorno.getDate()).slice(-2)+"/"+("0"+(giorno.getMonth()+1)).slice(-2);
	document.getElementById("giornoSacramentale").innerHTML=myDateString;

	loadData();
}

Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
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

	if(validInputs(nome.value,quantita)){
		var daCasa = fromHome.checked ? "Da casa" : "In chiesa";
		var json = JSON.stringify({'famiglia': nome.value, 'quantita': quantita, 'daCasa':daCasa})
		
		var uploadURL ="https://api.github.com/repos/malagonius/sacramentale-merate/data.txt";

		console.log(uploadURL);

		$.ajax({
		 	type: "POST",
		 	url: CORS+uploadURL,
		 	beforeSend : function(xhr){
		 		xhr.setRequestHeader("Authorization", "token "+accessToken)
		 	},
		  	contentType: "application/json",
		  	dataType: "json",
		  	data: {
		    	"message": "my commit message",
		    	"committer": {
		      	"name": nome.value,
		      	"email": "nicotra23mattia@gmail.com"
		    },
	    	"content": json,
		  }
		})
		  .done(function( msg ) {
		    console.log( "Data Saved: " + json );
		  });



		/*jQuery.ajax({
	    type: "POST",
	    url: 'book.php',
	    dataType: 'json',
	    data: {functionname: 'book', arguments: json},

	    success: function (obj, textstatus) {
	                  if( !('error' in obj) ) {
	                      yourVariable = obj.result;
	                      loadData();
	                  }
	                  else {
	                      console.log(obj.error);
	                  }
	            }
		});*/

		nome.value=null;
		quantity.value=null;
	}
	
}

drag = function(event){
	dragEvent = event.target;
}

drop = function(event){
	if(event.target.id=="logo"){
		if(dragEvent.id=="availability"){
			var json = "{}";
			jQuery.ajax({
		    type: "POST",
		    url: 'book.php',
		    dataType: 'json',
		    data: {functionname: 'delete-all', arguments: json},

		    success: function (obj, textstatus) {
		                  if( !('error' in obj) ) {
		                      yourVariable = obj.result;
		                      loadData();
		                  }
		                  else {
		                      console.log(obj.error);
		                  }
		            }
			});
			return;
		}
	}
	if(event.target.id=="annunci-container"){
		if(dragEvent.id=="availability"){
			var annuncio = prompt("Please enter your name:", "Sostituiscimi con il tuo annuncio");
			var msg="";
			if (person == null || person == "") {
			    msg = "User cancelled the prompt.";
			} else {
			    var json = annuncio;
				jQuery.ajax({
			    type: "POST",
			    url: 'book.php',
			    dataType: 'json',
			    data: {functionname: 'delete-all', arguments: json},

			    success: function (obj, textstatus) {
			                  if( !('error' in obj) ) {
			                      yourVariable = obj.result;
			                      loadData();
			                  }
			                  else {
			                      console.log(obj.error);
			                  }
			            }
				});
			}
		}
	}
	dragEvent = "";
}

loadData = function(){

	var json = "{}";
	jQuery.ajax({
    type: "POST",
    url: CORS+'https://raw.github.com/malagonius/sacramentale-merate/master/data.txt',
    dataType: 'json',

    success: function (obj, textstatus) {
      	if( !('error' in obj) ) {
	      	data = obj.result;
	      	if(data === false){
	      		return;
	      	}
	      	// fill the table accordingly
	      	var list = data.split(/\r?\n/);
	      	var li = null;
	      	var lista = null;
	      	jsonRow = null;

	      	cleanLocalLists();
	      	for(row of list){
	      		if(row==""){
	      			continue;
	      		}
	      		jsonRow = JSON.parse(row);
	      		li = document.createElement("li");
	      		li.id=jsonRow.famiglia;
	      		li.innerHTML = "Famiglia: "+jsonRow.famiglia+" | Persone: "+jsonRow.quantita+ " | "+jsonRow.daCasa;
	      		if(jsonRow.daCasa === "In chiesa"){
					lista = document.getElementById('booked_list');
					curr.innerHTML = (parseInt(curr.innerHTML)+jsonRow.quantita);
				}else{
					lista = document.getElementById('booked_list_home');
					pDaCasa.innerHTML = (parseInt(pDaCasa.innerHTML)+jsonRow.quantita);
				}
				lista.appendChild(li);
	      	}
			
      	}
      	else {
          		console.log(obj.error);
  			}
        }
	});

	
}

cleanLocalLists = function(){
	document.getElementById("booked_list").innerHTML="";
	document.getElementById("booked_list_home").innerHTML="";
  	curr.innerHTML="0";
  	pDaCasa.innerHTML="0";
}

validInputs = function(nome,quantita){
	var ret = true;
	if(nome === ""){
		alert("perfavore inserire un nome");
		return false;
	}
	if(isNaN(quantita) || quantita==null){
		alerT("perfavore indicare quanti sarete");
		return false;
	}
	if(parseInt(curr.innerHTML)+quantita > nMassimoPrenotazioni){
		alert("Impossibile prenotare!! Il numero massimo di prenotazioni '"+nMassimoPrenotazioni+"' è stato superato");
		return false;
	}
	var churchList = document.getElementById("booked_list").children;
	for(var i=0; i< churchList.length;i++){
		if(churchList[i].id === nome){
			alert("Nome gia inserito! Perfavore scegliere un altro nome");
			ret= false;
			return;
		}
	}

	var homeList = document.getElementById("booked_list_home").children;
	for(var i=0; i< homeList.length;i++){
		if(homeList[i].id === nome){
			alert("Nome gia inserito! Perfavore scegliere un altro nome");
			ret = false;
			return;

		}
	}
	return ret;
}
