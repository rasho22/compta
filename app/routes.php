<?php

// Home page
$app->get('/', "compta\Controller\HomeController::indexAction")->bind('home');

// Login form
$app->post('/login', "compta\Controller\HomeController::loginAction")->bind('login');

// Display all groups
$app->match('/group', "compta\Controller\HomeController::groupAction")->bind('group');

//get name of group matching an id
$app->match('/group/{id}', "compta\Controller\HomeController::groupByIdAction");



// Admin zone
$app->get('/admin', "compta\Controller\AdminController::indexAction")->bind('admin');

// Add a new group
$app->match('/admin/group/add', "compta\Controller\AdminController::addGroupAction")->bind('admin_group_add');

// Edit an existing group
$app->match('/admin/group/{id}/edit', "compta\Controller\AdminController::editGroupAction")->bind('admin_group_edit');

//add a depense
$app->get('/admin/depense/add', "compta\Controller\AdminController::addDepenseAction")->bind('admin_depense_add');

//read depenses
$app->get('/depense/{id}', "compta\Controller\AdminController::getDepenseAction");

// Edit an existing depense
$app->match('/admin/depense/{id}/edit', "compta\Controller\AdminController::editDepenseAction")->bind('admin_depense_edit');

// Remove a depense
$app->get('/admin/depense/{id}/delete', "compta\Controller\AdminController::deleteDepenseAction")->bind('admin_depense_delete');

// Add a user
$app->match('/admin/user/add', "compta\Controller\AdminController::addUserAction")->bind('admin_user_add');

// Edit an existing user
$app->match('/admin/user/{id}/edit', "compta\Controller\AdminController::editUserAction")->bind('admin_user_edit');

// Remove a user
$app->get('/admin/user/{id}/delete', "compta\Controller\AdminController::deleteUserAction")->bind('admin_user_delete');




/*

// API : get all groups
$app->get('/api/groups', "compta\Controller\ApiController::getGroupsAction")->bind('api_groups');

// API : get a group
$app->get('/api/group/{id}', "compta\Controller\ApiController::getGroupAction")->bind('api_group');

// API : create a group
$app->post('/api/group', "compta\Controller\ApiController::addGroupAction")->bind('api_group_add');

// API : remove a group
$app->delete('/api/group/{id}', "MicroCMS\Controller\ApiController::deleteArticleAction")->bind('api_group_delete');

// API : get all users
$app->get('/api/users', "compta\Controller\ApiController::getGroupsAction")->bind('api_groups');

// API : get a group
$app->get('/api/group/{id}', "compta\Controller\ApiController::getGroupAction")->bind('api_group');

// API : create a group
$app->post('/api/group', "compta\Controller\ApiController::addGroupAction")->bind('api_group_add');

// API : remove a group
$app->delete('/api/group/{id}', "MicroCMS\Controller\ApiController::deleteArticleAction")->bind('api_group_delete');*/
