<?php
    session_start();
?>


<?php
// connexion a la base de donnée
include_once("loggonbdd.php");
// recuperer les elements concernant l'employe dans la table
$result = mysqli_query($mysqli, "SELECT idsalle,type_salle,libelle FROM salle inner join typesalle on salle.type_salle=typesalle.id; "); 
?>

<html>
<head>	
	<title>Modification de la salle</title>
</head>

<body>
<a style='color:black;' href="creation.php">retour en arrière</a><br/><br/>

<div class="box">
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		
		<td>ID</td>
		<td>nom de la salle</td>
	</tr>  
	<?php 
	// assignation des élément contenu dans result 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['idsalle']."</td>";
		echo "<td>".$res['libelle']." ".$res['idsalle']."</td>";	
		echo "<td><a href=\"modifsalle2.php?id=$res[idsalle]\">Modifier</a> | <a href=\"deletesalle.php?id=$res[idsalle]\" onClick=\"return confirm('Etes-vous sur de vouloir supprimer?')\">Supprimer</a></td>";		
	}
	?>
	</table>
</div>
</body>
</html>

