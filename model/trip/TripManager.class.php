<?php

## model/user/TripManager.class.php

/**
 * Description of TripManager
 *
 * @author mika
 */
class TripManager {

    private $db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->db = $db;
    }

    /* ----------CREATE */

    public function add(Trip $trip) {
        $query = $this->db->prepare('INSERT INTO trip '
                . 'SET vehicle_id = :vehicle_id, distance = :distance, fuel_quantity = :fuel_quantity, fuel_price = :fuel_price');
        $query->bindValue(':vehicle_id', $trip->getVehicle_id(), PDO::PARAM_STR);
        $query->bindValue(':distance', $trip->getDistance(), PDO::PARAM_STR);
        $query->bindValue(':fuel_quantity', $trip->getFuel_quantity(), PDO::PARAM_STR);
        $query->bindValue(':fuel_price', $trip->getFuel_price(), PDO::PARAM_STR);
        $query->execute();
        $query->closeCursor();
    }

    /* ----------READ */

    public function get() {

    }

    public function getList() {
        
    }

    /* ----------UPDATE */

    public function update(Trip $trip) {
        
    }

    /* ----------DELETE */

    public function delete() {
        
    }
}