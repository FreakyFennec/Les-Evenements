<?php
$password = filter_input(INPUT_POST, "password", FILTER_VALIDATE_REGEXP, array( 
    "options" => array("regexp" => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\w\d\s])[^\s]{12,}$/') 
));


minusMaj2@moi // mp pour nomprenom