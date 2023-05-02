<html>
<head>
<meta http-equiv="refresh" content="600" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/jquery-min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
var a=0;


	for(var i=0;i<10;i++){
	
$("p").text(i).delay(5000);	
	
}
$("#exemplo1 > div").each( function(index, value) {

	    console.log( 'div: ' + $(this).attr('id') );

	});

})
</script>
<title>Marketing</title>
</head>

<div id="board_imagens" >
	<div style="width:85%; height:90%;float:left;top:2px;">
  
  
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"  >
  <div class="carousel-inner" >
  <div class="carousel-item active " >
  <img class="d-block w-100 h-100" src="http://wallpaper.redeclaretiano.edu.br/bho/wallpaper.jpg" >
    </div>
 
<?php
$path ='./imagens';
$largura=120;
$altura=180;
$diretorio = dir($path);
$autoplay='false';
while ($file = $diretorio -> read()){
        if ( $file !='.' && $file!='..'){$imagens = substr($file,0,strpos($file,'.'));



echo "<div class='carousel-item'>";
echo "<img class='d-block w-100 h-100' src='imagens/$imagens.jpg' >";
echo "</div>";
}
}	
?>
      
    
	
 
  </div>
 </div> 
</div>

<div style=" width:15%; height:auto;float:right;padding-left:3px;">

<?php
include ('previsao.html');
?>
	</div>
<div>

<?php
include ('noticias.php');
?>
	</div>
	
</div>
<div id="board_videos" style="width:90%; height:auto; background-color:#fff;display:none;position:relative; top:-1300px;margin:auto;">
    <video width="100%" id="videos" style="border-radius:15px ">
    <source src="./videos/gustavolima.mp4" type="video/mp4">
    </video>
    
    </div>

<script>

    var videos = document.getElementById("videos");
    for(i=0; i<=25000 ; i++){
        if( i === 20555){
        //var win = window.open('layout.html',"","width="+screen.availWidth+",height="+screen.availHeight,"scrollbars=no, toolbar=no, status=no, location=no,menubar=no,directories=no,resizable=yes");
        document.getElementById("board_videos").style.display = "block";
        document.getElementById("board_imagens").style.opacity = "0.2";
        videos.play();
        setTimeout(function () { teste();}, 32000);
        }
        
    }
    function teste(){
        document.getElementById("board_videos").style.display = "none";
         document.getElementById("board_imagens").style.opacity = "0.9";
        videos.pause();
        
        
    } 
    
</script>

</html>
