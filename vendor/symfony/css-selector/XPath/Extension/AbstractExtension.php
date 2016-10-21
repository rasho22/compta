<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\XPath\Extension;

/**
 * XPath expression translator abstract extension.
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
abstract class AbstractExtension implements ExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function getNodeTranslators()
    {
        return array();
    }

    /**
     * {@inheritdoc}
     */
    public function getCombinationTranslators()
    {
        return array();
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctionTranslators()
    {
        return array();
    }

    /**
     * {@inheritdoc}
     */
    public function getPseudoClassTranslators()
    {
        return array();
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributeMatchingTranslators()
    {
        return array();
    }
}
