<?php
    session_start();
?>


<?php
// connexion a la base de donnée
include_once("loggonbdd.php");
// recuperer les elements concernant l'employe dans la table
$result = mysqli_query($mysqli, "SELECT * FROM typesalle "); 
?>

<html>
<head>	
	<title>Modification du type de la salle</title>
</head>

<body>
<a style='color:black;' href="creation.php">retour en arrière</a><br/><br/>

<div class="box">
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		
		<td>ID</td>
		<td>LIBELLE DE LA SALLE</td>
	</tr>  
	<?php 
	// assignation des élément contenu dans result 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['id']."</td>";
		echo "<td>".$res['libelle']."</td>";	
		echo "<td><a href=\"modiftype2.php?id=$res[id]\">Modifier</a> | <a href=\"deletetype.php?id=$res[id]\" onClick=\"return confirm('Etes-vous sur de vouloir supprimer?')\">Supprimer</a></td>";		
	}
	?>
	</table>
</div>
</body>
</html>

