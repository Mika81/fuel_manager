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
                . 'SET brand=:brand, model=:model, type=:type, fuel_type=:fuel_type, global_km=:global_km');
        $query->bindValue(':brand', $vehicle->getBrand());
        $query->bindValue(':model', $vehicle->getModel());
        $query->bindValue(':type', $vehicle->getType());
        $query->bindValue(':fuel_type', $vehicle->getFuel_type());
        $query->bindValue(':global_km', $vehicle->getGlobal_km());
        $query->execute();
    }
    
    /* ----------READ */
    
    public function get(Array $vehicle) {
        $query = $this->db->prepare('SELECT * FROM vehicle WHERE vehicle_id=:vehicle_id');
        $query->bindValue(':vehicle_id', $vehicle['vehicle_id']);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return new Vehicle($data);
    }

    public function getList() {
        /* Get vehicles list */
    }
    
    /* ----------UPDATE */
    
    public function update(Vehicle $vehicle) {
        /* Update selected vehicle */
    }
    
    /* ----------DELETE */
    
    public function delete(Vehicle $vehicle) {
        /* Delete selected vehicle */
    }
    
    /* ----------VEHICLE EXISTS? */
    
    public function exists(Vehicle $vehicle) {
        /* Search if vehicle is already registred */
    }
}
