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
        $query->bindValue(':vehicle_id', $trip->getVehicle_id(), PDO::PARAM_INT);
        $query->bindValue(':distance', $trip->getDistance(), PDO::PARAM_INT);
        $query->bindValue(':fuel_quantity', $trip->getFuel_quantity(), PDO::PARAM_INT);
        $query->bindValue(':fuel_price', $trip->getFuel_price(), PDO::PARAM_INT);
        $query->execute();
        $query->closeCursor();
    }

    /* ----------READ */
    
    public function exists(Vehicle $vehicle){
        $query = $this->db->prepare('SELECT * '
                . 'FROM trip '
                . 'WHERE vehicle_id = :vehicle_id ');
        $query->bindValue(':vehicle_id', $vehicle->getVehicle_id(), PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_OBJ);
        $query->closeCursor();
        if(empty($data)):
            return false;
        else:
            return true;
        endif;
    }

    public function getDate(Vehicle $vehicle) {
        $query = $this->db->prepare('SELECT date '
                . 'FROM trip '
                . 'WHERE vehicle_id = :vehicle_id '
                . 'ORDER BY date '
                . 'DESC');
        $query->bindValue(':vehicle_id', $vehicle->getVehicle_id(), PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        if (empty($data)):
            return false;
        else :
            return $data;
        endif;
    }

    public function getFirstDate(Vehicle $vehicle) {
        $query = $this->db->prepare('SELECT date '
                . 'FROM trip '
                . 'WHERE vehicle_id = :vehicle_id '
                . 'ORDER BY date '
                . 'ASC');
        $query->bindValue(':vehicle_id', $vehicle->getVehicle_id(), PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_OBJ);
        $query->closeCursor();
        if (empty($data)):
            return false;
        else :
            return $data;
        endif;
    }

    public function getDistanceTotal(Vehicle $vehicle) {
        $query = $this->db->prepare('SELECT SUM(distance) AS distance '
                . 'FROM trip '
                . 'WHERE vehicle_id = :vehicle_id');
        $query->bindValue(':vehicle_id', $vehicle->getVehicle_id(), PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_OBJ);
        $query->closeCursor();
        return $data;
    }

    public function getGlobalConso(Vehicle $vehicle) {
        $query = $this->db->prepare('SELECT SUM(fuel_quantity) AS fuel_quantity '
                . 'FROM trip '
                . 'WHERE vehicle_id = :vehicle_id');
        $query->bindValue(':vehicle_id', $vehicle->getVehicle_id(), PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_OBJ);
        $query->closeCursor();
        return $data;
    }

    public function getGlobalPrice(Vehicle $vehicle) {
        $query = $this->db->prepare('SELECT SUM(fuel_price) AS fuel_price '
                . 'FROM trip '
                . 'WHERE vehicle_id = :vehicle_id');
        $query->bindValue(':vehicle_id', $vehicle->getVehicle_id(), PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_OBJ);
        $query->closeCursor();
        return $data;
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
