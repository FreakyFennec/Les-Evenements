<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    
    <link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet"><!-- Ma police de caractères -->
    
    <link rel="shortcut icon" href="public/img/mibs_logo.svg" type="image/x-icon">
    <title>Les événements</title>
    
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-grid.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-winModaRegister.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-winModaLogin.css">
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style-winModaAddEvent.css">
</head>
<body>
    <div id="wrapper"> 
       
        <div id="mainpage">
            <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
            <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
            <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
            <header id="header">
                <a class="logoAndSiteName" href="/">
                    <p class="logo">Mib's</p>
                    <p class="siteName">Événements</p>                    
                </a>                
                <nav>
                    <div id="nav-left">
                        
                        <?php
                        if(App\Session::isAdmin()){     // Si c'est la session admin affiche les liens suivants.
                            ?>
                            <a href="index.php?ctrl=home&action=users">Voir la liste des membres</a>
                            <a href="/security/admin.php">Admin</a>
                            <a href="index.php?ctrl=secutity&action=addEvent">Ajouter un événement</a>
                            <?php
                        }
                        ?>
                    </div>
                    <div id="nav-right">
                    <?php
                        
                        if(App\Session::getUser()){     // Si l'utilisateur est connecté on affiche son profil et la possibilité de se déconnecter.
                            ?>

                            <a href="index.php?ctrl=security&action=profileUser&id=<?= App\Session::getUser()->getId() ?>"><img class="icon_user" src="public/img/icon/ico_user_01.svg" alt="ico_user_01">&nbsp;<?= App\Session::getUser() ?></a>

                            <a href="index.php?ctrl=security&action=deconnexion"><img class="icon_deconnexion" src="public/img/icon/ico_deconnection_01.svg" alt="ico_deconnection_01">Déconnexion</a>

                            <?php

                            if(App\Session::getUser()) {

                            }
                        }
                        else{
                            ?>
                            
                            <a href="index.php?ctrl=security&action=connexion"><img class="icon_connexion" src="public/img/icon/ico_connection_01.svg" alt="ico_connection_01"></a>
                            
                            <a href="index.php?ctrl=security&action=addUser"><img class="icon_register" src="public/img/icon/ico_register_01.svg" alt="ico_register_01"></a>
                            
                            <?php
                        
                            if(App\Session::getUser()) {

                            }
                        }    
                    ?>
                    </div>
                </nav>
            </header><!-- /.header -->
            
            <main>
                <?= $page ?>
            </main>
        </div><!-- /.mainpage -->
        <footer>
            <p class="info-footer">&copy; 2023 - Events CDA - <a href="/home/eventRules.html">Règlement du site</a> - <a href="">Mentions légales</a></p>
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
</body>
</html>