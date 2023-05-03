<div id="box" name="box">
    <h1 class="titleAddEvent">Ajouter un événement</h1>

    <form id="formRegister" method="POST" action="index.php?ctrl=security&action=addUser">

        <label for="titleEvent">Title event</label>
        <input type="text" name="titleEvent">

        <label for="description">Description</label>
        <input type="text" name="lastName">

        <label for="place">Place</label>
        <input type="text" name="place">

        <label for="dateStart">Date start</label>
        <input type="date" name="dateStart">

        <label for="dateEnd">Date end</label>
        <input type="date" name="dateEnd">

        <label for="contribution">Contribution</label>
        <input type="number" name="contribution">

        <label for="ImgEvent">Image event</label>
        <input type="text" name="ImgEvent">

        <input id="submit" type="submit" name="submit" value="Envoyer">
    </form>
</div>

