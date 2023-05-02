<?php
$del = $_GET['del'];
unlink ($del);
header('Location:importa.php');
?>
