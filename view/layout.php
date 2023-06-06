<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    
    <!-- My fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet">

    <!-- CSS for OpenStreetMap -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    
    
    <link rel="shortcut icon" href="public/img/icon/mibs_logo.svg" type="image/x-icon">
    <title>Les événements</title>
    
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-responsive.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-listUsers-responsive.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-listUsers.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-table.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">

    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-winModaRegister.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-winModaLogin.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-winModaAddEvent.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-winModaComment.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-winModaUpDateEvent.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-legalNotices.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-rules.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-cookie-popup.css">
</head>
<body>
    <div id="wrapper"> 
       
        <div id="mainpage">
            <!-- This is where the messages (error or success) are displayed-->
            <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
            <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
            <header id="header">
                <a class="logoAndSiteName" href="index.php">
                    <div class="logo">
                        <p class="logoText">Mib's</p>
                    </div>
                    <p class="siteName">Les événements</p>                    
                </a>                
                <nav>
                    <div id="nav-right">
                    <?php
                        
                        if(App\Session::getUser()) {     // If the user is logged in, his profile and the possibility to log out are displayed.
                            ?>

                            <a href="index.php?ctrl=security&action=profileUser&id=<?= App\Session::getUser()->getId() ?>"><img class="icon_user" src="public/img/icon/ico_user_01.svg" alt="Ico user"></a>

                            <a href="index.php?ctrl=security&action=deconnexion"><img class="icon_deconnexion" src="public/img/icon/ico_deconnection_01.svg" alt="Icon deconnection"></a>

                            <?php

                            // if(App\Session::getUser()) {

                            // }
                        }
                        else {
                            ?>
                            
                            <a href="index.php?ctrl=security&action=connexion"><img class="icon_connexion" src="public/img/icon/ico_connection_01.svg" alt="Icon connection"></a>
                            
                            <a href="index.php?ctrl=security&action=addUser"><img class="icon_register" src="public/img/icon/ico_register_01.svg" alt="Icon register"></a>
                            
                            <?php
                        
                            // if(App\Session::getUser()) {

                            // }
                        }    
                    ?>
                    </div>
                </nav>
            </header><!-- /.header -->

            <?php include 'security/cookie-popup.php'; ?>

            <main>
                
                <?php
                // Condition for display welcome message
                if (App\Session::getUser() != false) {
                ?>
                    <p class="pseudoUser">Bienvenue <?= App\Session::getUser() ?> !</p>
                <?php    
                } else {
                ?>
                    <p class="pseudoUser">Bienvenue invité !</p>
                <?php
                }
                ?>
                    
                <?php
                if(App\Session::isAdmin()) {     // If it's the admin session display theses links
                    ?>
                    <div class="buttonAdmin">
                        <button class="listUsers" onclick="window.location.href = 'index.php?ctrl=home&action=users'">Liste des membres</button>
                        
                        <button class="addEvent" onclick="window.location.href = 'index.php?ctrl=security&action=addEvent'">Ajout d'événements</button>
                    </div>
                    <?php
                }
                ?>
                
                <?= $page ?>
            </main>
        </div><!-- /.mainpage -->
        <footer>
            <p class="info-footer">&copy; 2023 Mib's Les Événements  <a href="index.php?ctrl=home&action=rules">Règlement du site</a><a href="index.php?ctrl=home&action=legalNotices">Mentions légales</a></p>
            <!--<button id="ajaxbtn">Surprise en Ajax !</button> -> cliqué <span id="nbajax">0</span> fois-->
        </footer>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>

        $(document).ready(function(){
            $(".message").each(function(){
                if($(this).text().length > 0){
                    $(this).slideDown(500, function(){
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
            $(".delete-btn").on("click", function(){
                return confirm("Etes-vous sûr de vouloir supprimer?")
            })
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        })

        

        /*
        $("#ajaxbtn").on("click", function(){
            $.get(
                "index.php?action=ajax",
                {
                    nb : $("#nbajax").text()
                },
                function(result){
                    $("#nbajax").html(result)
                }
            )
        })*/
    </script>
    <!-- Fichier JS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <script defer src="public/js/mapOSM.js"></script><!--
    <script type="text/javascript">alert('Çà sent la XSS')</script>-->
</body>
</html>