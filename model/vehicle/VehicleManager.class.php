<?php
## model/vehicle/VehicleManager.class.php

/**
 * Description of VehicleManager
 *
 * @author mika
 */
class VehicleManager {
    
    private $db;
    
    public function __construct($db) {
        $this->setDb($db);
    }
    
    public function setDb(PDO $db){
        $this->db = $db;
    }
    
    /* ----------CREATE */
    
    public function add(Vehicle $vehicle) {
        $query = $this->db->prepare('INSERT INTO vehicle '
                . 'SET brand=:brand, model=:model, type=:type, fuel_type=:fuel_type, global_km=:global_km, user_id=:user_id');
        $query->bindValue(':brand', $vehicle->getBrand(), PDO::PARAM_STR);
        $query->bindValue(':model', $vehicle->getModel(), PDO::PARAM_STR);
        $query->bindValue(':type', $vehicle->getType(), PDO::PARAM_STR);
        $query->bindValue(':fuel_type', $vehicle->getFuel_type(), PDO::PARAM_STR);
        $query->bindValue(':global_km', $vehicle->getGlobal_km(), PDO::PARAM_INT);
        $query->bindValue(':user_id', $vehicle->getUser_id(), PDO::PARAM_INT);
        $query->execute();
        $query->closeCursor();
    }
    
    /* ----------READ */
    
    public function get(Array $vehicle) {
        $query = $this->db->prepare('SELECT * FROM vehicle WHERE vehicle_id=:vehicle_id');
        $query->bindValue(':vehicle_id', $vehicle['vehicle_id'], PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return new Vehicle($data);
    }

    public function getList($user_id) {
        $query = $this->db->prepare('SELECT * FROM vehicle '
                . 'WHERE user_id=:user_id ORDER BY vehicle_id ASC');
        $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return $data;
    }
    
    /* ----------UPDATE */
    
    public function update(Vehicle $vehicle, Trip $trip) {

    }
    
    public function change_vehicle_global_km(Vehicle $vehicle, $new_global_km){
        $query = $this->db->prepare('UPDATE vehicle '
                . 'SET global_km = :km '
                . 'WHERE vehicle_id = :vehicle_id');
        $query->bindValue(':km', $new_global_km, PDO::PARAM_INT);
        $query->bindValue(':vehicle_id', $vehicle->getVehicle_id(), PDO::PARAM_INT);
        $query->execute();
        $query->closeCursor();
    }
    
    /* ----------DELETE */
    
    public function delete(Array $vehicle) {
        $query = $this->db->prepare('DELETE FROM vehicle WHERE vehicle_id=:vehicle_id');
        $query->bindValue('vehicle_id', $vehicle['vehicle_id'], PDO::PARAM_INT);
        $query->execute();
        $query->closeCursor();
    }
        
    /* ----------VEHICLE EXISTS? */
    
    public function exists(Vehicle $vehicle) {
        $query = $this->db->prepare('SELECT * FROM vehicle '
                . 'WHERE brand=:brand AND model=:model AND fuel_type=:fuel_type AND user_id=:user_id ORDER BY brand');
        $query->bindValue(':brand', $vehicle->getBrand(), PDO::PARAM_STR);
        $query->bindValue(':model', $vehicle->getModel(), PDO::PARAM_STR);
        $query->bindValue(':fuel_type', $vehicle->getFuel_type(), PDO::PARAM_STR);
        $query->bindValue(':user_id', $vehicle->getUser_id(), PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        if(!empty($data)):
            return true;
        else :
            return false;
        endif;
    }
    
    public function is_vehicle_owner(Vehicle $vehicle, $user_id){
        $query = $this->db->prepare('SELECT date '
                . 'FROM vehicle '
                . 'WHERE vehicle_id = :vehicle_id '
                . 'AND user_id = :user_id');
        $query->bindValue(':vehicle_id', $vehicle->getVehicle_id(), PDO::PARAM_INT);
        $query->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        if(!empty($data)):
            return $data;
        else:
            return false;
        endif;
    }
}
