<?php
// connexion a la base de donnée
include_once("loggonbdd.php");
// recuperer les elements de reservation (heure de reservation par jour)

$date=date('Y-m-d');
echo $date;      

$result = mysqli_query($mysqli, "DELETE from reservation WHERE jour<'$date'; "); 
header("location:visualisation.php");
?>