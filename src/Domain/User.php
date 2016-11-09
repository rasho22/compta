<?php

namespace compta\Domain;




class User 
{

    private $id;
    private $color;
    private $Pwd;
    private $pseudo;
    private $role;
    private $groups;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

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
        return $this->$Pwd;
    }
    /**
     * @inheritDoc
     */
    public function setPwd($Pwd) {
        $this->Pwd= $Pwd;
    }

    public function getRole() {
        return $this->$role;
    }
    /**
     * @inheritDoc
     */
    public function setRole($role) {
        $this->role= $role;
    }


    /**
        * Returns the list of groups for the current user.
        *
        * @return int[] The list of groups for the current user.
    */
        public function getGroups() { return $this->groups; }
        
    /**

    /**
        * Sets the list of groups for the current user.
        *
        * @param int[] The new list of groups for the current user, as group ids.
        *
        * @return self|null The current user if the param is valid, null otherwise.
        */
    
        public function setGroups(array $groups) {
            if (count($groups) == 0) $this->groups = NULL;
            else {
                foreach ($groups as $group) {
                    $group = (int) $groups;
                    if ($group <= 0) return NULL;
                }
                $this->groups = $groups;
            }
            return $this;
        }

}