<html>

<head>
	<meta http-equiv="refresh" content="20" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery-min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<script>
		var banners = "imagens/FACE_semana_patria.png";
		var banners1 = ["imagens/FACE_junina_2018_bh.png", "imagens/FACE_semana_patria.png", "imagens/wallpaper.jpg"];
		banners1[3] = "imagens/FACE_COL_dia_dos_avos(1).png";
		var qtd_imagem = 0;
		var i = 0;
		window.onload = function slide() {
			document.getElementById("imagem1").src = banners1[i];
			i = i + 1;
			if (i > (banners1.length)) {
				i = 0;
			}
			setInterval(slide, 5000);
		}
	</script>
	<title>Teste de lista </title>
</head>

<body>
	<img id="imagem1" onload="slide()" width="100%" height="100%"></img>
</body>

</html>