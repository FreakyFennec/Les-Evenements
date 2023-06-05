<?php
?>

https://www.usebouncer.com/fr/est-ce-que-lutilisation-de-lemail-validation-regex-est-suffisante-pour-garder-vos-listes-propres/

TLD (Top Level Domain)
exemple : contact@subdomain.example.com
subdomain = sous-domaine
example.com = TLD

[A-Za-z0-9]+@[A-Za-z0-9]+\.[A-Za-z0-9]+

'/^[A-Za-z0-9_.-]+@[A-Za-z0-9.-]+\.[A-Za-z0-9]+$/'

$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_REGEXP, array(
    "options" =>array("regexp" => '/^[A-Za-z0-9_.-]+@[A-Za-z0-9.-]+\.[A-Za-z0-9]+$/')
));


$password = filter_input(INPUT_POST, "userPassW", FILTER_VALIDATE_REGEXP, array(
    "options" => array("regexp" => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d\s])[^\s]{12,}$/')
));


Node JS et Svelt (framework)

mickael.murmann@elan-formation.fr