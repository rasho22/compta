<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\Authentication\Token;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Authentication Token for "Remember-Me".
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
 */
class RememberMeToken extends AbstractToken
{
<<<<<<< HEAD
    private $key;
=======
    private $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    private $providerKey;

    /**
     * Constructor.
     *
     * @param UserInterface $user
     * @param string        $providerKey
<<<<<<< HEAD
     * @param string        $key
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(UserInterface $user, $providerKey, $key)
    {
        parent::__construct($user->getRoles());

        if (empty($key)) {
            throw new \InvalidArgumentException('$key must not be empty.');
=======
     * @param string        $secret      A secret used to make sure the token is created by the app and not by a malicious client
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(UserInterface $user, $providerKey, $secret)
    {
        parent::__construct($user->getRoles());

        if (empty($secret)) {
            throw new \InvalidArgumentException('$secret must not be empty.');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        }

        if (empty($providerKey)) {
            throw new \InvalidArgumentException('$providerKey must not be empty.');
        }

        $this->providerKey = $providerKey;
<<<<<<< HEAD
        $this->key = $key;
=======
        $this->secret = $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $this->setUser($user);
        parent::setAuthenticated(true);
    }

    /**
     * {@inheritdoc}
     */
    public function setAuthenticated($authenticated)
    {
        if ($authenticated) {
            throw new \LogicException('You cannot set this token to authenticated after creation.');
        }

        parent::setAuthenticated(false);
    }

    /**
<<<<<<< HEAD
     * Returns the provider key.
     *
     * @return string The provider key
=======
     * Returns the provider secret.
     *
     * @return string The provider secret
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getProviderKey()
    {
        return $this->providerKey;
    }

    /**
<<<<<<< HEAD
     * Returns the key.
     *
     * @return string The Key
     */
    public function getKey()
    {
        return $this->key;
=======
     * @deprecated Since version 2.8, to be removed in 3.0. Use getSecret() instead.
     */
    public function getKey()
    {
        @trigger_error(__method__.'() is deprecated since version 2.8 and will be removed in 3.0. Use getSecret() instead.', E_USER_DEPRECATED);

        return $this->getSecret();
    }

    /**
     * Returns the secret.
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    public function getCredentials()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize(array(
<<<<<<< HEAD
            $this->key,
=======
            $this->secret,
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            $this->providerKey,
            parent::serialize(),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
<<<<<<< HEAD
        list($this->key, $this->providerKey, $parentStr) = unserialize($serialized);
=======
        list($this->secret, $this->providerKey, $parentStr) = unserialize($serialized);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        parent::unserialize($parentStr);
    }
}
