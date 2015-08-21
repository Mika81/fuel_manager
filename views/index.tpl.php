<?php
include_once 'head.html';
include_once 'header.html';
include_once 'nav.tpl.php';
if (!empty($msg)):
    ?>
    <div class="alert alert-info"><p><?php print $msg; ?> </p></div>
    <?php
endif;
if (empty($_SESSION['user'])) :
    if (isset($_POST['signup'])) :
        include_once 'forms/sign_up_form.html';
    else :
        include_once 'forms/log_in_form.html';
    endif;
else:
    $msg .= "La session n'est pas vide";
endif;
if ($_SESSION['profil']):
    include_once 'profil.tpl.php';
endif;
if ($_SESSION['manager']):
    include_once 'manager.tpl.php';
endif;
?>
</body>
<?php
include_once 'footer.html';
?>