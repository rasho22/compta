<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Tests\Authentication\Provider;

use Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider;

class AnonymousAuthenticationProviderTest extends \PHPUnit_Framework_TestCase
{
    public function testSupports()
    {
        $provider = $this->getProvider('foo');

        $this->assertTrue($provider->supports($this->getSupportedToken('foo')));
        $this->assertFalse($provider->supports($this->getMock('Symfony\Component\Security\Core\Authentication\Token\TokenInterface')));
    }

    public function testAuthenticateWhenTokenIsNotSupported()
    {
        $provider = $this->getProvider('foo');

        $this->assertNull($provider->authenticate($this->getMock('Symfony\Component\Security\Core\Authentication\Token\TokenInterface')));
    }

    /**
     * @expectedException \Symfony\Component\Security\Core\Exception\BadCredentialsException
     */
<<<<<<< HEAD
    public function testAuthenticateWhenKeyIsNotValid()
    {
        $provider = $this->getProvider('foo');

        $this->assertNull($provider->authenticate($this->getSupportedToken('bar')));
=======
    public function testAuthenticateWhenSecretIsNotValid()
    {
        $provider = $this->getProvider('foo');

        $provider->authenticate($this->getSupportedToken('bar'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function testAuthenticate()
    {
        $provider = $this->getProvider('foo');
        $token = $this->getSupportedToken('foo');

        $this->assertSame($token, $provider->authenticate($token));
    }

<<<<<<< HEAD
    protected function getSupportedToken($key)
    {
        $token = $this->getMock('Symfony\Component\Security\Core\Authentication\Token\AnonymousToken', array('getKey'), array(), '', false);
        $token->expects($this->any())
              ->method('getKey')
              ->will($this->returnValue($key))
=======
    protected function getSupportedToken($secret)
    {
        $token = $this->getMock('Symfony\Component\Security\Core\Authentication\Token\AnonymousToken', array('getSecret'), array(), '', false);
        $token->expects($this->any())
              ->method('getSecret')
              ->will($this->returnValue($secret))
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ;

        return $token;
    }

<<<<<<< HEAD
    protected function getProvider($key)
    {
        return new AnonymousAuthenticationProvider($key);
=======
    protected function getProvider($secret)
    {
        return new AnonymousAuthenticationProvider($secret);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
