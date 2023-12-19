<?php
    session_start();

    include './utils/functions.php';
    include './utils/bdd.php';
    include './model/model_users.php';
    include './nav.php';
    if(isset($_SESSION['id'])){

        $myAccount = "<p>Nom : {$_SESSION['lastName']}</p><p>Prénom : {$_SESSION['firstName']}</p><p>Email : {$_SESSION['email']}</p>";
    }else{
        header('location:./index.php');
    }

    include './view/header.php';
    include './view/view_user.php';
    include './view/footer.php';
?>