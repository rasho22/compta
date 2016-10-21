<?php

namespace compta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use compta\Domain\UserGroup;
use compta\Domain\User;
use compta\Domain\Depenses;

class HomeController {

    /**
     * group details controller.
     *
     * @param integer $id group id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function groupAction($id_user_group, Request $request, Application $app) {
        $group = $app['dao.group']->find($id_user_group);
        
        if ($app['security.authorization_checker']->isGranted('IS_AUTHENTICATED_FULLY')) {
            // A user is fully authenticated : he can add comments
            $depense = new Depense();
            $depense->setGroup($group);
            $user = $app['user'];
            $depense->setAuthor($user);
           
        }
        $depenses = $app['dao.depense']->findAllByGroup($id);
         return $app->json((array('success', 'Details the group.'));
    }

   
}
