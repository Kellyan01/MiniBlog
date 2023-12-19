<?php
    session_start();

    include './utils/functions.php';
    include './utils/bdd.php';
    include './model/model_articles.php';
    include './nav.php';

    $listArticles = "";

    if(isset($_SESSION['id'])){
        $articles=getArticlesByUser($_SESSION['id'],$bdd);
        if(!empty($articles)){
            foreach($articles as $article){
                $listArticles = $listArticles."<article><h2>{$article['title']}</h2><p>{$article['abstract']}</p></article>";
            }

        }else{
            $listArticles = "<p>Pas d'Articles à afficher pour le moment</p>";
        }
    }else{
        header('location:./index.php');
    }

    include './view/header.php';
    include './view/view_articles.php';
    include './view/footer.php';
?>