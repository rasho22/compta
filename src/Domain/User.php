<?php

namespace compta\Domain;


use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{

    private $id;
    private $color;
    private $Pwd;
    private $pseudo;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    public function setSalt($salt)
    {
        $this->salt = $salt;
    }
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
        return $this->color;
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
        return $this->Pwd;
    }
    /**
     * @inheritDoc
     */
    public function setPwd($Pwd) {
        $this->Pwd= $Pwd;
    }
}