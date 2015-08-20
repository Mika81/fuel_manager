<?php
## functions/functions.php

/* Debug function */
function d($arg) {
    print "<pre>";
    print_r($arg);
    print "</pre>";
}
/* DEBUG */
print "<br>$ SESSION :";
d($_SESSION);
print "<br>$ POST :";
d($_POST);
/* -------------------- */