<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php print "http://" . BASE_URL . "/?profil" ?>">Home</a>
        </div>     
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (!empty($_SESSION)): ?>
                    <li class="navbar-text">Bonjour <?php print $_SESSION['user']['alias']; ?> !</li>
                    <li>
                        <?php
                        include_once 'forms/log_out_form.html';
                        ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid container-global">
