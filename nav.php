<?php
    $nav="";
    if(isset($_SESSION['email'])){
        $nav="<a href='blog.php'>Mon Blog</a><a href='newarticle.php'>Créer un Article</a><a href='account.php'>Mon Compte</a><a href='deco.php'>Déconnexion</a>";
    }else{
        $nav="<a href='login.php'>Connexion</a><a href='signin.php'>Inscription</a>";
    }
?>