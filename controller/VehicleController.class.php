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
            header('Location:http://'. BASE_URL . '/?profil');
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

/* Create vehicle List */
if($_GET['profil']) :
    $vehicle_list = $vehicle_manager->getList($_SESSION['user']['user_id']);
    if(empty($vehicle_list)) :
        $vehicle_list = "Pas encore de véhicule enregistré";
    endif;
endif;

/* Vehicle is selected */
if($_GET['manage_vehicle']) :
    $vehicle_id = (int) $_GET['manage_vehicle'];
    $vehicle = array(
        'vehicle_id' => $vehicle_id,
    );
$vehicle_object = $vehicle_manager->get($vehicle);
endif;

/* Vehicule to delete */
if(isset($_POST['vehicle_2_delete'])):
    $vehicle_2_delete = (int) $_POST['vehicle_2_delete'];
    $vehicle = array(
        'vehicle_id' => $vehicle_2_delete,
    );
    $vehicle_manager->delete($vehicle);
    header('Location:http://'. BASE_URL .'/?profil');
    $_SESSION['vehicle']['deleted'] = 1;
    exit();
endif;

/* Manage vehicle trips */
if(isset($_POST['new_trip'])) :
    if(!empty($_POST['km']) && !empty($_POST['fuel_quantity']) && !empty($_POST['fuel_price'])) :
        $new_trip = array(
            'vehicle_id' => $vehicle_object->getVehicle_id(),
            'distance' => (float) $_POST['km'],
            'fuel_quantity' => (float) $_POST['fuel_quantity'],
            'fuel_price' => (float) $_POST['fuel_price'],
        );
        $vehicle_trip = new Trip($new_trip);
        d($vehicle_trip);
        $new_global_km = $vehicle_object->getGlobal_km() + $vehicle_trip->getDistance();
        $vehicle_manager->change_vehicle_global_km($vehicle_object, $new_global_km);
        $trip_manager->add($vehicle_trip);
        unset($_POST);
        header('Location:http://'. BASE_URL .'/?stats='.$vehicle_object->getVehicle_id());
    else :
        $msg .= 'Tous les champs doivent être complétés pour l\'ajout d\'un parcours';
    endif;
endif;

/* Messages */
if($_SESSION['vehicle']['exists']) :
    $msg .= "Ce véhicule est déjà dans votre liste";
    unset($_SESSION['vehicle']['exists']);
endif;
if($_SESSION['vehicle']['deleted']) : 
    $msg .= "Le véhicule a été supprimé";
    unset($_SESSION['vehicle']['deleted']);
endif;



/**
 * Description of VehicleController
 *
 * @author mika
 */
//class VehicleController {
//    //put your code here
//}
