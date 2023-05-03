<?php
    $user = $result["data"]['user'];
    // $participate = $result["data"]['participate'];
    // $events = $result["data"]['events'];
    $findEventByIdUsers = $result["data"]['findEventByIdUser'];
    $comments = $result["data"]['comments'];
?>

<h1 class="title-page">Profil <?= $user->getPseudo() ?></h1>

<table>

<?php
    // Informations sur les users
    
    if(App\Session::getUser()) {
        
        if(App\Session::getUser()->getStatus() == 'admin') { // Visible par l'admin
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

        <?php } elseif(App\Session::getUser()->getStatus() == 'moderator') { // Visible par le modérateur
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

        <?php } elseif(App\Session::getUser()->getStatus() == 'user') { // Visible par le modérateur
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

<h2>Ses événements</h2>

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
                <td><?= $findEventByIdUser->getPlace() ?></td>
                <td><?= $findEventByIdUser->getDateStart() ?></td>
            </tr>
            
        <?php } ?>      
    </tbody>
</table>

<h2>Ses commentaires</h2>

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
<?php }

    // Visible par le user
    
    // Visible par le modérateur
    // Visible par tout le monde


    // Evénements créés par le user

    // Nombres de comment par event

?>      
    