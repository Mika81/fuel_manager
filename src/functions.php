<?php
## functions/functions.php

/* Debug function */
function d($arg) {
    print "<pre>";
    print_r($arg);
    print "</pre>";
}

/* DEFINE */
define('BASE_URL', $_SERVER[HTTP_HOST]);
/* -------------------- */