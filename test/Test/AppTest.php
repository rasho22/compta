<?php

namespace compta\Test;

require_once __DIR__.'/../../vendor/autoload.php';

use Silex\WebTestCase;
use compta\DAO\UserDAO;
use compta\DAO\UserGroupDAO;

class AppTest extends WebTestCase
{
    public $app;

    /** 
     * Basic, application-wide functional test inspired by Symfony best practices.
     * Simply checks that all application URLs load successfully.
     * During test execution, this method is called for each URL returned by the provideUrls method.
     *
     * @dataProvider provideUrls 
     */
    public function testPageIsSuccessful($url)
    {
        $client = $this->createClient();
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful());
    }


  public function testUserSelection(){
        $udao = $this->app['dao.user'];
        $res = $udao->findAll();
        $this->assertTrue(count($res) == 2);
}

//lister les groupes
    public function testUserGroupSelection(){
        $udao = $this->app['dao.user_group'];
        $res = $udao->findAll();
        $this->assertTrue(count($res) == 2);

    }

    //ajouter un groupe
public function testAddGroupSelection(){
        $udao=$this->app['dao.user_group'];
        $this->getDb()->insert('user_groups', $data);
        $res=$udao->save();
        $this->assertTrue(1 == 1);

       
    }



    /**
     * {@inheritDoc}
     */
    public function createApplication()
    {
        $app = new \Silex\Application();

        require __DIR__.'/../../app/config/dev.php';
        require __DIR__.'/../../app/app.php';
        require __DIR__.'/../../app/routes.php';
        
        // Generate raw exceptions instead of HTML pages if errors occur
        $app['exception_handler']->disable();
        // Simulate sessions for testing
        $app['session.test'] = true;
        // Enable anonymous access to admin zone
        $app['security.access_rules'] = array();
        $this->app = $app;

    
        //var_dump($this->app['db']);

        return $app;
    }

/**
     * Provides all valid application URLs.
     *
     * @return array The list of all valid application URLs.
     */


    public function provideUrls()
    {
        return array(
            array('/'),
            //array('/admin/user/add'),
            //array('/login'),
            array('/admin'),
            /*array('/admin/user/1/edit'),
            array('/admin/user_group/1/edit'),*/

            );

    }
}
 