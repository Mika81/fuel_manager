<?php
## model/user/User.class.php

/**
 * Description of User
 *
 * @author mika
 */
class User {

    private $user_id;
    private $alias;
    private $pwd;
    private $address;
    private $email;

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

    public function getUser_id() {
        return $this->user_id;
    }

    public function getAlias() {
        return $this->alias;
    }

    public function getPwd() {
        return $this->pwd;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setUser_id($user_id) {
        if ($user_id >= 1 && strlen($user_id) <= 4) {
            $this->user_id = (int) $user_id;
        }
    }

    public function setAlias($alias) {
        if (strlen($alias) <= 64 && is_string($alias)) {
            $this->alias = $alias;
        }
    }

    public function setPwd($pwd) {
        $this->pwd = hash('sha512', $pwd);
    }

    public function setAddress($address) {
        if (strlen($address) <= 255 && is_string($address)) {
            $this->address = $address;
        }
    }

    public function setEmail($email) {
        if (strlen($email) <= 48 && is_string($email)) {
            $this->email = $email;
        }
    }

}
