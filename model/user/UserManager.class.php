<?php

## model/user/UserManager.class.php

/**
 * Description of UserManager
 *
 * @author mika
 */
class UserManager {

    private $db;

    public function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->db = $db;
    }
    
    /* ----------CREATE */
    public function add(User $user){
        $query = $this->db->prepare('INSERT INTO user SET alias=:alias, pwd=:pwd, address=:address, email=:email');
        $query->bindValue(':alias', $user->getAlias());
        $query->bindValue(':pwd', $user->getPwd());
        $query->bindValue(':address', $user->getAddress());
        $query->bindValue(':email', $user->getEmail());
        $query->execute();
    }
    
    /* ----------READ */
    public function get(Array $user){
        $query = $this->db->prepare('SELECT * FROM user WHERE alias=:alias AND pwd=:pwd');
        $query->bindValue(':alias', $user['alias']);
        $query->bindValue(':pwd', $user['pwd']);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return new User($data);
    }
    
    public function getList(){
        /* Get user list */
    }
    
    /* ----------UPDATE */
    public function update(User $user){
        /* Update current user */
    }
    
    /* ----------DELETE */
    public function delete(User $user){
        /* Delete current user */
    }

}
