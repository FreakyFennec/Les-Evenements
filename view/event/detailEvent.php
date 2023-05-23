<?php
$detailEvent = $result["data"]['findOneById']; // It's un object array.
$commentsEvent = $result["data"]['findCommentById'];
$user = App\Session::getUser();
?>

<?php
// $userManager = $result["data"]['userManager'];
?>

<div class="detailEvent">
    <h2 class="titleEvent titleDetailEvent"><?= $detailEvent->getTitleEvent(); ?></h2>

    <img src="public/img/<?= $detailEvent->getImgEvent(); ?>" alt="<?= $detailEvent->getAlt(); ?>" class="imgDetailEvent" id="imgDetailEvent">

    
        <!-- If connected as admin or moderator -->       
        <?php
        if ($user && ($user->getStatus() == 'admin' || $user->getStatus() == 'moderator')) {
        ?>
        <div class="descAndInfos">
            <div class="infoForAll">
                <div class="dateStartEnd">
                    <p class="dateEvent">Du : <?= $detailEvent->getDateStart(); ?><br /> au : <?= $detailEvent->getDateEnd(); ?></p>
                </div>
                
                <p class="address">Au <?= $detailEvent->getAddress(); ?></p>
                <p class="city"><?= $detailEvent->getCity(); ?></p>
                <p class="zipcode"><?= $detailEvent->getZipcode(); ?></p>
                <p class="maxUsers">Participants max. : <?= $detailEvent->getMaxUsers(); ?> pers.</p>
                <p class="descSmall"><?= $detailEvent->getDescription(); ?></p>
            </div>

            <button class="modifEvent" onclick="window.location.href = 'index.php?ctrl=event&action=updateEvent&id=<?= $detailEvent->getId() ?>';">Modifier</button>
        

        <!-- If not connected -->       
        <?php
        } else {
        ?>
        <div class="descAndInfos">
            <div class="infoForAll">
                <div class="dateStartEnd">
                    <p class="dateEvent">Du : <?= $detailEvent->getDateStart(); ?><br /> au : <?= $detailEvent->getDateEnd(); ?></p>
                </div>
                
                <p class="address">Au <?= $detailEvent->getAddress(); ?></p>
                <p class="city"><?= $detailEvent->getCity(); ?></p>
                <p class="zipcode"><?= $detailEvent->getZipcode(); ?></p>
                <p class="maxUsers">Participants max. : <?= $detailEvent->getMaxUsers(); ?> pers.</p>
                <p class="descSmall"><?= $detailEvent->getDescription(); ?></p>
            </div>
        <?php 
        }
        ?>       
    </div>
        
    <div id="map">
        <!-- Map's place -->
    </div>
</div>

<div class="comArea">
    <h2 class="titleComArea">Commentaires</h2>

    <?php
        if($commentsEvent) {
    ?>
    <table class="tableCom">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Commentaire</th>
                <th>Crée le</th>
                <th>Auteur</th>
                <th>Del</th>
            </tr>
        </thead>
        <tbody>
        <?php   
            foreach ($commentsEvent as $comment) : ?>
                <tr>
                    <td><?= $comment->getTitleComment(); ?></td>
                    <td><?= $comment->getComment(); ?></td>
                    <td><?= $comment->getCreationDate(); ?></td>
                    <td><?= $comment->getUser(); ?></td>
                    <td><a href="index.php?ctrl=security&action=removeCommentById&id=<?= $comment->getId() ?>">Del</a></td>
            
                </tr>
            <?php endforeach; ?>        
        </tbody>
    </table>
    <?php } else {
        echo "<p class='messageNoCom'>Pas de commentaire pour le moment</p>";
    } ?>
</div>

<?php
if ($user && ($user->getStatus() == 'admin' || $user->getStatus() == 'moderator' || $user->getStatus() == 'user')) {
?>
    <div id="box" name="box">
        <h2 class="titleAddComArea">Ajoutez votre commentaire</h2>

        <form id="formRegister" method="POST" action="index.php?ctrl=event&action=addComment&id=<?= $detailEvent->getId(); ?>&user_id=">

            <label for="titleComment">Titre du commentaire</label>
            <input type="text" name="titleComment">

            <label for="comment">Votre commentaire</label>
            <textarea name="comment" rows="4" cols="50"></textarea>

            <input id="submit" type="submit" name="submit" value="Submit">
        </form>
    </div>
<?php
}
?>

    

