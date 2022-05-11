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

	$id = $_POST['id'];
	
	$libelle = mysqli_real_escape_string($mysqli, $_POST['libelle']);
		
	
	// verifier si les champs sont vides
	if(empty($libelle)  ){	
			echo "<font color='red'>ecrire un type de salle.</font><br/>";
	
	} else {	
		//modification de la table
		$result = mysqli_query($mysqli, "UPDATE typesalle SET libelle='$libelle' WHERE id='$id'");
		
		//rediriger ves la page de visualisation
		header("Location: modiftype.php");
	}
}
?>




<?php
// avoir l'id grace a l'url
$id = $_GET['id'];


//selectioner la donnée en rapport avec l'id
$result = mysqli_query($mysqli, "SELECT * FROM typesalle WHERE id=$id");
//associer les résultats
while($res = mysqli_fetch_array($result))
{
	$id = $res['id'];
    $libelle = $res['libelle'];
	
}
?>







<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>modif-type</title>
    <meta charset="utf-8">
	</head>



<body >
    
<a style='color:black;'href="modiftype.php">Retour en arrière</a><br/><br/>



			
					



						<div class="box">

								<form name="formulaire"  method="post" >


									<label ><b>ID</b></label>
									<input type="text" name="id" value="<?php echo $id;?>" readonly /><br><br>

										<label ><b>Libelle type de salle</b></label>
										<input name="libelle" value="<?php echo $libelle;?>" >
									<input type="submit"  name="update" value="modifier" >
								</form>

			</div> <!-- fin formulaire de modification -->
		
                 

</body>
</html>