<nav>
    <a href='<?php print "http://" . BASE_URL ?>'>Home</a>
    <?php if (!empty($_SESSION)): ?>
        <div class="alert alert-info">
            <p>Bonjour <?php print $_SESSION['user']['alias']; ?> !
                <?php
                include_once 'forms/log_out_form.html';
                ?>
            </p>
        </div>
    <?php endif; ?>
</nav>
