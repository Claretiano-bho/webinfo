<!DOCTYPE html>
<html>
	<head>
	<link href="https://fonts.googleapis.com/css?family=Roboto:700i&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/_style_importa.css">
	
	<script>
	window.onload=function(){
		
		document.getElementById("botao").style.display = "none";
			
		
	}
	function exibir_button(arquivo){
		
			var delete_image = confirm("Deseja excluir a imagem?");
			if (delete_image == true){
				
				document.write(<?php unlink (arquivo) ?>)
				
			}
	}
	
	</script>
	<title>Importar fotos</title>
	
	</head>
	<h2>Clique na imagem para excluir:</h2>
	<div  style="width:100%; height:auto;float:left;">
	
	<?php
	$dir = "imagens/";
	$diretorio = dir($dir);
	$tes = '';
	while($arquivos = $diretorio -> read()) {
		if ($arquivos == '..' || $arquivos == '.')continue;
		$tes = "imagens/".$arquivos;
		echo "<a class=' btn-excluir' href=deletar.php?del=imagens/".$arquivos." onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\")><img  class='miniaturas' src='./imagens/".$arquivos."' style='width:190px;height:120px;padding:2px;cursor:pointer;'/></a>";
		
		
	}
		
	?>
	
	</div>
	
	<div  id="comandos">
		<?php
	$dir = 'imagens/';
	if (isset($_FILES['upimagem']['name'])){
		$ext = strtolower(substr($_FILES['upimagem']['name'], -3 ));
			if($ext == 'jpg'){	
				echo '<pre>';
					$filename = trim(addslashes($_FILES['upimagem']['name']));
					$name = preg_replace('/\s+/', '_', $filename);
					$name = strtolower($name);
					if (move_uploaded_file($_FILES['upimagem']['tmp_name'], $dir."/".$name)) {
						echo "Arquivo válido e enviado com sucesso.\n";
						echo "<img src='./imagens/".$name."'id='quadro'></img>";
					} else {
					echo "Possível ataque de upload de arquivo!\n";
					}
			}else{
				
				echo "<p>Formato inválido</p>";
			}
	}
	else 
	{
	echo "<p>Favor selecionar a imagem!</p>";	
	}
 ?>
	<form  method="POST" enctype="multipart/form-data" action="#">
		<label for="arquivos" class="btn btn-primary" >Selecionar Arquivos</label>
			<input type="file" id="arquivos"  name="upimagem"></br>
			<button type="submit" class="btn btn-primary" > Enviar</button>
	</form>
	</div>


</html>
