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

use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\RememberMeToken;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;

class RememberMeAuthenticationProvider implements AuthenticationProviderInterface
{
    private $userChecker;
<<<<<<< HEAD
    private $key;
=======
    private $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    private $providerKey;

    /**
     * Constructor.
     *
     * @param UserCheckerInterface $userChecker An UserCheckerInterface interface
<<<<<<< HEAD
     * @param string               $key         A key
     * @param string               $providerKey A provider key
     */
    public function __construct(UserCheckerInterface $userChecker, $key, $providerKey)
    {
        $this->userChecker = $userChecker;
        $this->key = $key;
=======
     * @param string               $secret      A secret
     * @param string               $providerKey A provider secret
     */
    public function __construct(UserCheckerInterface $userChecker, $secret, $providerKey)
    {
        $this->userChecker = $userChecker;
        $this->secret = $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $this->providerKey = $providerKey;
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
            throw new BadCredentialsException('The presented key does not match.');
=======
        if ($this->secret !== $token->getSecret()) {
            throw new BadCredentialsException('The presented secret does not match.');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        }

        $user = $token->getUser();
        $this->userChecker->checkPreAuth($user);

<<<<<<< HEAD
        $authenticatedToken = new RememberMeToken($user, $this->providerKey, $this->key);
=======
        $authenticatedToken = new RememberMeToken($user, $this->providerKey, $this->secret);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $authenticatedToken->setAttributes($token->getAttributes());

        return $authenticatedToken;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(TokenInterface $token)
    {
        return $token instanceof RememberMeToken && $token->getProviderKey() === $this->providerKey;
    }
}
