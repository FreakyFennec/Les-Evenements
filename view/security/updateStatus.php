<?php
    $user = $result["data"]['user'];
?>

<div id="boxUpdateStatus" name="box">
    <h3 class="titleformUpdateStatus">Modifier le status</h3>

    <form id="formUpdateStatus" method="POST" action="index.php?ctrl=security&action=updateStatus&id=<?= $user->getId() ?>">
        
        <input type="radio" name="status" value="user" id="user">
        <label for="user">user</label> 
        
        <input type="radio" name="status" value="moderator" id="moderator">
        <label for="moderator">moderator</label> 
        
        <input type="radio" name="status" value="admin" id="admin">
        <label for="admin">admin</label> 

        <input id="submit" type="submit" name="submit" value="Submit">

    </form>
</div>