<?php
//CÓDIGO PHP QUE VALIDA A SESSÃO DO USUÁRIO
session_start();
if ((!isset($_SESSION['login']) == true) and (!isset($_SESSION['password']) == true)) {

	unset($_SESSION['login']);
	unset($_SESSION['password']);

	header('Location:http://www.webinfo1.claretiano/propagandas/login.php');
}
?>

<html>

<head>

	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:700i&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/_style_importa.css">
</head>

<body>
	<h2>Arquivos propagandas :</h2>

	<div id="links"><a href="http://192.168.18.4/propagandas">Visualizar</a></div>


	<div id="imagens">


		<div id="box_imagens">
			<h4 id="titulo">IMAGENS: </h4>
			<?php
			$dir = "imagens/";
			$diretorio = dir($dir);
			$tes = '';
			while ($arquivos = $diretorio->read()) {
				if ($arquivos == '..' || $arquivos == '.') continue;
				$tes = "imagens/" . $arquivos;
				echo "<a class=' btn-excluir' href=deletar.php?del=imagens/" . $arquivos . " onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\")><img id='quadro_imagem' class='miniaturas' src='./imagens/" . $arquivos . "' style='width:190px;height:120px;padding:2px;cursor:pointer;'/></a>";
			}



			?>
		</div>
		<div id="box_videos">
			<h4 id="titulo">VÍDEOS: </h4>
			<?php
			$dir = "videos/";
			$diretorio = dir($dir);
			$tes = '';
			while ($arquivos = $diretorio->read()) {
				if ($arquivos == '..' || $arquivos == '.') continue;
				$tes = "videos/" . $arquivos;

				echo "<video  class='miniaturas' controls src='./videos/" . $arquivos . "' style='width:190px;height:120px;padding:2px;cursor:pointer;'/></video>";
				echo "<a class=' btn-excluir' href=deletar.php?del=videos/" . $arquivos . " onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\")><img src='icons/lixeira.png' style='width:20px;'></a>";
			}

			?>
		</div>


		<div id="comandos">
			<?php
			$dir_imagens = 'imagens/';
			$dir_videos = 'videos';
			if (isset($_FILES['upfile']['name'])) {
				$ext = strtolower(substr($_FILES['upfile']['name'], -3));
				//if ($ext == 'png'){	
				if ($ext == 'jpg' || 'png') {
					echo '<pre>';
					$filename = trim(addslashes($_FILES['upfile']['name']));
					$name = preg_replace('/\s+/', '_', $filename);
					$name = strtolower($name);
					if (move_uploaded_file($_FILES['upfile']['tmp_name'], $dir_imagens . "/" . $name)) {
						echo "Arquivo válido e enviado com sucesso.\n";
						echo "<img src='./imagens/" . $name . "'id='quadro'></img>";
					} else {
						echo "Possível ataque de upload de arquivo!\n";
					}
				} else if ($ext == 'mp4') {
					echo '<pre>';
					$filename = trim(addslashes($_FILES['upfile']['name']));
					$name = preg_replace('/\s+/', '_', $filename);
					$name = strtolower($name);
					if (move_uploaded_file($_FILES['upfile']['tmp_name'], $dir_videos . "/" . $name)) {
						header('Location:importa.php');
					} else {
						echo "Possível ataque de upload de arquivo!\n";
					}
				}
			}
			?>

		</div>
	</div>


	<div id="formulario">
		<form method="POST" enctype="multipart/form-data" action="#">
			<label for="arquivos" class="btn btn-primary">Selecionar Arquivos</label>
			<input type="file" id="arquivos" name="upfile"></br>
			<button type="submit" class="btn btn-primary"> Enviar</button>
		</form>
	</div>
</body>

</html>