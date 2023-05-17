<?php
    $users = $result["data"]['users'];
?>

<h1 class="title-page">Liste des membres</h1>
<table class="tableListUsers">
    <thead>
        <tr>
            <th>Membre</th>
            <th>Email</th>
            <th>Inscrit le :</th>
            <th>Status</th>
            <th>Banni</th>
            <th>Sup</th>
        </tr>
    </thead>

    <tbody> 
    <?php
    // Condition si status = user
    if(App\Session::getUser()->getStatus() == 'admin') {

        foreach($users as $user) {
        ?>
            <tr>
                <td><a href="index.php?ctrl=security&action=listUsers&id=<?= $user->getId() ?>"><?= $user->getPseudo() ?></a></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getRegisterDate() ?></td>
                <td><?= $user->getStatus() ?> <button class="modifStatus" onclick="window.location.href = 'index.php?ctrl=security&action=updateStatus&id=<?= $user->getId() ?>';">Modif</button></td>
                
                <td><?= $user->getBanish() ?></td>
                <td><a href="index.php?ctrl=security&action=removeUserById&id=<?= $user->getId() ?>">Del</a></td>
            </tr>            
        <?php }
    } else {
        ?>
        <form method="post" action="index.php?ctrl=security&action=removeUserById">

            <label for="pseudo">Supprimer un membre</label>
            <input type="text" name="pseudo" id="pseudo" required>

            <input type="submit" name="submit" value="Envoyer">
        </form>
    <?php } ?>
    </tbody>
</table>