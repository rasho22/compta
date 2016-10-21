<?php

namespace compta\DAO;

use Doctrine\DBAL\Connection;
use compta\Domain\User;

class UserDAO extends DAO
{


    /**
     * Return a list of all users, sorted by date .
     *
     * @return array A list of all users.
     */
    public function findAll() {
        $sql = "select * from users order by users_id desc";
        $result = $this->db->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $users = array();
        foreach ($result as $row) {
            $usersId = $row['id_users'];
            $users[$usersId] = $this->buildDomainObject($row);
        }
        return $users;
    }

    //find a user by id

    public function find() {
        $sql = "select * from users where id_users=?";
        $result = $this->db->fetchAll($sql);

        $user = array();
        foreach ($result as $row) {
            $usersId = $row['id_users'];
            $user[$usersId] = $this->buildDomainObject($row);
        }
        return $user;

    }

    /**

     * Creates a User object based on a DB row.

     *

     * @param array $row The DB row containing Users data.

     * @return compta\Domain\User

     */

    protected function buildDomainObject($row) {

        $user = new User();

        $user->setId($row['id_users']);
        $user->setName($row['users_name']);
        $user->setColor($row['color']);
        $user->setPwd($row['pwd']);
        $user->setRole($row['role']);

        return $user;

    }
}