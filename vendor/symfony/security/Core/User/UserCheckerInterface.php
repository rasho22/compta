<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Core\User;

<<<<<<< HEAD
/**
 * UserCheckerInterface checks user account when authentication occurs.
 *
 * This should not be used to make authentication decisions.
=======
use Symfony\Component\Security\Core\Exception\AccountStatusException;

/**
 * Implement to throw AccountStatusException during the authentication process.
 *
 * Can be used when you want to check the account status, e.g when the account is
 * disabled or blocked. This should not be used to make authentication decisions.
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface UserCheckerInterface
{
    /**
     * Checks the user account before authentication.
     *
     * @param UserInterface $user a UserInterface instance
<<<<<<< HEAD
=======
     *
     * @throws AccountStatusException
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function checkPreAuth(UserInterface $user);

    /**
     * Checks the user account after authentication.
     *
     * @param UserInterface $user a UserInterface instance
<<<<<<< HEAD
=======
     *
     * @throws AccountStatusException
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function checkPostAuth(UserInterface $user);
}
