<div id="boxAddComment" name="box">
    <h1 class="titleAddcomment">Ajouter un événement</h1>

    <div id="box" name="box">
        <h2 class="titleAddComArea">Ajoutez votre commentaire</h2>

        <form id="formComment" method="POST" action="index.php?ctrl=event&action=addComment&id=<?= $detailEvent->getId(); ?>&user_id=">

            <label for="titleComment">Titre du commentaire</label>
            <input type="text" name="titleComment">

            <label for="comment">Votre commentaire</label>
            <textarea name="comment" rows="4" cols="50"></textarea>

            <input id="submit" type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>
