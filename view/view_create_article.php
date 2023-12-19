<h1>Nouvel Article</h1>
<form action="newarticle.php" method="POST">
    <input type="text" name="titleAdd" placeholder="Le Titre" required>
    <input type="text" name="abstractAdd" placeholder="Le Résumé" maxlength="250" required>
    <textarea name="contentAdd" placeholder="Le Contenu" rows="30" cols="20" required></textarea>
    <input type="submit" name="submitAddArticle">
</form>

<p><?php echo $messageAddArticle ?></p>