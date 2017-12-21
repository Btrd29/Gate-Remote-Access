<?php
$request = $_POST['reponse1'];
$request2 = $_POST['reponse2'];
$request3 = $_POST['reponse3'];

//Bombardements
if (strtoupper($request)=='PAGE 14') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../base.css">
</head>
<body>
	<form method="post">
		<input type="text" name="reponse2" size="15">
		<input type="submit" value="valider">
	</form>
	<img src="page_14.png" style="width:1200px; height:auto ">
</body>
</html>
<?php
//Lampadaire
} else if (strtoupper($request2)=='LONDRES') {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../base.css">
	<script type="text/javascript">
		var snow = {

			wind : 0,
			maxXrange : 100,
			minXrange : 10,
			maxSpeed : 2,
			minSpeed : 1,
			color : "#fff",
			char : "*",
			maxSize : 20,
			minSize : 8,

			flakes : [],
			WIDTH : 0,
			HEIGHT : 0,

			init : function(nb){
				var o = this,
				frag = document.createDocumentFragment();
				o.getSize();



				for(var i = 0; i < nb; i++){
					var flake = {
						x : o.random(o.WIDTH),
						y : - o.maxSize,
						xrange : o.minXrange + o.random(o.maxXrange - o.minXrange),
						yspeed : o.minSpeed + o.random(o.maxSpeed - o.minSpeed, 100),
						life : 0,
						size : o.minSize + o.random(o.maxSize - o.minSize),
						html : document.createElement("span")
					};

					flake.html.style.position = "absolute";
					flake.html.style.top = flake.y + "px";
					flake.html.style.left = flake.x + "px";
					flake.html.style.fontSize = flake.size + "px";
					flake.html.style.color = o.color;
					flake.html.appendChild(document.createTextNode(o.char));

					frag.appendChild(flake.html);
					o.flakes.push(flake);
				}

				document.body.appendChild(frag);
				o.animate();
			},

			animate : function(){
				var o = this;
				for(var i = 0, c = o.flakes.length; i < c; i++){
					var flake = o.flakes[i],
					top = flake.y + flake.yspeed,
					left = flake.x + Math.sin(flake.life) * flake.xrange + o.wind;
					if(top < o.HEIGHT - flake.size - 10 && left < o.WIDTH - flake.size && left > 0){
						flake.html.style.top = top + "px";
						flake.html.style.left = left + "px";
						flake.y = top;
						flake.x += o.wind;
						flake.life+= .01;
					}
					else {
						flake.html.style.top = -o.maxSize + "px";
						flake.x = o.random(o.WIDTH);
						flake.y = -o.maxSize;
						flake.html.style.left = flake.x + "px";
						flake.life = 0;
					}
				}
				setTimeout(function(){
					o.animate();
				},20);
			},

			random : function(range, num){
				var num = num?num:1;
				return Math.floor(Math.random() * (range + 1) * num) / num;
			},

			getSize : function(){
				this.WIDTH = document.body.clientWidth || window.innerWidth;
				this.HEIGHT = document.body.clientHeight || window.innerHeight;
			}

		};
	</script>
	<script type="text/javascript">
		window.onload = function(){
			snow.init(50);
		};
	</script>
</head>
<body>
	<video autoplay loop>
		<source src="bis.mp4" type="video/mp4">
	</video>
	<form method="post">
		<input type="text" name="reponse3" size="15">
		<input type="submit" value="valider">
	</form>
</body>
</html>

<?php
} else if(strtoupper($request3) == 'ARMOIRE') {
	header('Location: /panneaudadministration/hub');
//Première arrivée sur la page
} else {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../base.css">
</head>
<body>
	<h1>Je ne suis pas à la Une</h1>
	<form method="post">
		<input type="text" name="reponse1" size="15">
		<input type="submit" value="valider">
	</form>
</body>
</html>

<?php
}
?>