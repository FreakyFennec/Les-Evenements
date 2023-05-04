<?php
$events = $result["data"]['events']; // It's un object array.
?>

<?php
$detailEvent = $result['data']['detailEvent'];
?>

<div class="detailEvent">
    <h2 class="titleEvent"><?= $detailEvent->detailEvent; ?></h2>
    <img src="public/img/<?= $detailEvent->getImgEvent() ?>" alt="<?= $detailEvent->getImgAlt() ?>" id="imgEvent">

    <!-- If not connected -->
    <div class="descSmall"><?= $detailEvent->getDescription; ?></div>
    <div class="infoForAll">
        <p class="place"><?= $detailEvent->getPlace(); ?></p>
        <p class="dateStart"><?= $detailEvent->getDateStart(); ?></p>
        <p class="dateEnd"><?= $detailEvent->getDateEnd(); ?></p>
    </div>
</div>






    

