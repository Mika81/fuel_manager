<?php
## index.php

$msg = "";
require_once 'src/functions.php';
require_once 'controller/controller.php';

session_start();

require_once 'controller/router.php';

$user_manager = new UserManager($db);
$vehicle_manager = new VehicleManager($db);
$trip_manager = new TripManager($db);

require_once 'controller/UserController.class.php';
require_once 'controller/VehicleController.class.php';
require_once 'controller/TripController.class.php';

include_once 'views/index.tpl.php';

/* ****
print"<fieldset>";
print "<br>$ SESSION :";
d($_SESSION);
print "<br>$ POST :";
d($_POST);
print "<br>$ GET :";
d($_GET);
print"</fieldset>";
/* **** */