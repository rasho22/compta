<?php

namespace compta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use compta\Domain\UserGroup;
use compta\Domain\User;
use compta\Domain\Depenses;


class AdminController {

    public function loginAction(Request $request, Application $app) {
        return $app->render('/login', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
        ));
    }

    /**
     * Add group controller.
    
     */
    public function addGroupAction(Request $request, Application $app) {
        $group = new UserGroup();
        $group->setGroup($request->request->get('id_user_group'));
        $group->setGroupName($request->request->get('group_name'));
        
        if (!$request->request->has('id_user_group')) {
            return $app->json('Missing required parameter: id_user_group', 400);
        }
        if (!$request->request->has('group_name')) {
            return $app->json('Missing required parameter: group_name', 400);
        }
        $responseData = $this->buildGroupArray($group);
         return $app->json($responseData, 201);  // 201 = Created

         $app['dao.group']->save($group);
    }

     /**
     * API delete group controller.
     *
     * @param integer $id group id
     * @param Application $app Silex application
     */
    public function editGroupAction($id_user_group, Application $app) {
        // Delete all associated depenses
        $app['dao.depense']->deleteAllByGroup($id_user_group);
        // Delete the group
        $app['dao.group']->delete($id_user_group);
        return $app->json('No Content', 204);  // 204 = No content
    }

    /**
     * Converts an group object into an associative array for JSON encoding
     *
     *
     *
     * @return array Associative array whose fields are the group properties.
     */
    private function buildGroupArray(Group $group) {
        $data  = array(
            'id_user_group' => $group->getId(),
            'group_name' => $group->getName(),
            );
        return $data;
    }

  } 