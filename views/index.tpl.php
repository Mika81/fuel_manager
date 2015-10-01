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
if ($_GET['profil']):
    include_once 'profil.tpl.php';
endif;
if ($_GET['manager']):
    include_once 'manager.tpl.php';
endif;
if ($_GET['stats']):
    include_once 'stats.tpl.php';
endif;
?>
</div> <!-- End .container-fluid .container-global -->
</body>
<?php
include_once 'footer.html';
?>