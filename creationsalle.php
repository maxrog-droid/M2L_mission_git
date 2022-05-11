<?php 
include_once("loggonbdd.php");
if(isset($_POST['submit']))
{	

$salle=$_POST['salle'];
$add = mysqli_query($mysqli,  "INSERT INTO `salle` (`idsalle`, `type_salle`) VALUES (NULL, '$salle');");
header('location:creation.php?valide=1'); 

}

?>