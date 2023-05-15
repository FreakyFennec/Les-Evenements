<div id="box" name="box">
    <h1 class="titleFormRegister">S'inscrire</h1>

    <form id="formRegister" method="POST" action="index.php?ctrl=security&action=addUser">

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" id="firstName" required>

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" id="lastName" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" required>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>

        <label for="confirmUserPW">Confirmez votre MP</label>
        <input type="password" name="confirmUserPW" id="confirmUserPW" required>

        <input id="submit" type="submit" name="submit" value="Envoyer">
    </form>
</div>

