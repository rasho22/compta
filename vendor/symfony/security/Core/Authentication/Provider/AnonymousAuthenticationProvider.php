<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Authentication\Provider;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;

/**
 * AnonymousAuthenticationProvider validates AnonymousToken instances.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class AnonymousAuthenticationProvider implements AuthenticationProviderInterface
{
<<<<<<< HEAD
    private $key;
=======
    /**
     * Used to determine if the token is created by the application
     * instead of a malicious client.
     *
     * @var string
     */
    private $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param string $key The key shared with the authentication token
     */
    public function __construct($key)
    {
        $this->key = $key;
=======
     * @param string $secret The secret shared with the AnonymousToken
     */
    public function __construct($secret)
    {
        $this->secret = $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    public function authenticate(TokenInterface $token)
    {
        if (!$this->supports($token)) {
            return;
        }

<<<<<<< HEAD
        if ($this->key !== $token->getKey()) {
=======
        if ($this->secret !== $token->getSecret()) {
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            throw new BadCredentialsException('The Token does not contain the expected key.');
        }

        return $token;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(TokenInterface $token)
    {
        return $token instanceof AnonymousToken;
    }
}
