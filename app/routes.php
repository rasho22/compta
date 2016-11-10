<?php

// see all users
$app->get('/', "compta\Controller\HomeController::indexAction")->bind('home');

// Login form
$app->get('/login', "compta\Controller\HomeController::loginAction")->bind('login');



// Admin zone
//$app->get('/admin', "compta\Controller\AdminController::indexAction")->bind('admin');



// Detailed info about groups
$app->get('/groups', "compta\Controller\HomeController::groupAction")->bind('group');

$app->get('/group/{id_user_group}', "compta\Controller\HomeController::groupAction")->bind('group');



// Add a new group
$app->get('/admin/group/add', "compta\Controller\AdminController::addGroupAction")->bind('admin_group_add');

// Edit an existing group
$app->get('/admin/group/{id}/edit', "compta\Controller\AdminController::editGroupAction")->bind('admin_group_edit');

    //add a depense
$app->get('/admin/depense/add', "compta\Controller\AdminController::addDepenseAction")->bind('admin_depense_add');

//read depenses
$app->get('/depense/{id}', "compta\Controller\AdminController::getDepenseAction");

// Edit an existing depense
$app->match('/admin/depense/{id}/edit', "compta\Controller\AdminController::editDepenseAction")->bind('admin_depense_edit');

// Remove a depense
$app->get('/admin/depense/{id}/delete', "compta\Controller\AdminController::deleteDepenseAction")->bind('admin_depense_delete');

// Add a user
$app->post('/admin/user/add', "compta\Controller\AdminController::addUserAction")->bind('admin_user_add');

// Edit an existing user
$app->get('/admin/user/{id}/edit', "compta\Controller\AdminController::editUserAction")->bind('admin_user_edit');

// Remove a user
$app->get('/admin/user/{id}/delete', "compta\Controller\AdminController::deleteUserAction")->bind('admin_user_delete');

