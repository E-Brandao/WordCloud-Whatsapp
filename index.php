<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Common Words</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="images/favicon.png" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>


	<link href='https://fonts.googleapis.com/css?family=Concert+One' rel='stylesheet'>
	<style>
		body {
		 font-family: 'Concert One';
		}
	</style>


</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<div class="main-warp">
 
		<!-- Page section -->
		<div class="page-section home-page">

			<div class="row">
				<div class="container text-center">
					<p id="title-page">Top words</p>
				</div>
			</div>

			<div class="row" id="tutorial">		
	 			<div class="col-md-3 text-center">
	 				<p>1.Entre na conversa que deseja usar e clique nos 3 pontinhos e depois em "Mais"</p>
	 				<img id="image1" class="item" src="images/passo1.png">
	 			</div>
	 			<div class="col-md-3 text-center">
	 				<p>2.Depois disso, clique na opção "Exportar conversa"</p>
	  				<img id="image2" class="item" src="images/passo2.png">
	 			</div>
	 			<div class="col-md-3 text-center">
	 				<p>3.Logo após, selecione a opção "Sem ficheiros"</p>
	 				<img id="image3" class="item" src="images/passo3.png">
	 			</div>
	 			<div class="col-md-3 text-center">
	 				<p>4.Por fim escolha onde deseja salvar o arquivo que será usado no site</p>
	 				<img id="image4" class="item" src="images/passo4.png">
	 			</div>
 			</div>	

 			<div class="row hidden" id="result">
 				<img id="image-result" src="python/plot.png">
 			</div>

			<div id="bottom-section" class=" bottom-section justify-content-center text-center">
				<div id="title" style="color: white">Select the whatsapp talk:</div>
				<form class="md-form" id="form-select">
					<div class="file-field">
						<div class="btn btn-primary btn-sm float-center">
							<input type="file" id="file">
						</div>
						<button id="send" type="button" class="btn btn-primary">Send</button>
					</div>
				</form>     	
	      	</div>

			<div id="bottom-result" 
			class="bottom-section hidden justify-content-center text-center">
				<form id="form-result" class="md-form">
					<div class="file-field">
						<a href="python/plot.png" id="download" type="submit" 
						class="btn btn-success" download>
						Download photo</a>
						<button id="retry" type="button" class="btn btn-primary">
						Try again</button>
					</div>
				</form>     	
	      </div>

		</div>
		<!-- Page section end-->
	</div>

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>
