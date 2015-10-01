<?php
## controller/router.php

/* -> profil page */
if(isset($_GET['profil']) && !empty($_SESSION)) : 
    $_GET['profil'] = 1 ; 
endif; 

if(!empty($_GET['profil']) && empty($_SESSION) && empty($_POST)): 
    $_GET['profil'] = 0 ;
endif;

if(isset($_GET['stats']) && empty($_SESSION)) : 
    $_GET['profil'] = 0 ; 
endif;

/* -> manage vehicle */
if(isset($_GET['manage_vehicle'])): 
    $_GET['manager'] = true ; 
endif;
