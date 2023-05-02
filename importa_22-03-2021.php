<?php
//CÓDIGO PHP QUE VALIDA A SESSÃO DO USUÁRIO
session_start();
if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['password']) == true)){
    
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
    <div id="container">
        <div id="tabs">
            <nav>
                <ul>
                <li><a href="#" onclick="painel_imagens();">Imagens</a></li>
                <li><a href="#" onclick="painel_videos();">Videos</a></li>
		<li><a href="http://192.168.18.4/propagandas">Visualizar</a></li>
                </ul>
            </nav>
	</div>
	<div id="imagens">
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
		if ($ext == 'jpg'){	
		//if($ext == 'jpg' || 'png'){	
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
        </div>
        
        
        
        <div id="videos">
        
            <script>
	window.onload=function(){
		
		document.getElementById("botao").style.display = "none";
			
		
	}
	function exibir_button(arquivo){
		
			var delete_image = confirm("Deseja excluir a imagem?");
			if (delete_image == true){
				
				document.write(<?php unlink ($arquivo) ?>)
				
			}
	}
	
	</script>
	<h2>Clique no vídeo para excluir:</h2>
	<div  style="width:100%; height:auto;float:left;">
	
	<?php
	$dir = "videos/";
	$diretorio = dir($dir);
	$tes = '';
	while($arquivos = $diretorio -> read()) {
		if ($arquivos == '..' || $arquivos == '.')continue;
		$tes = "videos/".$arquivos;
       
		echo "<video  class='miniaturas' controls src='./videos/".$arquivos."' style='width:190px;height:120px;padding:2px;cursor:pointer;'/></video>";
         echo "<a class=' btn-excluir' href=deletar.php?del=videos/".$arquivos." onclick=\"return confirm('Tem certeza que deseja deletar esse registro?');\")><img src='icons/lixeira.png' style='width:20px;'></a>";
        
		
		
	}
		
	?>
	
	</div>
	
	<div  id="comandos">
		<?php
	$dir = 'videos/';
	if (isset($_FILES['upvideo']['name'])){
		$ext = strtolower(substr($_FILES['upvideo']['name'], -3 ));
			if($ext == 'mp4'){	
				echo '<pre>';
					$filename = trim(addslashes($_FILES['upvideo']['name']));
					$name = preg_replace('/\s+/', '_', $filename);
					$name = strtolower($name);
					if (move_uploaded_file($_FILES['upvideo']['tmp_name'], $dir."/".$name)) {
						echo "Arquivo válido e enviado com sucesso.\n";
						echo "<video src='./videos/".$name."'id='quadro'></video>";
					} else {
					echo "Possível ataque de upload de arquivo!\n";
					}
			}else{
				
				echo "<p>Formato inválido</p>";
			}
	}
	else 
	{
	echo "<p>Favor selecionar a video!</p>";	
	}
 ?>
	<form  method="POST" enctype="multipart/form-data" action="#">
		<label for="arquivos" class="btn btn-primary" >Selecionar Arquivos</label>
			<input type="file" id="arquivos"  name="upvideo"></br>
			<button type="submit" class="btn btn-primary" > Enviar</button>
	</form>
	</div>
            
        </div>
    
    </body>
</html>
<script>
    window.onload=function(){
        
        document.getElementById("imagens").style.display = 'block';
        document.getElementById("videos").style.display = 'none';
    }
    
    function painel_videos(){
        
        document.getElementById("videos").style.display = 'block';
        document.getElementById("imagens").style.display = 'none';
        
    }
    function painel_imagens(){
        
         document.getElementById("videos").style.display = 'none';
        document.getElementById("imagens").style.display = 'block';
        
    }

</script>
    

