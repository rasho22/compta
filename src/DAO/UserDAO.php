<?php
namespace compta\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use compta\Domain\User;
use Doctrine\DBAL\Connection;


class UserDAO extends DAO
{


    /**
     * Return a list of all users, sorted by date .
     *
     * @return array A list of all users.
     */
    public function findAll() {
        $sql = "select * from users";

        $result = $this->getDb()->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $users = array();
        foreach ($result as $row) {
            $usersId = $row['id_users'];
            $users[$usersId] = $this->buildDomainObject($row);
        }
        return $users;
    }



        /**
         * Create a new user in database, or update an existing one.
         *
         * $param User An instance of User.
         */
        public function save(User $user) {
            // create/update entry in 'users' table
            $data = array(
                'user_name' => $user->getPseudo(),
                'color' => $user->getColor()
            );
            $id = $user->getId();
            if ( $id != NULL)
                $this->getDb()->update('users', $data, array('id' => $id));
            else {
                $this->getDb()->insert('users', $data);
                $id = $this->getDb()->lastInsertId();
                $user->setId($id);
            }
            // get entries from 'users_has_user_group' table
            $query = $this->getDb()->createQueryBuilder();
            $query->select('*')
                  ->from('users_has_user_group')
                  ->where('id_users = :id_users')
                  ->setParameter(':id_users', $user->getId());
            $answer = $query->execute()->fetchAll(\PDO::FETCH_ASSOC);
            /*$groups = $user->getGroups();
            // create entries in 'users_has_user_group' table
            foreach ($groups as $group) {
                $found = false;
                foreach ($answer as $row)
                    if ($row['id_users_group'] == $group) $found = true;
                if (!$found)
                    $this->getDb()->insert('users_has_user_group', array(
                        'user_id' => $id,
                        'group_id' => $group
                    ));
            }*/
            /*
            // remove entries in 'users_has_user_group' table
            foreach ($answer as $row) {
                $found = false;
                foreach ($groups as $group)
                    if ($row['group_id'] == $group) $found = true;
                if (!$found) {
                    $this->getDb()->delete('users_has_user_group', array(
                        'user_id' => $id,
                        'group_id' => $row['group_id']
                    ));
                }
            }
            */
        }

    /**

     * Creates a User object based on a DB row.

     *



    /**     * Creates a User object based on a DB row.     *     * @param array $row The DB row containing Users data.     * @return compta\Domain\User     */   

    protected function buildDomainObject($row) {        
      $user = new User();        
      $user->setId($row['id_users']);
      $user->setPseudo($row['user_name']);
      $user->setColor($row['color']);
      $user->setPwd($row['pwd']);
      $user->setRole($row['role']);       
        return $user;    }
}