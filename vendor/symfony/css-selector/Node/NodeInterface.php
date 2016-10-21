<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Node;

/**
 * Interface for nodes.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
<<<<<<< HEAD
=======
 *
 * @internal
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
 */
interface NodeInterface
{
    /**
     * Returns node's name.
     *
     * @return string
     */
    public function getNodeName();

    /**
     * Returns node's specificity.
     *
     * @return Specificity
     */
    public function getSpecificity();

    /**
     * Returns node's string representation.
     *
     * @return string
     */
    public function __toString();
}
