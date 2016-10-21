<?php

namespace compta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
<<<<<<< HEAD
use compta\Domain\Group;
use compta\Domain\User;
use compta\Domain\Depense;
=======
use compta\Domain\UserGroup;
use compta\Domain\User;
use compta\Domain\Depenses;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af


class AdminController {

<<<<<<< HEAD
    /**
     * Admin home page controller.
     *
     * @param Application $app Silex application
     */
    public function indexAction(Application $app) {
        $groups = $app['dao.group']->findAll();
        $depenses = $app['dao.depense']->findAll();
        $users = $app['dao.user']->findAll();
    }

    /**
     * Add group controller.
    
     */
    public function addGroupAction(Request $request, Application $app) {
        $group = new Group();
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
        $group = $app['dao.group']->find($id);
        
    }

    /**
     * Delete group controller.
     *
     * @param integer $id Group id
     * @param Application $app Silex application
     */
    public function deleteGroupAction($id, Application $app) {
        // Delete all associated depenses
        $app['dao.depense']->deleteAllByGroup($id);
        // Delete the group
        $app['dao.group']->delete($id);
        $app['session']->getFlashBag()->add('success', 'The group was succesfully removed.');
        // Redirect to admin home page
        return $app->redirect($app['url_generator']->generate('admin'));
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




    /**
     * Edit depense controller.
     *
     * @param integer $id Depense id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function editDepenseAction($id, Request $request, Application $app) {
        $depense = $app['dao.depense']->find($id);
        $depenseForm = $app['form.factory']->create(new DepenseType(), $depense);
        $depenseForm->handleRequest($request);
        if ($depenseForm->isSubmitted() && $depenseForm->isValid()) {
            $app['dao.depense']->save($depense);
            $app['session']->getFlashBag()->add('success', 'The depense was succesfully updated.');
        }
        /*return $app['twig']->render('comment_form.html.twig', array(
            'title' => 'Edit comment',
            'commentForm' => $commentForm->createView()));*/
    }

    /**
     * Delete depense controller.
     *
     * @param integer $id Depense id
     * @param Application $app Silex application
     */
    public function deleteDepenseAction($id, Application $app) {
        $app['dao.depense']->delete($id);
        $app['session']->getFlashBag()->add('success', 'The depense was succesfully removed.');
        // Redirect to admin home page
        return $app->redirect($app['url_generator']->generate('admin'));
    }
=======
    
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

    /**
     * Add user controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function addUserAction(Request $request, Application $app) {
        $user = new User();
<<<<<<< HEAD
        $userForm = $app['form.factory']->create(new UserType(), $user);
        $userForm->handleRequest($request);
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            // generate a random salt value
            $salt = substr(md5(time()), 0, 23);
            $user->setSalt($salt);
            $plainPassword = $user->getPassword();
            // find the default encoder
            $encoder = $app['security.encoder.digest'];
            // compute the encoded password
            $password = $encoder->encodePassword($plainPassword, $user->getSalt());
            $user->setPassword($password); 
            $app['dao.user']->save($user);
            $app['session']->getFlashBag()->add('success', 'The user was successfully created.');
        }
        /*return $app['twig']->render('user_form.html.twig', array(
            'title' => 'New user',
            'userForm' => $userForm->createView()));*/
    }

    /**
     * Edit user controller.
     *
     * @param integer $id User id
     * @param Request $request Incoming request
     * @param Application $app Silex application
     */
    public function editUserAction($id, Request $request, Application $app) {
        $user = $app['dao.user']->find($id);
        $userForm = $app['form.factory']->create(new UserType(), $user);
        $userForm->handleRequest($request);
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $plainPassword = $user->getPassword();
            // find the encoder for the user
            $encoder = $app['security.encoder_factory']->getEncoder($user);
            // compute the encoded password
            $password = $encoder->encodePassword($plainPassword, $user->getSalt());
            $user->setPassword($password); 
            $app['dao.user']->save($user);
            $app['session']->getFlashBag()->add('success', 'The user was succesfully updated.');
        }
       /* return $app['twig']->render('user_form.html.twig', array(
            'title' => 'Edit user',
            'userForm' => $userForm->createView()));*/
    }

=======
              -> setName($user_name)
              -> setColor($color)
              -> setGroup($user_group)
        $app['dao.user']->save($user);
        return $app->json;
    }

    
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    /**
     * Delete user controller.
     *
     * @param integer $id User id
     * @param Application $app Silex application
     */
    public function deleteUserAction($id, Application $app) {
<<<<<<< HEAD
        // Delete all associated comments
        $app['dao.comment']->deleteAllByUser($id);
        // Delete the user
        $app['dao.user']->delete($id);
        $app['session']->getFlashBag()->add('success', 'The user was succesfully removed.');
        // Redirect to admin home page
        return $app->redirect($app['url_generator']->generate('admin'));
    }


    //converts a depense into an associative array => for json
    private function buildDepenseArray(Depenses $depense) {
        $data = array(
            'id' => $depense->getIdDepenses(),
            'montant' => $depense->getMontant(),
            'date' => $depense->getDate(),
            'description' => $depense->getDescription,
            'id_users' => $depense->getIdUser()
            );
        return $data;
    }
=======
        $app['dao.user']->delete($id);
        $app['dao.usergroup']->deleteByGroup($id);
        $app['dao.depenses']->deleteByUser($id);
        return $app->json(array(
            'status' => 'OK'
                ), 200);
        }
        
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
