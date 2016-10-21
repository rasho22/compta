<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Security\Csrf\TokenGenerator;

use Symfony\Component\Security\Core\Util\SecureRandomInterface;
<<<<<<< HEAD
use Symfony\Component\Security\Core\Util\SecureRandom;
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

/**
 * Generates CSRF tokens.
 *
 * @author Bernhard Schussek <bernhard.schussek@symfony.com>
 */
class UriSafeTokenGenerator implements TokenGeneratorInterface
{
    /**
<<<<<<< HEAD
     * The generator for random values.
     *
     * @var SecureRandomInterface
     */
    private $random;

    /**
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     * The amount of entropy collected for each token (in bits).
     *
     * @var int
     */
    private $entropy;

    /**
     * Generates URI-safe CSRF tokens.
     *
<<<<<<< HEAD
     * @param SecureRandomInterface|null $random  The random value generator used for
     *                                            generating entropy
     * @param int                        $entropy The amount of entropy collected for
     *                                            each token (in bits)
     */
    public function __construct(SecureRandomInterface $random = null, $entropy = 256)
    {
        $this->random = $random ?: new SecureRandom();
        $this->entropy = $entropy;
=======
     * @param int $entropy The amount of entropy collected for each token (in bits)
     */
    public function __construct($entropy = 256)
    {
        if ($entropy instanceof SecureRandomInterface || func_num_args() === 2) {
            @trigger_error('The '.__METHOD__.' method now requires the entropy to be given as the first argument. The SecureRandomInterface will be removed in 3.0.', E_USER_DEPRECATED);

            $this->entropy = func_num_args() === 2 ? func_get_arg(1) : 256;
        } else {
            $this->entropy = $entropy;
        }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * {@inheritdoc}
     */
    public function generateToken()
    {
        // Generate an URI safe base64 encoded string that does not contain "+",
        // "/" or "=" which need to be URL encoded and make URLs unnecessarily
        // longer.
<<<<<<< HEAD
        $bytes = $this->random->nextBytes($this->entropy / 8);
=======
        $bytes = random_bytes($this->entropy / 8);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        return rtrim(strtr(base64_encode($bytes), '+/', '-_'), '=');
    }
}
