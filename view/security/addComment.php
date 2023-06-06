<div id="boxAddComment" name="box">

    <h3 class="titleAddComArea">Ajoutez votre commentaire</h3>

    <form id="formAddComment" method="POST" action="index.php?ctrl=event&action=addComment&id=<?= $detailEvent->getId(); ?>&user_id=">

        <label id="titleAdCom" for="titleAdCom">Titre du commentaire</label>
        <input type="text" name="titleAdCom">

        <label id="labComment" for="comment">Votre commentaire</label>
        <textarea name="comment" rows="4" cols="50"></textarea>

        <input id="submit" type="submit" name="submit" value="Submit">
    </form>
</div>
