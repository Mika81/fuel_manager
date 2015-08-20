<?php
## model/vehicle/Vehicle.class.php

/**
 * Description of vehicle
 *
 * @author mika
 */
class Vehicle {
    
    private $vehicle_id;
    private $brand;
    private $model;
    private $type;
    private $fuel_type;
    private $global_km;
    
    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data){
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function getVehicle_id(){ return $this->vehicle_id; }
    public function getBrand(){ return $this->brand; }
    public function getModel(){ return $this->model; }
    public function getType(){ return $this->type; }
    public function getFuel_type(){ return $this->fuel_type; }
    public function getGlobal_km(){ return $this->global_km; }
    
    public function setVehicle_id($vehicle_id){
        if ($vehicle_id >= 1 && strlen($vehicle_id) <= 4) {
            $this->vehicle_id = (int) $vehicle_id;
        }
    }
    
    public function setBrand($brand) {
        if(strlen($brand) <= 32 && is_string($brand)){
            $this->brand = $brand;
        }
    }
    
    public function setModel($model) {
        if(strlen($model) <= 32 && is_string($model)){
            $this->model = $model;
        }        
    }
    
    public function setType($type) {
        if(strlen($type) <= 32 && is_string($type)){
            $this->type = $type;
        }        
    }
    
    public function setFuel_type($fuel_type) {
        if(strlen($fuel_type) <= 16 && is_string($fuel_type)){
            $this->fuel_type = $fuel_type;
        }        
    }
    
    public function setGlobal_km($global_km) {
        $this->global_km = (int) $global_km;        
    }
}

