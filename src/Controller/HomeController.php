<?php

namespace compta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use compta\Domain\UserGroup;
use compta\Domain\User;
use compta\Domain\Depenses;



class HomeController 
{

    /**

     * Home page controller.
     *
     * @param Application $app Silex application
     */


    public function indexAction(Application $app) {
        $result = $app['dao.user']->findAll();
        return $app->json(array(
            'records' => $result,
            'status' => 'OK'
        ), 200);
    }

 /**
     * Groupe details controller.
     *
     * @param integer $id UserGroupe id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
<<<<<<< Updated upstream
    public function groupAction(Request $request, Application $app) {
        $group = $app['dao.user_group']->findAll();
=======
/*    public function groupAction($id, Request $request, Application $app) {
        $group = $app['dao.user_group']->findById($id);
        try {
            $json = this->fetchAssoc($group, $tab);
>>>>>>> Stashed changes
        return $app->json(array(
            'records' => $json,
            'status' => 'OK'
        ), 200);

        }
        catch (Exception $e) {
            echo 'Exception reçue : ',  $e->getMessage(), "\n";
        }
    }*/


    public function loginAction(Request $request, Application $app) {
       return $app->render('/login', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            ));
}

}

/*public function converTojson ($group){
    $tab = [];
    return $tab;
}*/

