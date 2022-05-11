<?php
//connexion a la base de données
include("loggonbdd.php");

//prendre l'id grace a l'url
$id = $_GET['id'];

//enlever la ligne de la table
$result = mysqli_query($mysqli, "DELETE FROM typesalle WHERE id=$id");

//rediriger les responsable vers son interface de visusalisation des demandes
header("Location:modiftype.php");
?>