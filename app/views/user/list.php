<form action="" method="post">
    <input type="text" placeholder="search" name="user_search">
    <input type="submit" value="chercher" name="search">
</form>
<a href="?add">Add</a>
<h2>La liste des utilisateurs</h2>
<table>
    <tr>
        <th>Username</th>
        <th>email</th>
        <th>option</th>
    </tr>
    <?php for ($i=0; $i < count($users); $i++):?>
        <tr>
            <td><?= $users[$i]["username"]; ?></td>
            <td><?= $users[$i]["email"]; ?></td>
            <td>
                <a href="?edit=<?= $users[$i]["id"]; ?>">edit</a>
                <a href="?supp=<?= $users[$i]["id"]; ?>">delete</a>
            </td>
        </tr>
    <?php endfor;?>
</table>