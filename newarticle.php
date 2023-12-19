<?php
    session_start();

    include './utils/functions.php';
    include './utils/bdd.php';
    include './model/model_articles.php';
    include './nav.php';

    $messageAddArticle = "";
    if(isset($_SESSION['id'])){
        if(isset($_POST['submitAddArticle'])){
            if(isset($_POST['titleAdd']) and !empty($_POST['titleAdd'])
                and isset($_POST['abstractAdd']) and !empty($_POST['abstractAdd'])
                and isset($_POST['contentAdd']) and !empty($_POST['contentAdd'])){
                
                $title= sanitize($_POST['titleAdd']);
                $abstract = sanitize($_POST['abstractAdd']);
                $content = sanitize($_POST['contentAdd']);

                $messageAddArticle = addArticle($title, $abstract, $content, $_SESSION['id'],$bdd);
            }else{
                $messageAddArticle = "Veuillez remplir correctement tous les champs du formulaire !";
            }
        }
    }else{
        header('location:./index.php');
    }


    include './view/header.php';
    include './view/view_create_article.php';
    include './view/footer.php';
?>