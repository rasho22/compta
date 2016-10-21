<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Http\EntryPoint;

use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\NonceExpiredException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;

/**
 * DigestAuthenticationEntryPoint starts an HTTP Digest authentication.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DigestAuthenticationEntryPoint implements AuthenticationEntryPointInterface
{
<<<<<<< HEAD
    private $key;
=======
    private $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    private $realmName;
    private $nonceValiditySeconds;
    private $logger;

<<<<<<< HEAD
    public function __construct($realmName, $key, $nonceValiditySeconds = 300, LoggerInterface $logger = null)
    {
        $this->realmName = $realmName;
        $this->key = $key;
=======
    public function __construct($realmName, $secret, $nonceValiditySeconds = 300, LoggerInterface $logger = null)
    {
        $this->realmName = $realmName;
        $this->secret = $secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $this->nonceValiditySeconds = $nonceValiditySeconds;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $expiryTime = microtime(true) + $this->nonceValiditySeconds * 1000;
<<<<<<< HEAD
        $signatureValue = md5($expiryTime.':'.$this->key);
=======
        $signatureValue = md5($expiryTime.':'.$this->secret);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $nonceValue = $expiryTime.':'.$signatureValue;
        $nonceValueBase64 = base64_encode($nonceValue);

        $authenticateHeader = sprintf('Digest realm="%s", qop="auth", nonce="%s"', $this->realmName, $nonceValueBase64);

        if ($authException instanceof NonceExpiredException) {
            $authenticateHeader .= ', stale="true"';
        }

        if (null !== $this->logger) {
            $this->logger->debug('WWW-Authenticate header sent.', array('header' => $authenticateHeader));
        }

        $response = new Response();
        $response->headers->set('WWW-Authenticate', $authenticateHeader);
        $response->setStatusCode(401);

        return $response;
    }

    /**
<<<<<<< HEAD
     * @return string
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
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * @return string
     */
    public function getRealmName()
    {
        return $this->realmName;
    }
}
