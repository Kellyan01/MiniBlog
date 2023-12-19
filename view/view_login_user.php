<h1>Connexion</h1>
<form action="login.php" method="POST">
    <input type="text" name="emailLog" placeholder="Votre Email" required>
    <input type="password" name="passwordLog" placeholder="Votre Mot de Passe" required>
    <input type="submit" name="submitLogUser">
</form>

<p><?php echo $messageLogUser ?></p>