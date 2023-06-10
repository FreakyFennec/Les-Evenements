

<?php
$events = $result["data"]['events']; // It's un object array.
?>

<?php
$featuredEvent = $result["data"]['featuredEvent'];
?>

<div class="featuredEvent">
    <h2 class="titleEvent"><?= htmlspecialchars($featuredEvent->getTitleEvent());?></h2>
    <a class="linkEvent" href="index.php?ctrl=event&action=detailEvent&id=<?= htmlspecialchars($featuredEvent->getId()); ?>"><img id="imgEventFeatured" src="public/img/<?= htmlspecialchars($featuredEvent->getImgEvent());?>" alt="<?= htmlspecialchars($featuredEvent->getAlt());?>"></a>
    <div class="descAndInfos">
        <div class="descSmall"><?= htmlspecialchars($featuredEvent->getDescription());?></div>
        <div class="infoForAll">
            <p class="zipcodeAndCity"><?= htmlspecialchars($featuredEvent->getCity()); ?> <?= htmlspecialchars($featuredEvent->getZipcode()); ?></p>
            <p class="dates">Du : <?= htmlspecialchars($featuredEvent->getDateStart());?><br /> au : <?= htmlspecialchars($featuredEvent->getDateEnd());?></p>
        </div>
    </div>
</div>

<?php
$findNextEvents = $result["data"]['findNextEvent'];
?>

<div class="nextEvents">
    <h2 class="titleNextEvent">Vos prochaines sorties</h2>

    <?php
    foreach($findNextEvents as $findNextEvent) {
    ?>
        <div class="nextEvent">
            <h3 class="titleNextEvent"><?= htmlspecialchars($findNextEvent->getTitleEvent());?></h3>
            <a class="linkEvent" href="index.php?ctrl=event&action=detailEvent&id=<?= htmlspecialchars($findNextEvent->getId()); ?>"><img class="imgEvent" src="public/img/<?= htmlspecialchars($findNextEvent->getImgEvent());?>" alt="<?= htmlspecialchars($findNextEvent->getAlt());?>"></a>
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
            <h3 class="titlePassedEvent"><?= htmlspecialchars($findPassedEvent->getTitleEvent());?></h3>
            <a class="linkEvent" href="index.php?ctrl=event&action=detailEvent&id=<?= htmlspecialchars($findPassedEvent->getId()); ?>"><img class="imgEvent" src="public/img/<?= htmlspecialchars($findPassedEvent->getImgEvent()); ?>" alt="<?= htmlspecialchars($findPassedEvent->getAlt()); ?>"></a>
        </div>
    <?php } ?>
</div>

