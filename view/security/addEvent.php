<div id="box" name="box">
    <h1 class="titleAddEvent">Add event</h1>

    <form id="formRegister" method="POST" action="index.php?ctrl=event&action=addEvent">

        <label for="titleEvent">Title event</label>
        <input type="text" name="titleEvent">

        <label for="description">Description</label>
        <input type="text" name="lastName">

        <label for="zipcode">Zipcode</label>
        <input type="number" name="zipcode">

        <label for="addres">Addres</label>
        <input type="text" name="addres">

        <label for="city">City</label>
        <input type="text" name="city">

        <label for="country">Country</label>
        <input type="text" name="country">

        <label for="dateStart">Date start</label>
        <input type="date" name="dateStart">

        <label for="dateEnd">Date end</label>
        <input type="date" name="dateEnd">

        <label for="contribution">Contribution</label>
        <input type="number" name="contribution">

        <label for="ImgEvent">Image event</label>
        <input type="text" name="ImgEvent">

        <label for="alt">Alt</label>
        <input type="text" name="alt">

        <input id="submit" type="submit" name="submit" value="Envoyer">
    </form>
</div>

