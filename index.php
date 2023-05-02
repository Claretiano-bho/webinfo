<html>

<head>
  <meta http-equiv="refresh" content="600" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/relogio.css">
  <link rel="stylesheet" href="css/datetime.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <script src="bootstrap/js/jquery-min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      var a = 0;
      for (var i = 0; i < 10; i++) {
        $("p").text(i).delay(5000);
      }
      $("#exemplo1 > div").each(function(index, value) {});
    })
  </script>
  <title>Marketing</title>
</head>

<div id="board_imagens">
  <div style="width:85%; height:90%;float:left;top:2px;">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active ">
          <img class="d-block w-100 h-100" src="http://wallpaper.redeclaretiano.edu.br/bho/wallpaper.jpg">
        </div>

        <?php
        //Responsavel por ler e carregar as imagens do diretorio
        $path = './imagens';
        $largura = 120;
        $altura = 180;
        $diretorio = dir($path);
        $autoplay = 'false';
        while ($file = $diretorio->read()) {
          //if ( $file !='.' && $file!='..'){$imagens = substr($file,0,strpos($file,'.'));
          if ($file != '.' && $file != '..') {
            $imagens = $file;
            echo "<div class='carousel-item'>";
            echo "<img class='d-block w-100 h-100' src='imagens/$imagens' >";
            echo "</div>";
          }
        }
        ?>
      </div>
    </div>
  </div>

  <div style=" width:15%; height:auto;float:right;padding-left:0px;">

    <?php
    include('previsao.html');
    ?>
  </div>
  <!---RELOGIO -->
  <div id="relogio"></div>
  <div id="getdata"></div>
  <div>

    <?php
    include('noticias.php');
    ?>
  </div>

</div>
<?php
//CÓDIGO PARA SORTEAR OS VÍDEOS A SEREM MOSTRADOS PARA OS VISITANTES */
$path = "./videos";
$diretorio = dir($path);
while ($arquivos = $diretorio->read()) {

  if ($arquivos != '.'  && $arquivos != "..") {
    $files[] = $path . "/" . $arquivos;
  }
}
$participantes =  count($files);
$sorteado = rand(0, $participantes);
if ($sorteado == 0) {
  $sorteado = 0;
} else if ($sorteado > 0) {
  $sorteado = $sorteado - 1;
}

?>

<div id="board_videos" style="width:90%; padding-top:10px;height:auto; background-color:#fff;position:absolute; z-index:1;top:0px;right:5%;">
  <video width="100%" id="videos" style="border-radius:15px ">
    <source src=<?php echo $files[$sorteado]; ?> type="video/mp4">
  </video>

</div>


</div>

</html>
<script>
  var videos = document.getElementById("videos");
  for (i = 0; i <= 25000; i++) {
    console.log(i);
    if (i === 20555) {
      //var win = window.open('layout.html',"","width="+screen.availWidth+",height="+screen.availHeight,"scrollbars=no, toolbar=no, status=no, location=no,menubar=no,directories=no,resizable=yes");
      document.getElementById("board_videos").style.display = "block";
      document.getElementById("board_imagens").style.opacity = "0.2";
      videos.play();
      setTimeout(function() {
        exec_video();
      }, 32000);
    }

  }

  function exec_video() {
    document.getElementById("board_videos").style.display = "none";
    document.getElementById("board_imagens").style.opacity = "0.9";
    videos.pause();


  }

  function getData() {

    data = new Date();
    let months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "junho", "julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
    let mes = 1 + data.getMonth();
    let getmonths = months[data.getMonth()];
    let dayofmonth = data.getDate();
    document.getElementById("getdata").innerHTML = dayofmonth + " de " + getmonths;
  }

  function print_relogio() {

    var data = new Date;
    var horas = data.getHours();
    var minutos = data.getMinutes();
    var segundos = data.getSeconds();
    if (horas < 10) {

      horas = "0" + horas;
    }
    if (minutos < 10) {

      minutos = "0" + minutos;
    }
    if (segundos < 10) {

      segundos = "0" + segundos;
    }
    document.getElementById("relogio").innerHTML = horas + ":" + minutos + ":" + segundos;
    setTimeout("print_relogio()", 1000);

  }
  getData();
  print_relogio();
</script>