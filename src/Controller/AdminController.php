<?php

namespace compta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use compta\Domain\UserGroup;
use compta\Domain\User;
use compta\Domain\Depenses;


class AdminController {

    /**
     * Add group controller.
    
     */
    public function addGroupAction(Request $request, Application $app) {
        $group = new UserGroup();
        $group->setIdGroup($row['id_user_group']);
        $group->setGroupName($row['group_name']);

        $group = $app["dao.group"]->save();
       return $app->json('success', 'The group was succesfully created.');
    }

    /**
     * Edit group controller.
     *
     * @param integer $id Group id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function editGroupAction($id, Request $request, Application $app) {
        $group = $app['dao.group']->find($id_user_group);

        // Delete the group
        $app['dao.group']->delete($id_user_group);

        return $app->json('success', 'The group was succesfully deleted.');
        
    }

  } 