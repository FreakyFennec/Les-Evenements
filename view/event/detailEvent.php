<?php
$detailEvent = $result["data"]['findOneById']; // It's un object array.
$commentsEvent = $result["data"]['findCommentById'];
?>
<pre><?= var_dump($commentsEvent); ?></pre>

<?php
// $userManager = $result["data"]['userManager'];
?>

<div class="detailEvent">
    <h2 class="titleEvent titleDetailEvent"><?= $detailEvent->getTitleEvent(); ?></h2>

    <img src="public/img/<?= $detailEvent->getImgEvent(); ?>" alt="<?= $detailEvent->getAlt(); ?>" class="imgDetailEvent" id="imgDetailEvent">

    <div class="descAndInfos">
        <!-- If not connected -->
        <div class="descSmall"><?= $detailEvent->getDescription(); ?></div>
        <div class="infoForAll">
            <p class="dateEvent">Du : <?= $detailEvent->getDateStart(); ?> au : <?= $detailEvent->getDateEnd(); ?></p>
            <p class="address">Au <?= $detailEvent->getAddress(); ?></p>
            <p class="city"><?= $detailEvent->getCity(); ?></p>
            <p class="zipcode"><?= $detailEvent->getZipcode(); ?></p>
        </div>
        <!-- If connected -->
        
    </div>
    <div id="map">
        <!-- Map's place -->
    </div>
</div>
<div class="comArea"></div>
    <h2 class="titleComArea">Commentaires</h2>

    <table class="tableCom">
        <thead>
            <tr>
                <th>Title comment</th>
                <th>Comment</th>
                <th>Creation date</th>
            </tr>
        </thead>
        <tbody>
            <td>
                <th><?= $commentsEvent->getTitleComment(); ?></th>
                <th><?= $commentsEvent->getComment(); ?></th>
                <th><?= $commentsEvent->getCreationDate(); ?></th>
            </td>
        </tbody>
    </table>
</div>

<div class="AddComArea">
    <h2 class="titleAddComArea">Ajoutez votre commentaire</h2>
</div>


    

