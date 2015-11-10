<?php

/**
 * Description of TripController
 *
 * @author Mika
 */
if (isset($_GET['stats']) && !empty($_GET['stats'])) :
    $vehicle = array('vehicle_id' => (int) $_GET['stats']);
    if (($vehicle['vehicle_id'] === 0)):
        header('Location:http://' . BASE_URL . '/?profil&error=noStats');
    else :
        $current_vehicle = $vehicle_manager->get($vehicle);
        if(!$current_vehicle): header('Location:http://' . BASE_URL . '/?profil&error=noStats'); endif;
        $vehicle_exists = $vehicle_manager->exists($current_vehicle);
        if ($vehicle_exists):
            $current_user = (int) $_SESSION['user']['user_id'];
            $trip_exists = $trip_manager->exists($current_vehicle);
            if ($trip_exists):
                if ($vehicle_manager->is_vehicle_owner($current_vehicle, $current_user)) :
                    $vehicle_object = $current_vehicle;
                    $date = $trip_manager->getDate($current_vehicle);
                    if ($data !== false):
                        $last_modif = $date['date'];
                    endif;
                    $first_date = $trip_manager->getFirstDate($vehicle_object)->date;
                    $global_distance_full = $trip_manager->getDistanceTotal($vehicle_object)->distance;
                    $global_conso_full = $trip_manager->getGlobalConso($vehicle_object)->fuel_quantity;
                    $average_conso_full = (100 * $global_conso_full) / $global_distance_full;
                    $global_price_full = $trip_manager->getGlobalPrice($vehicle_object)->fuel_price;
                    $price_per_km_full = $global_price_full / $global_distance_full;
                    $global_distance = number_format($global_distance_full, 2);
                    $global_conso = number_format($global_conso_full, 2);
                    $average_conso = number_format($average_conso_full, 2);
                    $global_price = number_format($global_price_full, 2);
                    $price_per_km = number_format($price_per_km_full, 2);
                else :
                    header('Location:http://' . BASE_URL . '/?profil&error=stats');
                endif;
            else:
                header('Location:http://' . BASE_URL . '/?profil&error=noStats');
            endif;
        else :
            header('Location:http://' . BASE_URL . '/?profil&error=noStats');
        endif;
    endif;
endif;

if ($last_modif) :
    $last_modif = date('d/m/Y à H:i', strtotime($last_modif));
else :
    $last_modif = 'Pas encore de parcours.';
endif;

if ($first_date) :
    $first_date = date('d/m/Y', strtotime($first_date));
else :
    $first_date = 'Pas encore de parcours.';
endif;

if (isset($_GET['error']) && $_GET['error'] == 'stats' && !empty($_SESSION)):
    $msg .= 'Ce véhicule n\'existe pas';
elseif (isset($_GET['error']) && $_GET['error'] == 'noStats' && !empty($_SESSION)):
    $msg .= 'Pas de parcours enregistré pour ce véhicule';
endif;

//class TripController {
//    //put your code here
//}
