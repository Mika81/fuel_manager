<?php

/**
 * Description of TripController
 *
 * @author Mika
 */
if (isset($_GET['stats']) && !empty($_GET['stats'])) {
    $vehicle = array('vehicle_id' => (int) $_GET['stats']);
    $current_vehicle = $vehicle_manager->get($vehicle);
    $current_user = (int) $_SESSION['user']['user_id'];
    if ($vehicle_manager->is_vehicle_owner($current_vehicle, $current_user)) :
        $vehicle_object = $current_vehicle;
        $date = $trip_manager->getDate($current_vehicle);
        if($data !== false):
            $last_modif = $date['date'];
        endif;
    else :
        header('Location:http://' . BASE_URL .'/?profil&error=stats');
    endif;
}

if (isset($_GET['error']) && $_GET['error'] == 'stats'){
    $msg .= 'Ce véhicule n\'existe pas';
}

//class TripController {
//    //put your code here
//}
