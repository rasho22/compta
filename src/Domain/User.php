<?php

<<<<<<< HEAD
namespace MicroCMS\Domain;
=======
namespace app_compta\Domain;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
<<<<<<< HEAD
    /**
     * User id.
     *
     * @var integer
     */
    private $id;

    /**
     * User name.
     *
     * @var string
     */
    private $username;

    /**
     * User password.
     *
     * @var string
     */
    private $password;

    /**
     * Salt that was originally used to encode the password.
     *
     * @var string
     */
    private $salt;

    /**
     * Role.
     * Values : ROLE_USER or ROLE_ADMIN.
     *
     * @var string
     */
    private $role;
=======
    private $id;
    private $color;
    private $Pwd;
    private $pseudo;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
<<<<<<< HEAD

    /**
     * @inheritDoc
     */
    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
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

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }
 // ...


    /**

     * Comment author.

     *

     * @var \MicroCMS\Domain\User

     */

    private $author;


    // ...

    

    public function setAuthor(User $author) {

        $this->author = $author;

    }
    
=======
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
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}