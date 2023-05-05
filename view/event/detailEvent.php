<?php
$detailEvent = $result["data"]['detailEvent']; // It's un object array.
echo '<pre>';
//var_dump($id);
var_dump($detailEvent);
echo '</pre>';
?>

<?php
// $userManager = $result["data"]['userManager'];
?>

<div class="detailEvent">
    <h2 class="titleEvent">Détail de l'événement</h2>

    <img src="public/img/<?= $detailEvent->getImgEvent() ?>" alt="<?= $detailEvent->getImgAlt() ?>" id="imgEvent">

    <!-- If not connected -->
    <div class="descSmall"><?= $detailEvent->getDescription(); ?></div>
    <div class="infoForAll">
        <p class="place"><?= $detailEvent->getPlace(); ?></p>
        <p class="dateStart"><?= $detailEvent->getDateStart(); ?></p>
        <p class="dateEnd"><?= $detailEvent->getDateEnd(); ?></p>
    </div>
</div>


    

