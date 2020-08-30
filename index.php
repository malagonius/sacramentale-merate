<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> 

<div class="container" onmouseup="drop(event)" onmousedown="drag(event)">
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
		  	<div>
		  		<label for="home">Da casa </label><input type="radio" id="home" name="home">
		 	</div>
		 	<div>
		  		<label for="chiesa">In Chiesa </label><input type="radio" id="chiesa" name="home">
		  	</div>
		</div>
		<p>
		<div onclick="book()" href="#" class="btn btn-primary"> Prenota </div>
	</div>

	<div id="availability" class="availabilty" >
		<ul id="booked_list"></ul>
		<ul id="booked_list_home"></ul>
		</p>
		Posti prenotati in chiesa:
		<span id="current"></span> /
		<span id="limit"></span><br>
		Partecipazione da casa: <span id="pDaCasa">0</span>
	</div>

	<p class="annunci-container">
  		<a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Guarda primo annuncio</a>
  		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Guarda secondo annuncio</button>
 		<button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Attiva entrambi gli annunci</button>
	</p>
	<div class="row">
  		<div class="col">
    		<div class="collapse multi-collapse" id="multiCollapseExample1">
      			<div class="card card-body">
        			Miraccomando ricordate di mantenere le distanze di sicurezza e non dimenticatevi la mascherina a casa che senn&ograve; &egrave; un casino!
      			</div>
    		</div>
  		</div>
  		<div class="col">
    		<div class="collapse multi-collapse" id="multiCollapseExample2">
      			<div class="card card-body">
      				Se portate i biscotti ricordate di condividermeli grazie
      			</div>
    		</div>
  		</div>
	</div>

</div>



<div class="jumbotron jumbotron-fluid blue" onmousedown="drag(event)">
	<div class="container">
		<span id="annunci">L'uso di questo sito è principalmente per contigentare l'ingresso della cappella alle persone che desiderano partecipare alla riunione sacramentale in chiesa. Preghiamo dunque i fratelli di essere precisi e corretti nell inserimento del nominativo che deve essere fatto entro il sabato precedente alla riunione<br> Grazie Mille!</span>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" src="jQuery.js"></script>
<script src="https://unpkg.com/github-api/dist/GitHub.min.js"></script>
<script type="text/javascript" src="js.js"></script>

