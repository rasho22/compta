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

use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * AnonymousToken represents an anonymous token.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class AnonymousToken extends AbstractToken
{
<<<<<<< HEAD
    private $key;
=======
    private $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

    /**
     * Constructor.
     *
<<<<<<< HEAD
     * @param string          $key   The key shared with the authentication provider
     * @param string|object   $user  The user can be a UserInterface instance, or an object implementing a __toString method or the username as a regular string
     * @param RoleInterface[] $roles An array of roles
     */
    public function __construct($key, $user, array $roles = array())
    {
        parent::__construct($roles);

        $this->key = $key;
=======
     * @param string          $secret A secret used to make sure the token is created by the app and not by a malicious client
     * @param string|object   $user   The user can be a UserInterface instance, or an object implementing a __toString method or the username as a regular string
     * @param RoleInterface[] $roles  An array of roles
     */
    public function __construct($secret, $user, array $roles = array())
    {
        parent::__construct($roles);

        $this->secret = $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $this->setUser($user);
        $this->setAuthenticated(true);
    }

    /**
     * {@inheritdoc}
     */
    public function getCredentials()
    {
        return '';
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
    public function serialize()
    {
<<<<<<< HEAD
        return serialize(array($this->key, parent::serialize()));
=======
        return serialize(array($this->secret, parent::serialize()));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
<<<<<<< HEAD
        list($this->key, $parentStr) = unserialize($serialized);
=======
        list($this->secret, $parentStr) = unserialize($serialized);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        parent::unserialize($parentStr);
    }
}
