<?php

/* Create user */
if (isset($_POST['create'])):
    if (!empty($_POST['alias']) && !empty($_POST['pwd']) && !empty($_POST['email']) && !empty($_POST['address'])) :
        $user = array(
            'alias' => $_POST['alias'],
            'pwd' => $_POST['pwd'],
            'address' => $_POST['address'],
            'email' => $_POST['email'],
        );
        $newUser = new User($user);
        $user_exists = $user_manager->exists($newUser);
        if ($user_exists) :
            $msg .= "<p>Cet e-mail ou ce nom d'utilisateurs existe déjà</p>";
        else :
            $user_manager->add($newUser);
            $msg .= "<p>Vous pouvez vous connecter</p>";
        /* e-mail information */
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= "From: noreply@fueldiw.fr \r\n";
            $subject = "Nouvel utilisateur sur Fuel.diw.fr";
            $message = "<p>'" . $newUser->getAlias() . "' a créé un compte sur fuel.diw.fr avec l'e-mail '". $newUser->getEmail() ."'   </p>";
            mail('webdeveloper@diw.fr', $subject, $message, $headers);
        /* *** */
        endif;
    else:
        $msg .= 'Pour valider votre compte, toutes les informations sont requises.';
    endif;
endif;

/* Create SESSION */
if (isset($_POST['connection']) && !empty($_POST['alias']) && !empty($_POST['pwd'])) :
    $user = array(
        'alias' => $_POST['alias'],
        'pwd' => $_POST['pwd'],
    );
    $current_user_exists = $user_manager->user_start_session($user);
    if ($current_user_exists) :
        $current_user = $user_manager->get($user);
        $_SESSION['user']['user_id'] = $current_user->getUser_id();
        $_SESSION['user']['alias'] = $current_user->getAlias();
        $_SESSION['user']['email'] = $current_user->getEmail();
        $_SESSION['user']['address'] = $current_user->getAddress();
    else :
        unset($_GET);
        $msg .= "Nom ou mot de passe incorrect";
    endif;
else :
    if (isset($_POST['connection'])) :
        unset($_GET);
        $msg .= "Tous les champs doivent être complété";
    endif;
endif;

if (isset($_POST['logout'])) :
    unset($_SESSION['user']);
    session_destroy();
    header('Location:http://' . BASE_URL);
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
