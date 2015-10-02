<?php
## model/user/Trip.class.php

/**
 * Description of Trip
 *
 * @author mika
 */
class Trip {

    private $trip_id;
    private $vehicle_id;
    private $distance;
    private $fuel_quantity;
    private $fuel_price;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getTrip_id() {
        return $this->trip_id;
    }

    public function getVehicle_id() {
        return $this->vehicle_id;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function getFuel_quantity() {
        return $this->fuel_quantity;
    }
    
    public function getFuel_price() {
        return $this->fuel_price;
    }

    public function setTrip_id($trip_id) {
        if ($trip_id >= 1 && strlen($trip_id) <= 11) {
            $this->trip_id = (int) $trip_id;
        }
    }

    public function setVehicle_id($vehicle_id) {
        if ($vehicle_id >= 1 && strlen($vehicle_id) <= 11) {
            $this->vehicle_id = (int) $vehicle_id;
        }
    }

    public function setDistance($distance) {
        if (is_numeric($distance)){
            $this->distance = (float) $distance;
        }
    }
    
    public function setFuel_quantity($fuel_quantity) {
        if (is_numeric($fuel_quantity)){
            $this->fuel_quantity = (float) $fuel_quantity;
        }
    }
    
    public function setFuel_price($fuel_price) {
        if (is_numeric($fuel_price)){
            $this->fuel_price = (float) $fuel_price;
        }
    }
}
