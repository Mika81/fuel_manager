<?php

/* Create user */
if(isset($_POST['create'])) :
    $user = array(
        'alias' => $_POST['alias'],
        'pwd' => $_POST['pwd'],
        'address' => $_POST['address'],
        'email' => $_POST['email'],
    );
    $newUser = new User($user);
    $user_exists = $user_manager->exists($newUser);
    if($user_exists) :
        $msg .= "<p>Cet e-mail ou ce nom d'utilisateurs existe déjà</p>";
    else :
        $user_manager->add($newUser);
        $msg .= "<p>Vous pouvez vous connecter</p>";
    endif;
endif;

/* Create SESSION */
if(isset($_POST['connection']) && !empty($_POST['alias']) && !empty($_POST['pwd'])) :
    $user = array(
        'alias' => $_POST['alias'],
        'pwd' => $_POST['pwd'],
    );
    $current_user_exists = $user_manager->user_start_session($user);
    if($current_user_exists) :
        $current_user = $user_manager->get($user);
        $_SESSION['user']['user_id'] = $current_user->user_id;
        $_SESSION['user']['alias'] = $current_user->alias;
        $_SESSION['user']['email'] = $current_user->email;
        $_SESSION['user']['address'] = $current_user->address;
        $_SESSION['profil'] = true;
    else :
        $msg .= "Nom ou mot de passe incorrect";
    endif;
else :
    if(isset($_POST['connection'])) :
        $msg .= "Tous les champs doivent être complété";
    endif;
endif;

if(isset($_POST['logout'])) :
    unset($_SESSION['user']);
    session_destroy();
    header('Location:http://'. BASE_URL);
    exit();
endif;

/**
 * Description of UserController
 *
 * @author mika
 */
//class UserController {
//    //put your code here
//}
