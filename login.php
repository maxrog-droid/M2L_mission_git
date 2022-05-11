<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>m2l2 login</title>
    <meta charset="utf-8">
    

</head>
<body >

   


<div >
<!-- formulaire POST qui envoie les message et prepare un message d'érreur -->
           <form  action="verification.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Identifiant</b></label>
                <input type="text" placeholder="Entrer le login" name="login" required>
               <br>
               <br>
                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                <br>
               <br>
                <input type="submit" id='submit' value='SE CONNECTER' >
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 )
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                
                ?>
            </form>
    </div>
</div>

    

</body>
</html>