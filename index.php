<?php
## index.php

session_start();
$msg = "";
require_once 'functions/functions.php';
require_once 'controller/controller.php';

$manager = new UserManager($db);

/* Create user */
if(isset($_POST['create'])){
    $user = array(
        'alias' => $_POST['alias'],
        'pwd' => $_POST['pwd'],
        'address' => $_POST['address'],
        'email' => $_POST['email'],
    );
    $newUser = new User($user);
    $manager->add($newUser);
}


include_once 'views/index.tpl.php';
