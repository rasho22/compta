<?php

namespace compta\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use compta\Domain\Group;

class ApiController {

    /**
     * API groups controller.
     *
     * @param Application $app Silex application
     *
     * @return All groups in JSON format
     */
    public function getGroupsAction(Application $app) {
        $groups = $app['dao.user_group']->findAll();
        // Convert an array of objects ($groups) into an array of associative arrays ($responseData)
        $responseData = array();
        foreach ($groups as $user_group) {
            $responseData[] = $this->buildArticleArray($user_group);
        }
        // Create and return a JSON response
        return $app->json($responseData);
    }

    /**
     * API group details controller.
     *
     * @param integer $id group id
     * @param Application $app Silex application
     *
     * @return group details in JSON format
     */
    public function getGroupAction($id, Application $app) {
        $group = $app['dao.user_group']->find($id);
        $responseData = $this->buildArticleArray($group);
        // Create and return a JSON response
        return $app->json($responseData);
    }

    /**
     * API create group controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     *
     * @return group details in JSON format
     */
    public function addGroupAction(Request $request, Application $app) {
        // Check request parameters
        if (!$request->request->has('user_group')) {
            return $app->json('Missing required parameter: group', 400);
        }
        if (!$request->request->has('content')) {
            return $app->json('Missing required parameter: content', 400);
        }
        // Build and save the new group
        $group = new Group();
        $group->setUserGroup($request->request->get('user_group'));
        $group->setContent($request->request->get('content'));
        $app['dao.user_group']->save($user_group);
        $responseData = $this->buildArticleArray($user_group);
        return $app->json($responseData, 201);  // 201 = Created
    }

    /**
     * API delete group controller.
     *
     * @param integer $id group id
     * @param Application $app Silex application
     */
    public function deleteGroupAction($id, Application $app) {
        // Delete all associated depenses
        $app['dao.depense']->deleteAllByGroup($id);
        // Delete the group
        $app['dao.user_group']->delete($id);
        return $app->json('No Content', 204);  // 204 = No content
    }

    /**
     * Converts an group object into an associative array for JSON encoding
     *
     *
     *
     * @return array Associative array whose fields are the group properties.
     */
    private function buildGroupArray(Group $user_group) {
        $data  = array(
            'id' => $user_group->getId(),
            'name' => $user_group->getName(),
            );
        return $data;
    }

    public function getDepenseAction($id, Application $app) {
        $depense = $app["dao.depense"]->findById($id);
        $responseData = $this->buildDepenseArray($depense);
        return $app->json($responseData);
    }


}