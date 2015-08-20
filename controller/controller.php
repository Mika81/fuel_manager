<?php

## controller/controller.php

require_once 'model/user/User.class.php';
require_once 'model/user/UserManager.class.php';

/* Database informations ($host) */
include_once 'functions/database_informations.php';

/* Database connection */
try {
    $db = new PDO('mysql:host=' . $host['hostname'] . ';dbname=' . $host['db_name'], $host['user_name'], $host['user_pwd']);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . " !!!<br/>";
    die();
}
