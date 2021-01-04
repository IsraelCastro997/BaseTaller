<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="./styles/estilos.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<script src="https://kit.fontawesome.com/d2775d5ad5.js" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<!-- <script src="./js/jquery-3.3.1.min.js"></script> -->
		
		<script>
				function generator() {
					var x= Math.floor((Math.random()*6)+1);
					console.log(x);
					if(x == 1){
						var intro = document.getElementById('header');
						intro.className = 'header1';
					}else if(x == 2){
						var intro = document.getElementById('header');
						intro.className = 'header2';
						var nav = document.getElementById('nav');
						nav.className = 'nav2';
					}else if(x == 3){
						var intro = document.getElementById('header');
						intro.className = 'header3';
					}else if(x == 4){
						var intro = document.getElementById('header');
						intro.className = 'header4';
					}else if(x == 5){
						var intro = document.getElementById('header');
						intro.className = 'header5';
						var nav = document.getElementById('nav');
						nav.className = 'nav2';
					}else if(x == 6){
						var intro = document.getElementById('header');
						intro.className = 'header6';
					}
					
				}	
		</script>
	</head>
	<body onload ="generator()">
		<div class="padre">
			<header id="header" class="header ">
				<div class="menu margen-interno">
				<div class="logo">
					<a href="index.php">Logo Corporativo<i class="fas fa-industry"></i></a>
				</div>
					<nav class="nav" id="nav">
						<a href="index.php"><i class="fas fa-home">Home</i></a>
						<a href="menuProductos.php"><i class="fas fa-search-dollar"></i>Productos</i></a>
						<a class="nav-link" href="#"><i class="fas fa-envelope"></i>Servicios</a>
						<!-- <a href=""><i class="fas fa-users"></i>Nosotros</a> -->
						<a href="correo.php"><i class="fas fa-comments-dollar"></i>Contactenos</a>

					</nav>
					<div class="">
					Taller en Guadalaraja, Jal.
					</div>

					<div class="social">
						<div ><a href="#"><i class="fab fa-whatsapp"></i></a></div>
						<div ><a href="#"><i class="far fa-envelope"></i></a></div>
						<div ><a href="#"><i class="fab fa-linkedin"></i></a></div>
					</div>
				</div>
				<div class="texto-principal margen-interno">
					<h1></h1>
				</div>
			</header>