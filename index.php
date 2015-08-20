<?php
## index.php

$msg = "";
require_once 'functions/functions.php';
require_once 'controller/controller.php';

session_start();

$user_manager = new UserManager($db);

require_once 'controller/UserController.class.php';

include_once 'views/index.tpl.php';

/* **** */
print"<fieldset>";
print "<br>$ SESSION :";
d($_SESSION);
print "<br>$ POST :";
d($_POST);
print"</fieldset>";
/* **** */