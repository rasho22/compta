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
     * Groupes details controller.
     *     
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function groupsAction(Request $request, Application $app) {
        $groups = $app['dao.user_group']->findAll();
        return $app->json(array(
            'records' => $groups,
            'status' => 'OK'
        ), 200);

    }


    /**
     * Groupe details controller.
     * @param integer $id group id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */

    public function groupAction($id, Application $app){
           try{
               $group = $app['dao.user_group']->findById($id);
               $m = [];
               array_push($m, $group);
               $jsonGroup = $app['dao.user_group']->toJSONStructure($m);
           }
           catch(\Exception $e){
               return $app->json(array(
                   'records' => [],
                   'status' => 'KO',
                   'error' => $e->getMessage()
               ), 400);            
           }
            //  error_log($result);
            return $app->json(array(
                'records' => $jsonGroup,
               'status' => 'OK'
            ), 200);
        }


    public function loginAction(Request $request, Application $app) {
       return $app->render('/login', array(
            'error'         => $app['security.last_error']($request),
            'last_username' => $app['session']->get('_security.last_username'),
            ));
}

}

