<!--récupère la session, la détruit, renvois au login-->
<?php
    session_start();
    session_destroy();
    header("location:login.php");
?>