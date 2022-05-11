<?php
 session_start();
include_once("loggonbdd.php");


if(isset($_GET['valide'])){
    $ok = $_GET['valide'];
    if($ok==1 )
        echo "<p style='color:green'>Votre salle a été crée</p>";
}

if(isset($_GET['valide'])){
    $ok = $_GET['valide'];
    if($ok==2 )
        echo "<p style='color:green'>Le nouveau type de salle a été crée</p>";
}

?>



<html>
    <head>
        <meta charset="utf-8">
     
    </head>
    <body>

    <a  href="accueil.php">retour en arrière</a><br/><br/>    
            
        <form  action="creationsalle.php" method="POST" >

                <div >
                            <label ><b>creation de salle</b></label>          
                            <select name="salle" >
                                       <?php
                                        $resultat = mysqli_query($mysqli, "SELECT id,libelle FROM typesalle"); 
                                        

                                            while($ress = mysqli_fetch_array($resultat)) {                    
                                                  echo "<option value=".$ress['id'].">".$ress['libelle']."</option>";
                                            }
                                        ?>
                 
                             </select>
                 </div>

                                    
                                        
                                  
                                    <input type="submit" name="submit" value="creer" >
        </form>





        <form  action="creationtype.php" method="POST" >

<div >
            <label ><b>creation un nouvea type de salle</b></label>          
            <input type="text" name="type"  > </div>

                    
                        
                  
                    <input type="submit" name="submit" value="creer" >
</form>


            <a  href="modifsalle.php">Modifier/supprimer une salle</a><br/><br/>
            <a  href="modiftype.php">Modifier/supprimer un type de salle</a><br/><br/>





    </body>
</html>