<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<script>
deleteRecords = function(){
	var uploadURL ="https://api.github.com/repos/malagonius/sacramentale-merate/contents/data.txt";
	var newData = "\n";
	$.ajax({
		type: "PUT",
		url: uploadURL,
		contentType: "application/json",
		dataType: "json",
		headers: {
			    "accept": "application/vnd.github.v3+json",
			    "Authorization": "Basic bWFsYWdvbml1czo0NjJhMjZjZjA3ZTMxMTU5NzkyMzFmNjkzNjIxOTk4NzdmYmQ3ODAx",
			    "Content-Type": "application/json",
			},
		data: JSON.stringify({
		"message": "records were cleared",
		"content": btoa(newData),
		"sha": loadedData.sha
	    }),

	})
	  .done(function( msg ) {
	    console.log( "Data Saved: " + json );
	    loadData();
	  });
	
}

window.onload = function(){
	deleteRecords();
}

</script>
</html>
