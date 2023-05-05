<?php
$detailEvent = $result["data"]['findOneById']; // It's un object array.
?>

<?php
// $userManager = $result["data"]['userManager'];
?>

<div class="detailEvent">
    <h2 class="titleEvent"><?= $detailEvent->getTitleEvent(); ?></h2>

    <img src="public/img/<?= $detailEvent->getImgEvent(); ?>" alt="<?= $detailEvent->getAlt(); ?>" id="imgEvent">

    <!-- If not connected -->
    <div class="descSmall"><?= $detailEvent->getDescription(); ?></div>
    <div class="infoForAll">
        <p class="place"><?= $detailEvent->getPlace(); ?></p>
        <p class="dateStart"><?= $detailEvent->getDateStart(); ?></p>
        <p class="dateEnd"><?= $detailEvent->getDateEnd(); ?></p>
    </div>
</div>


    

