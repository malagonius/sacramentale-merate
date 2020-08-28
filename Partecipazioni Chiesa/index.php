<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 

<div class="container" onmouseup="drop(event)">
	<div  class="container img_container">
		<div class="logo_span"></div>
		<div id="logo" class="logo"></div>
	</div>
	<h1>Rione di Merate</h1>
	<h5>Riunione Sacramentale del <span id="giornoSacramentale"></span></h5>
	<div> 
		<div class="input_container">
			<label for="name">Famiglia<input type="text" id="name" name="name"></label>
		  	<div>
		  		<label for="quantity">Numero<input type="number" id="quantity" name="quantity" min="1"></label>
		  		<img src="up.png" id="up" onclick="increaseNumber(true)">
		  		<img src="up.png" id="down" onclick="increaseNumber(false)">
		  	</div>
		  	<label for="home">Da casa <input type="radio" id="home" name="home"></label>
		  	<label for="chiesa">In Chiesa <input type="radio" id="chiesa" name="home"></label></div>
		  	<p>
			<div onclick="book()" href="#" class="btn btn-primary"> Prenota </div>
		</div>



		<div id="availability" class="availabilty" onmousedown="drag(event)">
			<ul id="booked_list">
			</ul>
			<ul id="booked_list_home">
			</ul>
			<p>
			Posti prenotati in chiesa:  <span id="current"></span> /
			<span id="limit"></span><br>
			Partecipazione da casa: <span id="pDaCasa">0</span>
		</div>
	</div>
</div>
<div class="jumbotron jumbotron-fluid blue">
	<div class="container">
		<span>L'uso di questo sito è principalmente pe contigentare l'ingresso della cappella alle persone che desiderano partecipare alla riunione sacramentale in chiesa. Preghiamo dunque i fratelli di essere precisi e corretti nell inserimento del nominativo che deve essere fatto entro il sabato precedente alla riunione<br> Grazie Mille!</span>

	</div>
</div>


<script type="text/javascript" src="jQuery.js"></script>
<script type="text/javascript" src="js.js"></script>

