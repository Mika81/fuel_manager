<?php
include_once 'head.html';
include_once 'header.html';
include_once 'nav.tpl.php';
?>
    <h1> <?php print $msg; ?> </h1>
    <?php
    if (empty($_SESSION['user'])) :
        if (isset($_POST['signup'])) :
            include_once 'forms/sign_up_form.html';
        else :
            include_once 'forms/log_in_form.html';
        endif;
    else:
        $msg .= "La session n'est pas vide";
    endif; ?>
</body>
<?php
include_once 'footer.html';
?>