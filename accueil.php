<!-- tester si l'utilisateur est connecté -->
<!-- si session vide, retour au login, sinon affichage nom actuel -->

<?php
                session_start();
                  if($_SESSION['login'] == ""){
              
              header("location:login.php");  }
                
                
?>

                      

<html>
    <head>
        <meta charset="utf-8">
     
    </head>
    <body>

        

        <div >
            <a  href="deconnection.php">Deconnexion</a><br/><br/>
            <a  href="reservation.php">reserver une salle</a><br/><br/>
            <a  href="visualisation.php">visualiser le planning d'une ou plusieurs salles</a><br/><br/>


<?php
                
                $role = $_SESSION['role'];
           if($role =="1"){   ?>

            <a  href="creation.php">création / modification de salle</a><br/><br/>

<?php         
           }
?>


            
        </div>
    </body>
</html>
