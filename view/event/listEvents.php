<?php
    $events = $result["data"]['events']; // c'est un tableau d'objets.
?>

<?php
    $featuredEvent = $result["data"]['featuredEvent'];
    
    ?>
    <div class="featuredEvent">
        <h2 class="titleEvent"><?=$featuredEvent->getTitleEvent()?></h2>
        <a class="linkEvent" href="#"><img id="imgEventFeatured" src="public/img/<?=$featuredEvent->getImgEvent()?>" alt="<?=$featuredEvent->getAlt()?>"></a>
        <div class="descAndInfos">
            <div class="descSmall"><?=$featuredEvent->getDescription()?></div>
            <div class="infoForAll">
                <p class="place"><?=$featuredEvent->getPlace()?></p> 
                <p class="dateStart"><?=$featuredEvent->getDateStart()?></p>
                <p class="dateEnd"><?=$featuredEvent->getDateEnd()?></p>
            </div>
        </div>
    </div>

<?php
    $findNextEvents = $result["data"]['findNextEvent'];
    // var_dump($findNextEvent);
    ?>

    <div class="nextEvents">
        <h2 class="titleNextEvent">Vos prochaines sorties</h2>

        <?php
        foreach($findNextEvents as $findNextEvent) {
        ?>
            <div class="nextEvent">
                <h3><?= $findNextEvent->getTitleEvent()?></h3>
                <a class="linkEvent" href="#"><img class="imgEvent" src="public/img/<?=$findNextEvent->getImgEvent()?>" alt="<?=$findNextEvent->getAlt()?>"></a>
            </div>
            
        <?php } ?>
    </div>

<?php
    $findPassedEvents = $result["data"]['findPassedEvent'];
    ?>

    <div class="passedEvents">
        <h2 class="titlePassedEvent">Les événement passés</h2>

        <?php
        foreach($findPassedEvents as $findPassedEvent) {
        ?>
            <div class="passedEvent">
                <h3 class="titlePassedEvent"><?= $findPassedEvent->getTitleEvent()?></h3>
                <a class="linkEvent" href="#"><img class="imgEvent" src="public/img/<?= $findPassedEvent->getImgEvent()?>" alt="<?=$findNextEvent->getAlt()?>"></a>
            </div>
        <?php } ?>
    </div>

