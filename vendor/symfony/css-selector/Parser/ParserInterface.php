<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Parser;

use Symfony\Component\CssSelector\Node\SelectorNode;

/**
 * CSS selector parser interface.
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
interface ParserInterface
{
    /**
     * Parses given selector source into an array of tokens.
     *
     * @param string $source
     *
     * @return SelectorNode[]
     */
    public function parse($source);
}
