<?php
$detailEvent = $result["data"]['findOneById']; // It's un object array.
?>

<?php
// $userManager = $result["data"]['userManager'];
?>

<div class="detailEvent">
    <h2 class="titleEvent">Détail de l'événement</h2>

    <h3><?= $detailEvent->getTitleEvent(); ?></h3>

    <img src="public/img/<?= $detailEvent->getImgEvent(); ?>" alt="<?= $detailEvent->getAlt(); ?>" id="imgEvent">

    <!-- If not connected -->
    <div class="descSmall"><?= $detailEvent->getDescription(); ?></div>
    <div class="infoForAll">
        <p class="place"><?= $detailEvent->getPlace(); ?></p>
        <p class="dateStart"><?= $detailEvent->getDateStart(); ?></p>
        <p class="dateEnd"><?= $detailEvent->getDateEnd(); ?></p>
    </div>
</div>


    

