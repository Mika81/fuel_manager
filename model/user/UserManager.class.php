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

    public function add(User $user) {
        $query = $this->db->prepare('INSERT INTO user SET alias=:alias, pwd=:pwd, address=:address, email=:email');
        $query->bindValue(':alias', $this->db->quote($user->getAlias()), PDO::PARAM_STR);
        $query->bindValue(':pwd', $user->getPwd());
        $query->bindValue(':address', $this->db->quote($user->getAddress()), PDO::PARAM_STR);
        $query->bindValue(':email', $this->db->quote($user->getEmail()), PDO::PARAM_STR);
        $query->execute();
        $query->closeCursor();
    }

    /* ----------READ */

    public function get(Array $user) {
        $query = $this->db->prepare('SELECT * FROM user WHERE alias=:alias AND pwd=:pwd');
        $query->bindValue(':alias', $this->db->quote($user['alias']), PDO::PARAM_STR);
        $query->bindValue(':pwd', hash('sha512', $user['pwd']));
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        return new User($data);
    }

    public function getList() {
        /* Get users list */
    }

    /* ----------UPDATE */

    public function update(User $user) {
        /* Update current user */
    }

    /* ----------DELETE */

    public function delete(User $user) {
        /* Delete current user */
    }

    /* ----------ALIAS/EMAIL EXISTS? */

    public function exists(User $user) {
        $query = $this->db->prepare('SELECT * FROM user WHERE alias=:alias OR email=:email');
        $query->bindValue(':alias', $this->db->quote($user->getAlias()), PDO::PARAM_STR);
        $query->bindValue(':email', $this->db->quote($user->getEmail()), PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        if (!empty($data)):
            return true;
        else :
            return false;
        endif;
    }

    public function user_start_session(Array $user) {
        $query = $this->db->prepare('SELECT * FROM user WHERE alias=:alias AND pwd=:pwd');
        $query->bindValue(':alias', $this->db->quote($user['alias']), PDO::PARAM_STR);
        $query->bindValue(':pwd', hash('sha512', $user['pwd']));
        $query->execute();
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $query->closeCursor();
        if (!empty($data)) :
            return true;
        else :
            return false;
        endif;
    }
}