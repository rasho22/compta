<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\Twig\Extension;

use Symfony\Component\Security\Acl\Voter\FieldVote;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
<<<<<<< HEAD
=======
use Symfony\Component\Security\Core\Exception\AuthenticationCredentialsNotFoundException;
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

/**
 * SecurityExtension exposes security context features.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class SecurityExtension extends \Twig_Extension
{
    private $securityChecker;

    public function __construct(AuthorizationCheckerInterface $securityChecker = null)
    {
        $this->securityChecker = $securityChecker;
    }

    public function isGranted($role, $object = null, $field = null)
    {
        if (null === $this->securityChecker) {
            return false;
        }

        if (null !== $field) {
            $object = new FieldVote($object, $field);
        }

<<<<<<< HEAD
        return $this->securityChecker->isGranted($role, $object);
=======
        try {
            return $this->securityChecker->isGranted($role, $object);
        } catch (AuthenticationCredentialsNotFoundException $e) {
            return false;
        }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('is_granted', array($this, 'isGranted')),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'security';
    }
}
