<?php
## controller/VehicleController.class.php

/* Create Vehicle */
if(isset($_POST['create_vehicle'])) :
    if(!empty($_POST['brand']) && !empty($_POST['model']) && !empty($_POST['global_km'])) :
        $vehicle = array(
            'brand' => $_POST['brand'],
            'model' => $_POST['model'],
            'type' => $_POST['type'],
            'fuel_type' => $_POST['fuel_type'],
            'global_km' => $_POST['global_km'],
            'user_id' => $_SESSION['user']['user_id'],
        );
        $vehicle_object = new Vehicle($vehicle);
        $vehicle_exists = $vehicle_manager->exists($vehicle_object);
        if($vehicle_exists):
            header('Location:http://'. BASE_URL);
            $_SESSION['vehicle']['exists'] = 1;
            exit();
        else:
            $vehicle_manager->add($vehicle_object);
        endif;
        $msg .= "Le véhicule a été ajouté à la liste de vos véhicule";
    else :
        $msg .= "Tous les champs doivent être remplis";
    endif;
endif;

/* Vehicle exists */
if($_SESSION['vehicle']['exists']) :
    $msg .= "Ce véhicule est déjà dans votre liste";
    unset($_SESSION['vehicle']['exists']);
endif;

/* Create SESSION */
if($_SESSION['profil']) :
    $vehicle_list = $vehicle_manager->getList($_SESSION['user']['user_id']);
    if(empty($vehicle_list)) :
        $vehicle_list = "Pas encore de véhicule enregistré";
    endif;
endif;

/* Vehicle is selected */
if($_POST['vehicle_selected']) :
    $vehicle_id = (int) $_POST['vehicle_selected'];
    $vehicle = array(
        'vehicle_id' => $vehicle_id,
    );
$vehicle_object = $vehicle_manager->get($vehicle);
$_SESSION['vehicle'] = array(
    'vehicle_id' => $vehicle_object->getVehicle_id(),
    'brand' => $vehicle_object->getBrand(),
    'model' => $vehicle_object->getModel(),
    'type' => $vehicle_object->getType(),
    'fuel_type' => $vehicle_object->getFuel_type(),
    'global_km' => $vehicle_object->getGlobal_km(),
);
endif;

/* Vehicule to delete */
if(isset($_POST['vehicle_2_delete'])):
    $vehicle_2_delete = (int) $_POST['vehicle_2_delete'];
    $vehicle = array(
        'vehicle_id' => $vehicle_2_delete,
    );
    $vehicle_manager->delete($vehicle);
    header('Location:http://'. BASE_URL);
endif;

/* View statistics for one vehicle */
if(isset($_POST['manage_vehicle'])):
    unset($_SESSION['profil']);
    $_SESSION['manager']['vehicle'] = true;
endif;

/**
 * Description of VehicleController
 *
 * @author mika
 */
//class VehicleController {
//    //put your code here
//}
