<?php

namespace compta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use compta\Domain\UserGroup;
use compta\Domain\User;
use compta\Domain\Depenses;


class HomeController 

    /**

     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
<<<<<<< HEAD
          $user = $app['dao.user']->findAll();
=======
          $result = $app['dao.user']->findAll();
>>>>>>> 468013d9feae9b4fbc74fcfade37f28d21bdf3f7
        return $app->json(array(
            'records' => $result,
            'status' => 'OK'
        ), 200);
    }

    public function groupAction($id_user_group, Request $request, Application $app) {
        $group = $app['dao.group']->find($id_user_group);
        
        if ($app['security.authorization_checker']->isGranted('IS_AUTHENTICATED_FULLY')) {

            //add depenses
            $depense = new Depense();
            $depense->setGroup($group);
            $user = $app['user'];
            $depense->setDepense($user);
           
        }
        $depenses = $app['dao.depense']->findAllByGroup($id);
         return $app->json((array('success', 'Details the group.')));
    }


    public function loginAction(Request $request, Application $app) {
       return $app->render('/login', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            ));
}

}