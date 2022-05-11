<?php
                session_start();
?>



<?php
// connexion a la base de donnée
include_once("loggonbdd.php");
?>




<?php


if(isset($_POST['update']))
{	

	$id = $_POST['idsalle'];
    $type = $_POST['type'];

		//modification de la table
		$result = mysqli_query($mysqli, "UPDATE salle SET type_salle='$type' WHERE idsalle=$id");
		
		//rediriger ves la page de visualisation
		header("Location: modifsalle.php");
	
}
?>




<?php
// avoir l'id grace a l'url
$id = $_GET['id'];

?>







<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modif-salle</title>
	</head>
<body >
    
<a style='color:black;'href="modifsalle.php">Retour en arrière</a><br/><br/>



								<form   method="post" >


									<label ><b>IDSALLE</b></label>
									<input type="text" name="idsalle" value="<?php echo $id;?>" readonly /><br><br>
                                    <label ><b>type de salle</b></label>
                                    <select name="type" >
                                       <?php
                                        $resultat = mysqli_query($mysqli, "SELECT id,libelle FROM typesalle"); 
                                        

                                            while($ress = mysqli_fetch_array($resultat)) {                    
                                                  echo "<option value=".$ress['id'].">".$ress['libelle']."</option>";
                                            }
                                        ?>
                 
                                        </select>

										
									
									<input type="submit"  name="update" value="modifier">
								</form>

			</div> <!-- fin formulaire de modification -->
		                   

</body>
</html>