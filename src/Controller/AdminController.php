<?php

namespace compta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use compta\Domain\UserGroup;
use compta\Domain\Depenses;


class AdminController {
<<<<<<< HEAD
=======

    public function loginAction(Request $request, Application $app) {
        return $app->render('/login', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
        ));
    }



    public function logoutAction (Request $request, Application $app)
    {
>>>>>>> master

        /**
     * Add user controller.
    /**
     * Admin home page controller.

     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function addUserAction(Request $request, Application $app) {
        $user = new User();
              -> setName($user_name)
              -> setColor($color)
              -> setGroup($user_group)
        $app['dao.user']->save($user);
        return $app->json;
    }
    
    /**
     * Delete user controller.
     *
     * @param integer $id User id
     * @param Application $app Silex application
     */
    public function deleteUserAction($id, Application $app) {
        $app['dao.user']->delete($id);
        $app['dao.usergroup']->deleteByGroup($id);
        $app['dao.depenses']->deleteByUser($id);
        return $app->json(array(
            'status' => 'OK'
                ), 200);
        }

    /**
     * Add group controller.
     */
    public function addGroupAction(Request $request, Application $app) {
        
        
        if (!$request->request->has('id_user_group')) {
            return $app->json('Missing required parameter: id_user_group', 400);
        }
        if (!$request->request->has('group_name')) {
            return $app->json('Missing required parameter: group_name', 400);
        }

        $group = new UserGroup();
        $group->setGroup($request->request->get('id_user_group'));
        $group->setGroupName($request->request->get('group_name'));
        $responseData = $this->buildGroupArray($group);

        $app['dao.group']->save($group);

         return $app->json($responseData, 201);  // 201 = Created    
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



 //Add depense controller

    public function addDepenseAction(Request $request, Application $app) {

        //check request parameters
        if (!$request->request->has('montant')) {
            return $app->json('Il faut ajouter le paramètre "montant"', 400);
        }

        if (!$request->request->has('date')) {
            return $app->json('Il faut ajouter le paramètre "date"', 400);
        }

        if (!$request->request->has('description')) {
            return $app->json('Il faut ajouter le paramètre "description"', 400);
        }

        if (!$request->request->has('id_users')) {
            return $app->json('Il faut ajouter le paramètre "id_users"', 400);
        }

        //build and save the new depense
        $depense = new Depenses();
        $depense->setMontant($request->request->get("montant"));
        $depense->setDate($request->request->get("date"));        
        $depense->setDescription($request->request->get("description"));        
        $depense->setIdUsers($request->request->get("id_users"));
        $app["dao.depenses"]->save($depense);
        $responseData = $this->buildDepenseArray($article);
        return $app->json($responseData, 201);
        //201 = created

    }

    //read depense
    public function getDepenseAction($id, Application $app) {
        $depense = $app["dao.depense"]->findById($id);
        $responseData = $this->buildDepenseArray($depense);
        return $app->json($responseData);
    }


    /**
     * Edit depense controller.
     *
     * @param integer $id Depense id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function editDepenseAction($id, Request $request, Application $app) {
        $depense = $app['dao.depense']->findById($id);
        if ($request->request->has('montant') AND $request->request->has('date') AND $request->request->has('description') AND $request->request->has('id_users')) {
            $app['dao.depense']->save($depense);
        }

        else {
            echo "Il manque des paramètres !";
        }
    }

    /**
     * Delete depense controller.
     *
     * @param integer $id Depense id
     * @param Application $app Silex application
     */
    public function deleteDepenseAction($id, Application $app) {
        $app['dao.depense']->delete($id);
        // Redirect to admin home page
        return $app->redirect($app['url_generator']->generate('admin'));
    }


  } 

    //converts a depense into an associative array => for json
    private function buildDepenseArray(Depenses $depense) {
        $data = array(
            'id' => $depense->getIdDepenses(),
            'montant' => $depense->getMontant(),
            'date' => $depense->getDate(),
            'description' => $depense->getDescription(),
            'id_users' => $depense->getIdUser()
            );
        return $data;
    }
}
