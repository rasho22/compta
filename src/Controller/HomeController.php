<?php

namespace compta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
<<<<<<< HEAD
use compta\Domain\Depenses;
use compta\Domain\User;
use compta\Domain\UserGroup;

=======
use compta\Domain\UserGroup;
use compta\Domain\User;
use compta\Domain\Depenses;
>>>>>>> 96f9626674bd8e4a9ed927ca1c0ad38b10f01a31

class HomeController {

    /**
<<<<<<< HEAD
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {

=======
     * group details controller.
     *
     * @param integer $id group id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
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
         return $app->json((array('success', 'Details the group.'));
    }

/**
     * Home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
>>>>>>> 96f9626674bd8e4a9ed927ca1c0ad38b10f01a31
        $user = $app['dao.user']->findAll()
        return $app->json(array(
            'records' => $result,
            'status' => 'OK'
        ), 200);
    
    }

   
}
