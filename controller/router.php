<?php
## controller/router.php

/* -> profil page */
if(isset($_GET['profil'])) : $_GET['profil'] = true ; endif;

/* -> manage vehicle */
if(isset($_GET['manage_vehicle'])): $_GET['manager'] = true ; endif;
