var MIN_LENGTH = 3;
$( document ).ready(function() {
	$("#keyword").keyup(function() {
		var keyword = $("#keyword").val();
		if (keyword.length >= MIN_LENGTH) {
			$.get( "search_auto.php", { keyword: keyword } )
			  .done(function( data ) {
			    console.log(data);
			  });
		}
	});

});