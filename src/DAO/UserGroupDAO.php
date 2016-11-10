<?php

namespace compta\DAO;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use compta\Domain\UserGroup;
use compta\Domain\User;
use Doctrine\DBAL\Connection;

class UserGroupDAO extends DAO 
{
    //infos about allGroups
    public function findAll() {
        $sql = "select * from user_group";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $groups = array();
        foreach ($result as $row) {
            $id = $row['group_name'];
            $groups[$id] = $this->buildDomainObject($row);
        }
        print_r ($groups);
    }

//infos about one group byId
   
    public function findById($id) {
            if ($id == null)
                throw new \Exception("id null ");
            else {
               $sql = "SELECT * FROM user_group WHERE id_user_group=:id";
               $dbh = $this->getDb()->prepare($sql);
               $dbh->execute(array('id'=>$id));
                $result = $dbh->fetchAll();
               

                if (count($result)>0){
                     error_log(var_export($result,true));
                   $gro = $this->buildDomainObject($result[0]);
                    return $gro;
               }
                else
                    throw new \Exception("No group matching id " . $id);
           }
       }

//infos about one group byName
    public function findByName($name) {
        $sql = "select * from user_group where group_name=?";
        $row = $this->getDb()->fetchAssoc($sql, array($name));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No group matching name " . $name);
    }

    //save group

    public function save(UserGroup $group) {
        $groupData = array(
            "group_name" => $group->getGroupName()
        );

        if ($group->getIdGroup()) {
            // The group has already been saved : update it
            $this->getDb()->update('user_group', $groupData, array('id_user_group' => $group->getIdGroup()));
        } else {
            // The group has never been saved : insert it
            $this->getDb()->insert('user_group', $groupData);
            // Get the id of the newly created group and set it on the entity.
            $id = $this->getDb()->lastInsertId();
            $group->setId($id);
        }
  } 



    //creates a group object based on a DB row
    protected function buildDomainObject($row) {
        $group = new UserGroup();
        $group->setId($row['id_user_group']);
        $group->setGroupName($row['group_name']);
        return $group;
    }

//convertir un objet en tableau
    public function toJSONStructure(Array $groupes){
       $jsonResult=[];
       foreach ($groupes as $key => $groupe) {
           $jsonResult[$key] = [];
           $jsonResult[$key]["id_user_group"] = $groupe->getId();
           $jsonResult[$key]["group_name"] = $groupe->getGroupName();
           
       }        return $jsonResult;
               
   }
     

}