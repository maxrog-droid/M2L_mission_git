<?php
 session_start();
include_once("loggonbdd.php");


                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 )
                        echo "<p style='color:red'>Le créneau voulu n'est pas disponible</p>";
                }

                if(isset($_GET['valide'])){
                    $ok = $_GET['valide'];
                    if($ok==1 )
                        echo "<p style='color:green'>Votre créneau a été réservé</p>";
                }

?>

<html>
    <head>
        <meta charset="utf-8">
     
    </head>
    <body>

    <a  href="accueil.php">retour en arrière</a><br/><br/>
            
        <form  action="verifreservation.php" method="POST" >

                <div >
                            <label ><b>Salle a reservée</b></label>          
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
                 </div>


                                   

                        <label >Heure de reservation</label>
                            <select name="heure">
                                       
                                <option value="8">8H-9H</option>
                                <option value="9">9H-10H</option>
                                <option value="10">10H-11H</option>
                                <option value="11">11H-12H</option>
                                <option value="12">12H-13H</option>
                                <option value="13">13H-14H</option>
                                <option value="14">14H-15H</option>
                                <option value="15">15H-16H</option>
                                <option value="16">16H-17H</option>
                                <option value="17">17H-18H</option>
                                <option value="18">18H-19H</option>
                                <option value="19">19H-20H</option>
                                      
                            </select><br><br>


                           <label >Date:</label>
                           
                          <?php $date=date('Y-m-d');  ?>
                           <input type="date"  name="date" value=<?php echo "$date" ?> min="2021-01-01" >
                                    
                                        
                                    <input type="hidden" name="idreservateur" value=<?php echo $_SESSION['id']?>>
                                    <input type="submit" name="submit" value="RESERVER" >
        </form>






    </body>
</html>