<?php
    session_start();

    include './utils/functions.php';
    include './utils/bdd.php';
    include './model/model_users.php';
    include './nav.php';


    $messageLogUser = "";

    if(isset($_POST['submitLogUser'])){
        if(isset($_POST['emailLog']) and !empty($_POST['emailLog'])
            and isset($_POST['passwordLog']) and !empty($_POST['passwordLog'])){
            
            $email = sanitize($_POST['emailLog']);
            $password = sanitize($_POST['passwordLog']);

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $user = getUserByMail($email, $bdd);
                if(!empty($user)){
                    if(password_verify($password, $user[0]['passwrd'])){
                        $_SESSION['id'] = $user[0]['id'];
                        $_SESSION['lastName'] = $user[0]['last_name'];
                        $_SESSION['firstName'] = $user[0]['first_name'];
                        $_SESSION['email'] = $user[0]['email'];

                        header('location:./index.php');
                    }else{
                        $messageLogUser = "Mot de Passe incorrect !";
                    }
                }else{
                    $messageLogUser = "Cet email n'existe pas !";
                }
            }else{
                $messageLogUser = "Veuillez remplir correctement votre email !";
            }

        }else{
            $messageLogUser = "Veuillez remplir correctement tous les champs du formulaire !";
        }
    }

    include './view/header.php';
    include './view/view_login_user.php';
    include './view/footer.php';
?>