<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$("p").click(function(){
			$(this).hide();
		});
	});

</script>

<script>
	$(document).ready(function(){
		$("button").click(function(){
			$("#a").hide();
		});
	});
	
</script>
</head>
<body>

<p>If you click on me, I will disappear.</p>
<p>Click me away!</p>
<p>Click me too!</p>


<div id="a">This is another paragraph.</div>

<button>Click me</button>
</body>
</html>
