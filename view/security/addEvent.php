<div id="box" name="box">
    <h1 class="titleAddEvent">Add event</h1>

    <form id="formRegister" method="POST" action="index.php?ctrl=event&action=addEvent">

        <label for="titleEvent">Title event</label>
        <input type="text" name="titleEvent">

        <label for="description">Description</label>
        <input type="text" name="lastName">

        <label for="zipcode">Zipcode</label>
        <input type="number" name="zipcode">

        <label for="addres">Address</label>
        <input type="text" name="addres">

        <label for="city">City</label>
        <input type="text" name="city">

        <label for="country">Country</label>
        <input type="text" name="country">

        <label for="dateStart">Date start</label>
        <input type="date" name="dateStart">

        <label for="dateEnd">Date end</label>
        <input type="date" name="dateEnd">

        <label for="maxUsers">Max users</label>
        <input type="number" name="maxUsers">

        <label for="contribution">Contribution</label>
        <input type="number" name="contribution">

        <label for="ImgEvent">Image event</label>
        <input type="text" name="ImgEvent">

        <label for="alt">Alt</label>
        <input type="text" name="alt">

        <label for="user_id">user_id</label>
        <input type="number" name="user_id">

        <label for="category">Category</label>
        <select type="text" name="category">
            <option value="1">Culture</option>
            <option value="2">Sport</option>
            <option value="3">Jeux de sociétés</option>
        </select>

        <input id="submit" type="submit" name="submit" value="Envoyer">
    </form>
</div>
