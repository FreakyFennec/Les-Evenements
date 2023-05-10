<?php
    $user = $result["data"]['user'];
    // $participate = $result["data"]['participate'];
    // $events = $result["data"]['events'];
    $findEventByIdUsers = $result["data"]['findEventByIdUser'];
    $comments = $result["data"]['comments'];
?>

<h1 class="title-page">Mon profil <?= $user->getPseudo() ?></h1>

<table>

<?php
// Informations sur les users

if(App\Session::getUser()) {
    
    if(App\Session::getUser()->getStatus() == 'admin') { // Visible by the admin
    ?>
        <thead>
            <tr>
                <th>firstName</th>
                <th>lastName</th>
                <th>email</th>
                <th>pseudo</th>
                <th>status</th>
                <th>banish</th>
                <th>registerdate</th>
            </tr>
        </thead>
        <tbody> 
            <tr>
                <td><?= $user->getFirstName() ?></td>
                <td><?= $user->getLastName() ?></td>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getPseudo() ?></td>
                <td><?= $user->getStatus() ?></td>
                <td><?= $user->getBanish() ?></td>
                <td><?= $user->getRegisterDate() ?></td>
            </tr>

    <?php 
    } elseif(App\Session::getUser()->getStatus() == 'moderator') { // Visible by the modérateur
    ?>
        <thead>
            <tr>
                <th>firstName</th>
                <th>lastName</th>
                <th>email</th>
                <th>pseudo</th>
                <th>status</th>
                <th>banish</th>
                <th>registerdate</th>
            </tr>
        </thead>
        <tbody> 
            <tr>
                <td><?= $user->getEmail() ?></td>
                <td><?= $user->getPseudo() ?></td>
                <td><?= $user->getStatus() ?></td>
                <td><?= $user->getBanish() ?></td>
                <td><?= $user->getRegisterDate() ?></td>
            </tr>

    <?php 
    } elseif(App\Session::getUser()->getStatus() == 'user') { // Visible by the modérateur
    ?>
        <thead>
            <tr>
                <th>pseudo</th>
                <th>status</th>
                <th>registerdate</th>
            </tr>
        </thead>
        <tbody> 
            <tr>
                <td><?= $user->getPseudo() ?></td>
                <td><?= $user->getStatus() ?></td>
                <td><?= $user->getRegisterDate() ?></td>
            </tr>            
    <?php } ?>
        </tbody>
    </table>

    <h2>Mes événements</h2>

    <table>
        <thead>
            <tr>
                <th>title</th>
                <th>place</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($findEventByIdUsers as $findEventByIdUser) {
            ?>
                <tr>
                    <td><?= $findEventByIdUser->getTitleEvent() ?></td>
                    <td><?= $findEventByIdUser->getCity() ?></td>
                    <td><?= $findEventByIdUser->getDateStart() ?></td>
                </tr>            
            <?php } ?>      
        </tbody>
    </table>

    <h2>Mes commentaires</h2>

    <table>
        <thead>
            <tr>
                <th>text</th>
                <th>dateComment</th>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach($comments as $comment) {
            ?>
                <tr>
                    <td><?= $comment->getComment() ?></td>
                    <td><?= $comment->getCreationDate() ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <?php
    if(App\Session::getUser()->getStatus() == 'admin') { // Visible by the admin
    ?>
        <h3>Espace admin</h3>

        <div>
            <a href="index.php?ctrl=security&action=admin.php">Admin space</a>
        </div>
        <div>
            <a href="index.php?ctrl=security&action=listUsers.php">Delete a user</a>
        </div>

        <div id="box" name="box">
            <h1 class="titleAddEvent">Ajouter un événement</h1>

            <form id="formRegister" method="POST" action="index.php?ctrl=security&action=addEvent">

                <label for="titleEvent">Title event</label>
                <input type="text" name="titleEvent">

                <label for="description">Description</label>
                <textarea name="description" id="" cols="30" rows="8"></textarea>

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
    <?php } ?>
<?php } ?>      
