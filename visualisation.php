
<?php
// connexion a la base de donnée
include_once("loggonbdd.php");
// recuperer les elements de reservation (heure de reservation par jour)
$result = mysqli_query($mysqli, "SELECT `libelle`,`jour`,`id_salle`, GROUP_CONCAT(`heure`) AS concat_heure FROM `reservation` inner join salle ON reservation.id_salle=salle.idsalle INNER JOIN typesalle ON salle.type_salle=typesalle.id GROUP BY `jour`,`id_salle`; "); 
?>

<html>
<head>	
	<title>Planing de toutes les salles</title>
	<link rel="stylesheet" href="style/employe.css" type="text/css" media="all" >
</head>

<body>
<a style='color:black;' href="accueil.php">Accueil</a><br/><br/>
<h1>Planning de toutes les salles</h1>
<h5>Attention les salles sont réservées par tranches de une heure</h5>
<a  href="purger.php">supprimer les reservations passées</a><br/><br/>

<div class="box">
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		
		<td>nom de la salle</td>
		<td>heures réservées</td>
		<td>date</td>
	</tr>  
	<?php 
	// assignation des élément contenu dans result 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['libelle']." ".$res['id_salle']."</td>";
		echo "<td>".$res['concat_heure']."</td>";	
		echo "<td>".$res['jour']."</td>";
				
	}
	?>
	</table>
</div>

<h3>Planning d'une salle pour les 7 prochains jours</h3>



<form method="POST" >

<div >
            <label ><b>Planning de la salle</b></label>          
            <select name="salle" >
                       <?php
                        $salle="salle n";
                        $type="de type ";
                        $resultat = mysqli_query($mysqli, "SELECT idsalle,libelle FROM salle INNER JOIN typesalle ON salle.type_salle=typesalle.id "); 
                        

                            while($ress = mysqli_fetch_array($resultat)) {                    
                                  echo "<option value=".$ress['idsalle'].">".$ress['libelle']." ".$ress['idsalle']."</option>";
                            }
                        ?>
 
             </select>
             <input type="submit" name="submit" value="visualiser" >
 </div>
                    
</form>
<?php    
if(isset($_POST['submit']))
{	
$salle=$_POST['salle'];
$result = mysqli_query($mysqli, "SELECT `libelle`,`jour`,`id_salle`, GROUP_CONCAT(`heure`) AS concat_heure FROM `reservation` inner join salle ON reservation.id_salle=salle.idsalle INNER JOIN typesalle ON salle.type_salle=typesalle.id where id_salle='$salle' and reservation.jour <= now() + interval 7 day GROUP BY `jour`,`id_salle` ORDER BY jour; "); 

}
?>


<div class="box">
	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		
		<td>nom de la salle</td>
		<td>heures réservées</td>
		<td>date</td>
	</tr>  
	<?php 
	// assignation des élément contenu dans result 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td>".$res['libelle']." ".$res['id_salle']."</td>";
		echo "<td>".$res['concat_heure']."</td>";	
		echo "<td>".$res['jour']."</td>";
				
	}
	?>
	</table>
</div>





</body>
</html>








