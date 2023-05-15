<?php
    $event = $result["data"]['event'];
?>

<div id="box" name="box">
    <h1 class="titleAddEvent">Modifier un événement</h1>

    <form id="formRegister" method="POST" action="index.php?ctrl=event&action=updateEvent">

        <label for="titleEvent">Titre :</label>
        <input type="text" id="titleEvent" name="titleEvent" required value="<?= $event->getTitleEvent() ?>">

        <label for="description">Description :</label>
        <textarea name="description" id="description" cols="30" rows="10" required><?= $event->getDescription() ?></textarea>

        <label for="zipcode">Code postal :</label>
        <input type="number" id="zipcode" name="zipcode" required value="<?= $event->getZipcode() ?>"> 

        <label for="address">Adresse :</label>
        <input type="text" id="address" name="address" required>

        <label for="city">Ville :</label>
        <input type="text" id="city" name="city" required value="<?= $event->getCity() ?>">

        <label for="country">Pays :</label>
        <input type="text" id="country" name="country" required>

        <label for="dateStart">Date début :</label>
        <input type="datetime-local" id="dateStart" name="dateStart" required value="<?= $event->getDateStartForm() ?>">

        <label for="dateEnd">Date fin :</label>
        <input type="datetime-local" id="dateEnd" name="dateEnd" required>

        <label for="maxUsers">Max participants :</label>
        <input type="number" id="maxUsers" name="maxUsers" required>

        <label for="contribution">Contribution :</label>
        <input type="number" id="contribution" name="contribution" required>

        <label for="ImgEvent">Image :</label>
        <input type="text" id="ImgEvent" name="imgEvent" required>

        <label for="alt">Alt :</label>
        <input type="text" id="alt" name="alt" required>

        <label for="category">Categorie :</label>
        <select name="category" id="category" required>
            <option value="1">Culture</option>
            <option value="2">Sport</option>
            <option value="3">Jeux de sociétés</option>
        </select>

        <input id="submit" type="submit" name="submit" value="Envoyer">
    </form>
</div>