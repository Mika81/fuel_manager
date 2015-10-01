<?php
include_once 'head.html';
include_once 'header.html';
include_once 'nav.tpl.php';

if (!empty($msg)):
    ?>
    <div class="alert alert-info"><p><?php print $msg; ?> </p></div>
    <?php
endif;

if (empty($_SESSION)):
    ?>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-6 col-md-offset-3 text-center m-bottom-50'>
                <img src='../src/img/car.png' alt='blue car'>
                <h1>FUEL.DIW.FR</h1>
                <h2>L'application pour gérer votre carburant</h2>
                <p>Connectez-vous ou créez un compte</p>
            </div>
            <div class='col-md-6 col-md-offset-3'>
                <?php
                if (empty($_SESSION['user'])) :
                    if (isset($_POST['signup'])) :
                        include_once 'forms/sign_up_form.html';
                    else :
                        include_once 'forms/log_in_form.html';
                    endif;
                endif;
                ?>
            </div>
        </div>
    </div>
    <?php
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
<?php
include_once 'footer.html';
?>