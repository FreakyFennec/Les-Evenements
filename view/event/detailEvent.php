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
            
        <?php foreach ($commentsEvent as $comment) : ?>
                <tr>
                    <td><?= $comment->getTitleComment(); ?></td>
                    <td><?= $comment->getComment(); ?></td>
                    <td><?= $comment->getCreationDate(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="box" name="box">
    <h2 class="titleAddComArea">Ajoutez votre commentaire</h2>

    <form id="formRegister" method="POST" action="index.php?ctrl=event&action=addComment">

        <label for="titleComment">Title comment</label>
        <input type="text" name="titleComment">

        <label for="Comment">Comment</label>
        <input type="text" name="Comment">

        <input id="submit" type="submit" name="submit" value="Submit">
    </div>


    

