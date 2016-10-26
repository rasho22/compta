<?php

namespace compta\Test;

require_once __DIR__.'/../../vendor/autoload.php';

use Silex\WebTestCase;
use compta\DAO\UserDAO;

class AppTest extends WebTestCase
{
    public $app;

   
    public function testPageIsSuccessful($url)
    {
        $client = $this->createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
    

    public function testGroupSelection(){
        $udao = $this->app['dao.UserGroup'];
        $res = $udao->findAll();
        $this->assertTrue(count($res) == 1);

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
 public function provideUrls()
    {
        return array(
            array('/'),
            array('/group/1'),
            array('/admin/group/add'),
            array('/admin/group/1/edit'),
            ); 
    }
}
 