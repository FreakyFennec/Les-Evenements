<div id="box" name="box">
    <h1 class="titleformConnection">Connexion</h1>

    <form id="formLogin" method="POST" action="index.php?ctrl=security&action=connexion">
        
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>

        <label for="userPassW">Mot de passe</label>
        <input type="password" name="userPassW" id="userPassW" required>

        <input id="submit" type="submit" name="submit" value="Envoyer">

    </form>
</div>