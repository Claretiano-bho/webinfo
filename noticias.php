<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="https://fonts.googleapis.com/css?family=Roboto:700i&display=swap" rel="stylesheet"> 
<meta http-equiv="Content-Type" content="text/html; 
charset=iso-8859-1" />
</head>
<body >
<?php
$context = stream_context_create(array('ssl'=>array(
    'verify_peer' => false, 
    "verify_peer_name"=>false
    )));

libxml_set_streams_context($context);
//$link = "https://atarde.uol.com.br/arquivos/rss/educacao.xml"; 2021	
    $link ="https://feeds.folha.uol.com.br/educacao/rss091.xml";
    //link do arquivo xml
    $xml = simplexml_load_file($link) -> channel; 
	$dados = '';
    foreach($xml -> item as $item){ 
	$cont = count($item);
		
			
			$dados.= ($item -> title )." - ";
			
		
    
        
		
    } //fim do foreach
	echo "<marquee scrollamount='15'><strong style='font-family:Roboto; font-size:120px;color:black;'>".$dados."</strong></marquee>";
?>
</body>
</html>
  
