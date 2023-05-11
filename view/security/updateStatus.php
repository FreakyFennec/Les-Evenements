<div id="box" name="box">
    <h3 class="titleformUpdateStatus">Update status</h3>

    <form id="formUpdateStatus" method="POST" action="index.php?ctrl=security&action=updateStatus">
        
        <input type="radio" name="status" value="user" > user
        
        <input type="radio" name="status" value="moderator" > moderator
        
        <input type="radio" name="status" value="admin" > admin

        <input id="submit" type="submit" name="submit" value="Submit">

    </form>
</div>