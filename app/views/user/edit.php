<h1>Edit</h1>
<form method="post">
    <input type="text" placeholder="Entrer username" name="username" value="<?= $info["username"] ?>">
    <input type="text" placeholder="Entrer email" name="email" value="<?= $info["email"] ?>">
    <input type="password" placeholder="Entrer le pot de passe" name="password" value="<?= $info["password"] ?>">
    <input type="submit" value="Enregistrer" name="modifier_user">
</form>