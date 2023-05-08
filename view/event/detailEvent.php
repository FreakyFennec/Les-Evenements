<?php
$detailEvent = $result["data"]['findOneById']; // It's un object array.
?>

<?php
// $userManager = $result["data"]['userManager'];
?>

<div class="detailEvent">
    <h2 class="titleEvent titleDetailEvent"><?= $detailEvent->getTitleEvent(); ?></h2>

    <img src="public/img/<?= $detailEvent->getImgEvent(); ?>" alt="<?= $detailEvent->getAlt(); ?>" id="imgDetailEvent">

    <div class="descAndInfos">
        <!-- If not connected -->
        <div class="descSmall"><?= $detailEvent->getDescription(); ?></div>
        <div class="infoForAll">
            <p class="address"><?= $detailEvent->getAddress(); ?></p>
            <p class="town"><?= $detailEvent->getTown(); ?></p>
            <p class="place"><?= $detailEvent->getPlace(); ?></p>
            <p class="dateStart">Du : <?= $detailEvent->getDateStart(); ?></p>
            <p class="dateEnd">Au : <?= $detailEvent->getDateEnd(); ?></p>
        </div>
        <!-- If connected -->
        
    </div>
    <div id="map">
        <!-- Map's place -->
    </div>
        
</div>


    

