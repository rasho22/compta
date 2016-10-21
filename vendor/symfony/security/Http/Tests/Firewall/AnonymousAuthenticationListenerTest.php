<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Http\Tests\Firewall;

use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener;

class AnonymousAuthenticationListenerTest extends \PHPUnit_Framework_TestCase
{
    public function testHandleWithTokenStorageHavingAToken()
    {
        $tokenStorage = $this->getMock('Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface');
        $tokenStorage
            ->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue($this->getMock('Symfony\Component\Security\Core\Authentication\Token\TokenInterface')))
        ;
        $tokenStorage
            ->expects($this->never())
            ->method('setToken')
        ;

        $authenticationManager = $this->getMock('Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface');
        $authenticationManager
            ->expects($this->never())
            ->method('authenticate')
        ;

<<<<<<< HEAD
        $listener = new AnonymousAuthenticationListener($tokenStorage, 'TheKey', null, $authenticationManager);
=======
        $listener = new AnonymousAuthenticationListener($tokenStorage, 'TheSecret', null, $authenticationManager);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $listener->handle($this->getMock('Symfony\Component\HttpKernel\Event\GetResponseEvent', array(), array(), '', false));
    }

    public function testHandleWithTokenStorageHavingNoToken()
    {
        $tokenStorage = $this->getMock('Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface');
        $tokenStorage
            ->expects($this->any())
            ->method('getToken')
            ->will($this->returnValue(null))
        ;

<<<<<<< HEAD
        $anonymousToken = new AnonymousToken('TheKey', 'anon.', array());
=======
        $anonymousToken = new AnonymousToken('TheSecret', 'anon.', array());
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $authenticationManager = $this->getMock('Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface');
        $authenticationManager
            ->expects($this->once())
            ->method('authenticate')
            ->with($this->callback(function ($token) {
<<<<<<< HEAD
                return 'TheKey' === $token->getKey();
=======
                return 'TheSecret' === $token->getSecret();
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            }))
            ->will($this->returnValue($anonymousToken))
        ;

        $tokenStorage
            ->expects($this->once())
            ->method('setToken')
            ->with($anonymousToken)
        ;

<<<<<<< HEAD
        $listener = new AnonymousAuthenticationListener($tokenStorage, 'TheKey', null, $authenticationManager);
=======
        $listener = new AnonymousAuthenticationListener($tokenStorage, 'TheSecret', null, $authenticationManager);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $listener->handle($this->getMock('Symfony\Component\HttpKernel\Event\GetResponseEvent', array(), array(), '', false));
    }

    public function testHandledEventIsLogged()
    {
        $tokenStorage = $this->getMock('Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface');
        $logger = $this->getMock('Psr\Log\LoggerInterface');
        $logger->expects($this->once())
            ->method('info')
            ->with('Populated the TokenStorage with an anonymous Token.')
        ;

        $authenticationManager = $this->getMock('Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface');

<<<<<<< HEAD
        $listener = new AnonymousAuthenticationListener($tokenStorage, 'TheKey', $logger, $authenticationManager);
=======
        $listener = new AnonymousAuthenticationListener($tokenStorage, 'TheSecret', $logger, $authenticationManager);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $listener->handle($this->getMock('Symfony\Component\HttpKernel\Event\GetResponseEvent', array(), array(), '', false));
    }
}
