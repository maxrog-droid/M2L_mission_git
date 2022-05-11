<?php
include_once("loggonbdd.php");
//include_once("config.php");

if(isset($_POST['submit']))
{	


$reservateur=$_POST['idreservateur'];
$date=$_POST['date'];
$salle=$_POST['salle'];
$heure=$_POST['heure'];





            
    	   $qry="SELECT * FROM reservation WHERE id_salle='$salle' AND heure='$heure' AND jour='$date'";
            $result=mysqli_query($mysqli,$qry);
    
                if($result) {
               		if(mysqli_num_rows($result) > 0) {
        
           				 header('location:reservation.php?erreur=1');    
      				}
        			
				}
				
				if(mysqli_num_rows($result) == 0){
					$add = mysqli_query($mysqli,  "INSERT INTO `reservation` (`idreservation`, `id_salle`, `id_reservateur`, `heure`, `jour`) VALUES (NULL, '$salle', '$reservateur', '$heure', '$date');");

				

					
						header('location:reservation.php?valide=1'); 
            		
					

				}
}




