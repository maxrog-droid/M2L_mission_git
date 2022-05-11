<?php
session_start();


if(isset($_POST['login']) && isset($_POST['password']))
{

// connexion a la base de donnée
include_once("loggonbdd.php");



      $login = mysqli_real_escape_string($mysqli,htmlspecialchars($_POST['login']) );
        $mdp = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['password']) );
        $password = md5($mdp);
        
        if($login !== "" && $password !== ""){
            
            $qry="SELECT * FROM utilisateur WHERE login='$login' AND password='$password'";
            $result=mysqli_query($mysqli,$qry);
            var_dump($result);
    
    
              if($result) {

                if(mysqli_num_rows($result) > 0) {
            
            
                  $member = mysqli_fetch_assoc($result);
                  $_SESSION['id']= $member['num_uti'];
                  $_SESSION['login'] = $member['login'];
                  $_SESSION['role'] = $member['role'];
            
            
            
            
                  header("location: accueil.php");
            
                }
              }else{
                //si erreur
                header('Location: login.php?erreur=1'); 
              }
             

        
        }
            
}
   

else
    {
   header('Location: login.php');
    }
mysqli_close($mysqli); // fermer la connection
?>
