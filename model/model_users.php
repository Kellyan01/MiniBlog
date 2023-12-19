<?php
    function addUser($lastName, $firstName, $email, $password, $bdd){
        try{
            $req=$bdd->prepare('INSERT INTO users (last_name, first_name, email, passwrd) VALUES (?,?,?,?)');

            $req->bindParam(1,$lastName,PDO::PARAM_STR);
            $req->bindParam(2,$firstName,PDO::PARAM_STR);
            $req->bindParam(3,$email,PDO::PARAM_STR);
            $req->bindParam(4,$password,PDO::PARAM_STR);

            $req->execute();

            return "$firstName $lastName a été enregistré avec succès !";

        }catch(Exception $error){
            return $error->getMessage();
        }
    }

    function getUserByMail($email, $bdd){
        try{
            $req=$bdd->prepare('SELECT users.id, users.last_name, users.first_name, users.email, users.passwrd FROM users WHERE email = ?');

            $req->bindParam(1,$email,PDO::PARAM_STR);

            $req->execute();

            $data = $req->fetchAll();

            return $data;

        }catch(Exception $error){
            return $error->getMessage();
        }
    }

?>