<div id="box" name="box">
    <h1 class="titleFormRegister">S'inscrire</h1>

    <form id="formRegister" method="POST" action="index.php?ctrl=security&action=addUser">

        <label for="firstName">First Name</label>
        <input type="text" name="firstName">

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName">

        <label for="email">Email</label>
        <input type="email" name="email">

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo">

        <label for="password">Mot de passe</label>
        <input type="password" name="password">

        <label for="confirmUserPW">Confirmez votre MP</label>
        <input type="password" name="confirmUserPW">

        <input id="submit" type="submit" name="submit" value="Envoyer">
    </form>
</div>

