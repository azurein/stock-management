<html>
	<head>
		<!-- JQUERY AUTOCOMPLETE -->
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script>
			
		$(function(){
			$("#birds").autocomplete({
				source: "birds/ambil" // name of controller
			});
		});

		</script>
	</head>
	<body>
		<input name="term" type="text" id="birds" />
	</body>
</html>