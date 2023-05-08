<?php
$detailEvent = $result["data"]['findOneById']; // It's un object array.
?>

<?php
// $userManager = $result["data"]['userManager'];
?>

<div class="detailEvent">
    <h2 class="titleEvent"><?= $detailEvent->getTitleEvent(); ?></h2>

    <img src="public/img/<?= $detailEvent->getImgEvent(); ?>" alt="<?= $detailEvent->getAlt(); ?>" id="imgDetailEvent">

    <div class="descAndInfos">
        <!-- If not connected -->
        <div class="descSmall"><?= $detailEvent->getDescription(); ?></div>
        <div class="infoForAll">
            <p class="place"><?= $detailEvent->getPlace(); ?></p>
            <p class="dateStart">Du : <?= $detailEvent->getDateStart(); ?></p>
            <p class="dateEnd">Au : <?= $detailEvent->getDateEnd(); ?></p>
        </div>
        <!-- If connectedf -->
        
    </div>
        
</div>


    

