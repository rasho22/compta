<?php

namespace compta\Domain;


<<<<<<< HEAD
=======


>>>>>>> master
class User 
{

    private $id;
    private $color;
    private $Pwd;
    private $pseudo;
    private $role;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

<<<<<<< HEAD
    
=======
    /**
     * @inheritDoc
     */
    /*public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }*/
>>>>>>> master
    /**
     * @inheritDoc
     */
    public function getPseudo() {
        return $this->pseudo;
    }
    /**
     * @inheritDoc
     */
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }
    /**
     * @inheritDoc
     */

    public function getColor() {
        return $this->$color;
    }
    /**
     * @inheritDoc
     */

    public function setColor($color) {
        $this->color= $color;
    }
    /**
     * @inheritDoc
     */

    public function getPwd() {
        return $this->$Pwd;
    }
    /**
     * @inheritDoc
     */
    public function setPwd($Pwd) {
        $this->Pwd= $Pwd;
    }

<<<<<<< HEAD

      public function getRole() {
=======
    public function getRole() {
>>>>>>> master
        return $this->$role;
    }
    /**
     * @inheritDoc
     */
    public function setRole($role) {
        $this->role= $role;
    }
}