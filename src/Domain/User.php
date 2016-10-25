<?php

<<<<<<< HEAD

namespace compta\Domain;
=======
namespace app_compta\Domain;
>>>>>>> 96f9626674bd8e4a9ed927ca1c0ad38b10f01a31

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
<<<<<<< HEAD

=======
>>>>>>> 96f9626674bd8e4a9ed927ca1c0ad38b10f01a31
    private $id;
    private $color;
    private $Pwd;
    private $pseudo;

<<<<<<< HEAD
    public function getId()
    {
        return $this->$id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

=======
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
>>>>>>> 96f9626674bd8e4a9ed927ca1c0ad38b10f01a31
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