<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Http\Tests\Authentication;

use Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class DefaultAuthenticationFailureHandlerTest extends \PHPUnit_Framework_TestCase
{
<<<<<<< HEAD
    private $httpKernel = null;

    private $httpUtils = null;

    private $logger = null;

    private $request = null;

    private $session = null;

    private $exception = null;
=======
    private $httpKernel;
    private $httpUtils;
    private $logger;
    private $request;
    private $session;
    private $exception;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

    protected function setUp()
    {
        $this->httpKernel = $this->getMock('Symfony\Component\HttpKernel\HttpKernelInterface');
        $this->httpUtils = $this->getMock('Symfony\Component\Security\Http\HttpUtils');
        $this->logger = $this->getMock('Psr\Log\LoggerInterface');

        $this->session = $this->getMock('Symfony\Component\HttpFoundation\Session\SessionInterface');
        $this->request = $this->getMock('Symfony\Component\HttpFoundation\Request');
        $this->request->expects($this->any())->method('getSession')->will($this->returnValue($this->session));
        $this->exception = $this->getMock('Symfony\Component\Security\Core\Exception\AuthenticationException', array('getMessage'));
    }

    public function testForward()
    {
        $options = array('failure_forward' => true);

        $subRequest = $this->getRequest();
        $subRequest->attributes->expects($this->once())
            ->method('set')->with(Security::AUTHENTICATION_ERROR, $this->exception);
        $this->httpUtils->expects($this->once())
            ->method('createRequest')->with($this->request, '/login')
            ->will($this->returnValue($subRequest));

        $response = new Response();
        $this->httpKernel->expects($this->once())
            ->method('handle')->with($subRequest, HttpKernelInterface::SUB_REQUEST)
            ->will($this->returnValue($response));

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, $options, $this->logger);
        $result = $handler->onAuthenticationFailure($this->request, $this->exception);

        $this->assertSame($response, $result);
    }

    public function testRedirect()
    {
        $response = new Response();
        $this->httpUtils->expects($this->once())
            ->method('createRedirectResponse')->with($this->request, '/login')
            ->will($this->returnValue($response));

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, array(), $this->logger);
        $result = $handler->onAuthenticationFailure($this->request, $this->exception);

        $this->assertSame($response, $result);
    }

    public function testExceptionIsPersistedInSession()
    {
        $this->session->expects($this->once())
            ->method('set')->with(Security::AUTHENTICATION_ERROR, $this->exception);

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, array(), $this->logger);
        $handler->onAuthenticationFailure($this->request, $this->exception);
    }

    public function testExceptionIsPassedInRequestOnForward()
    {
        $options = array('failure_forward' => true);

        $subRequest = $this->getRequest();
        $subRequest->attributes->expects($this->once())
            ->method('set')->with(Security::AUTHENTICATION_ERROR, $this->exception);

        $this->httpUtils->expects($this->once())
            ->method('createRequest')->with($this->request, '/login')
            ->will($this->returnValue($subRequest));

        $this->session->expects($this->never())->method('set');

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, $options, $this->logger);
        $handler->onAuthenticationFailure($this->request, $this->exception);
    }

    public function testRedirectIsLogged()
    {
        $this->logger
            ->expects($this->once())
            ->method('debug')
            ->with('Authentication failure, redirect triggered.', array('failure_path' => '/login'));

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, array(), $this->logger);
        $handler->onAuthenticationFailure($this->request, $this->exception);
    }

    public function testForwardIsLogged()
    {
        $options = array('failure_forward' => true);

        $this->httpUtils->expects($this->once())
            ->method('createRequest')->with($this->request, '/login')
            ->will($this->returnValue($this->getRequest()));

        $this->logger
            ->expects($this->once())
            ->method('debug')
            ->with('Authentication failure, forward triggered.', array('failure_path' => '/login'));

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, $options, $this->logger);
        $handler->onAuthenticationFailure($this->request, $this->exception);
    }

    public function testFailurePathCanBeOverwritten()
    {
        $options = array('failure_path' => '/auth/login');

        $this->httpUtils->expects($this->once())
            ->method('createRedirectResponse')->with($this->request, '/auth/login');

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, $options, $this->logger);
        $handler->onAuthenticationFailure($this->request, $this->exception);
    }

    public function testFailurePathCanBeOverwrittenWithRequest()
    {
        $this->request->expects($this->once())
<<<<<<< HEAD
            ->method('get')->with('_failure_path', null, true)
=======
            ->method('get')->with('_failure_path')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->will($this->returnValue('/auth/login'));

        $this->httpUtils->expects($this->once())
            ->method('createRedirectResponse')->with($this->request, '/auth/login');

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, array(), $this->logger);
        $handler->onAuthenticationFailure($this->request, $this->exception);
    }

<<<<<<< HEAD
=======
    public function testFailurePathCanBeOverwrittenWithNestedAttributeInRequest()
    {
        $this->request->expects($this->once())
            ->method('get')->with('_failure_path')
            ->will($this->returnValue(array('value' => '/auth/login')));

        $this->httpUtils->expects($this->once())
            ->method('createRedirectResponse')->with($this->request, '/auth/login');

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, array('failure_path_parameter' => '_failure_path[value]'), $this->logger);
        $handler->onAuthenticationFailure($this->request, $this->exception);
    }

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function testFailurePathParameterCanBeOverwritten()
    {
        $options = array('failure_path_parameter' => '_my_failure_path');

        $this->request->expects($this->once())
<<<<<<< HEAD
            ->method('get')->with('_my_failure_path', null, true)
=======
            ->method('get')->with('_my_failure_path')
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ->will($this->returnValue('/auth/login'));

        $this->httpUtils->expects($this->once())
            ->method('createRedirectResponse')->with($this->request, '/auth/login');

        $handler = new DefaultAuthenticationFailureHandler($this->httpKernel, $this->httpUtils, $options, $this->logger);
        $handler->onAuthenticationFailure($this->request, $this->exception);
    }

    private function getRequest()
    {
        $request = $this->getMock('Symfony\Component\HttpFoundation\Request');
        $request->attributes = $this->getMock('Symfony\Component\HttpFoundation\ParameterBag');

        return $request;
    }
}
