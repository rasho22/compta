<?php

namespace compta\DAO;

<<<<<<< HEAD
use Doctrine\DBAL\Connection;
use compta\Domain\User;

class UserDAO extends DAO
=======
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use compta\Domain\User;
use Doctrine\DBAL\Connection;
use compta\Domain\User;

class UserDAO extends DAO implements UserProviderInterface
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
{


    /**
     * Return a list of all users, sorted by date .
     *
     * @return array A list of all users.
     */
    public function findAll() {
<<<<<<< HEAD
        $sql = "select * from users order by users_id desc";
=======
        $sql = "select * from users";
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $result = $this->db->fetchAll($sql);
        
        // Convert query result to an array of domain objects
        $users = array();
        foreach ($result as $row) {
            $usersId = $row['id_users'];
            $users[$usersId] = $this->buildDomainObject($row);
        }
        return $users;
    }

<<<<<<< HEAD
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

=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
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