<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
   <link rel="icon" href="img/yoda4.ico">
   
  
  <title>Yoda</title>
</head>
<body>

	<div id="yoda">
		<div class="bouton pretitre">
		</div>
		<div class="bouton titre">
		</div>
		<div class="bouton generique">
		</div>
		<div class="bouton selectchrome">
		</div>
		
	</div>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		
	$(document).ready(function() {
  		setTimeout(function() 
  		{
  		$(".pretitre").html('<p id="franklinbleu">En ce moment, dans <br>cette galaxie-ci, tout <br>tout près...</p>').fadeIn(550).delay(2000).fadeOut(500);
		}, 10);
		setTimeout(function() 
  		{
			$(".titre").html('<h1 id="yodatitre">LA GUERRE<br>DES browsers</h1>').fadeIn(300).delay(2000).fadeOut(500);
		}, 2960);
		setTimeout(function() 
  		{
		$("body").css({"perspective":"200px","-moz-perpective":"200px"});
		$(".generique").html('<p id="generique">Dans tout l\'univers connu, se livre<br>un combat sans merci entre tous<br>ces navigateurs qui vous permettent<br>de surfer sur le net. Pour cette<br>raison, nous vous demandons de choisir<br>dans le menu déroulant, en espérant<br>qu\'il en fera partie,<br>celui que vous utilisez:</p>');
		}, 5950);
			setTimeout(function() 
  		{
  			$(".generique").slideUp(100);
  			$(".selectchrome").html('<form id="yoda2" action="index.php" method="POST"><h2>Veuillez indiquer le navigateur que vous utilisez:</h2><select name="navigateur" id="choixnavigateur"><option value="chrome">Chrome</option><option value="chrome">Opera</option><option value="firefox">Firefox</option><option value="safari">Safari</option><option value="firefox">Explorer</option></select><br><button name="accesausite" id="accesausite" value="ok" type="submit">Accédez au site</button></form>');
  		}, 25950);
	});
	</script>

</body>
</html>