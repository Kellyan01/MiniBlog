<?php
    function addArticle($title, $abstract, $content, $idUser, $bdd){
        try{
            $req=$bdd->prepare('INSERT INTO articles (title, abstract, content, id_user) VALUES (?,?,?,?)');

            $req->bindParam(1,$title,PDO::PARAM_STR);
            $req->bindParam(2,$abstract,PDO::PARAM_STR);
            $req->bindParam(3,$content,PDO::PARAM_STR);
            $req->bindParam(4,$idUser,PDO::PARAM_INT);

            $req->execute();

            return 'L\'article "'.$title.'" a été enregistré avec succès !';

        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    function getAllArticles($bdd){
        try{
            $req=$bdd->prepare('SELECT articles.id, articles.title, articles.abstract, articles.content, articles.id_user FROM articles');

            $req->execute();

            $data = $req->fetchAll();

            return $data;

        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    function getArticlesByUser($idUser, $bdd){
        try{
            $req=$bdd->prepare('SELECT articles.id, articles.title, articles.abstract, articles.content, articles.id_user FROM articles WHERE articles.id_user = ?');

            $req->bindParam(1,$idUser,PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll();

            return $data;

        }catch(Exception $error){
            return $error->getMessage();
        }
    }
?>