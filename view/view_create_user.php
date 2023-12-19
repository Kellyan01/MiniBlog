<h1>Inscription</h1>
<form action="signin.php" method="POST">
    <input type="text" name="lastNameAdd" placeholder="Votre Nom" required>
    <input type="text" name="firstNameAdd" placeholder="Votre Prénom" required>
    <input type="text" name="emailAdd" placeholder="Votre Email" required>
    <input type="text" name="passwordAdd" placeholder="Votre Mot de Passe" required>
    <input type="submit" name="submitAddUser">
</form>

<p><?php echo $messageAddUser ?></p>