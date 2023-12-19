<?php
    session_start();

    include './utils/functions.php';
    include './utils/bdd.php';
    include './model/model_users.php';
    include './nav.php';


    $messageAddUser = "";

    if(isset($_POST['submitAddUser'])){
        if(isset($_POST['lastNameAdd']) and !empty($_POST['lastNameAdd'])
            and isset($_POST['firstNameAdd']) and !empty($_POST['firstNameAdd'])
            and isset($_POST['emailAdd']) and !empty($_POST['emailAdd'])
            and isset($_POST['passwordAdd']) and !empty($_POST['passwordAdd'])){
            
            $lastName = sanitize($_POST['lastNameAdd']);
            $firstName = sanitize($_POST['firstNameAdd']);
            $email = sanitize($_POST['emailAdd']);
            $password = sanitize($_POST['passwordAdd']);

            $password = password_hash($password, PASSWORD_BCRYPT);

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $user = getUserByMail($email, $bdd);
                if(empty($user)){
                    $messageAddUser = addUser($lastName, $firstName, $email, $password, $bdd);
                }else{
                    $messageAddUser = "Cet email existe déjà !";
                }
            }else{
                $messageAddUser = "Veuillez remplir correctement votre email !";
            }

        }else{
            $messageAddUser = "Veuillez remplir correctement tous les champs du formulaire !";
        }
    }

    include './view/header.php';
    include './view/view_create_user.php';
    include './view/footer.php';
?>