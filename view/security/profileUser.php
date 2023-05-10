<?php
    $user = $result["data"]['user'];
    // $participate = $result["data"]['participate'];
    // $events = $result["data"]['events'];
    $findEventByIdUsers = $result["data"]['findEventByIdUser'];
    $comments = $result["data"]['comments'];
?>

<h1 class="title-page">Mon profil <?= $user->getPseudo() ?></h1>

<table class="tableProfileUser">

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

    <h2 class="title-myEvents">Mes événements</h2>

    <table class="tableEvents">
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

    <h2 class="title-myComments">Mes commentaires</h2>

    <table class="tableComments">
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
    <?php } ?>
<?php } ?>      
