<div id="box" name="box">
    <h1 class="titleAddEvent">Ajouter un événement</h1>

    <form id="formRegister" method="POST" action="index.php?ctrl=event&action=addEvent">

        <label for="titleEvent">Titre :</label>
        <input type="text" name="titleEvent">

        <label for="description">Description :</label>
        <input type="text" name="lastName">

        <label for="zipcode">Code postal :</label>
        <input type="number" name="zipcode">

        <label for="addres">Adresse :</label>
        <input type="text" name="addres">

        <label for="city">Ville :</label>
        <input type="text" name="city">

        <label for="country">Pays :</label>
        <input type="text" name="country">

        <label for="dateStart">Date début :</label>
        <input type="date" name="dateStart">

        <label for="dateEnd">Date fin :</label>
        <input type="date" name="dateEnd">

        <label for="maxUsers">Max participants :</label>
        <input type="number" name="maxUsers">

        <label for="contribution">Contribution :</label>
        <input type="number" name="contribution">

        <label for="ImgEvent">Image :</label>
        <input type="text" name="ImgEvent">

        <label for="alt">Alt :</label>
        <input type="text" name="alt">

        <label for="user_id">user_id :</label>
        <input type="number" name="user_id">

        <label for="category">Categorie :</label>
        <select name="category">
            <option value="1">Culture</option>
            <option value="2">Sport</option>
            <option value="3">Jeux de sociétés</option>
        </select>

        <input id="submit" type="submit" name="submit" value="Envoyer">
    </form>
</div>
