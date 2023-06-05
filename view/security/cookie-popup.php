<?php
if (!isset($_COOKIE['cookie_accepted'])) {
    ?>
    <div id="cookie-popup">
        <p>Ce site utilise des cookies. En continuant à naviguer sur ce site, vous acceptez notre utilisation des cookies.</p>
        <button id="accept-cookies">J'accepte</button>
    </div>
    
    <script>
        document.getElementById('accept-cookies').addEventListener('click', function() {
            document.getElementById('cookie-popup').style.display = 'none';
            document.cookie = 'cookie_accepted=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';
        });
    </script>
    <?php
}
?>
