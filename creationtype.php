<?php 
include_once("loggonbdd.php");
if(isset($_POST['submit']))
{	

$type=$_POST['type'];
echo $type;
$add = mysqli_query($mysqli,  "INSERT INTO `typesalle` (`id`, `libelle`) VALUES (NULL, '$type');");
header('location:creation.php?valide=2'); 

}

?>