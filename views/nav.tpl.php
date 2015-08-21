<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php print "http://" . BASE_URL ?>">--</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
            </ul>
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
