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
          $result = $app['dao.user']->findAll();
        return $app->json(array(
            'records' => $result,
            'status' => 'OK'
        ), 200);
    }

    public function groupAction(Application $app) {
        $groups = $app['dao.group']->findAll();
        $result = [];
        foreach ($groups as $group) {
          $result[] = array(
            'id' => $group->getId(),
            'name' => $group->getGroupName()
          );
        }        
       
        return $app->json(array(
          'records' => $result,
          'status' => 'OK'
        ), 200);
    }

    public function groupByIdAction()


    public function loginAction(Request $request, Application $app) {
       return $app->render('/login', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            ));
}

}