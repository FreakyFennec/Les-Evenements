<?php
    $users = $result["data"]['users'];
?>

<h1 class="title-page">Admin</h1>

<h2>Gestion des membres</h2>

<?php
    include("index.php?ctrl=security&action=listUser.php");
?>
<h2>Gestion des événements</h2>

<h2>Gestion des commentaires</h2>