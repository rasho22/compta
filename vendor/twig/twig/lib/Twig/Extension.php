<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
abstract class Twig_Extension implements Twig_ExtensionInterface
{
    /**
<<<<<<< HEAD
     * Initializes the runtime environment.
     *
     * This is where you can load some file that contains filter functions for instance.
     *
     * @param Twig_Environment $environment The current Twig_Environment instance
=======
     * {@inheritdoc}
     *
     * @deprecated since 1.23 (to be removed in 2.0), implement Twig_Extension_InitRuntimeInterface instead
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function initRuntime(Twig_Environment $environment)
    {
    }

    /**
<<<<<<< HEAD
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
=======
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getTokenParsers()
    {
        return array();
    }

    /**
<<<<<<< HEAD
     * Returns the node visitor instances to add to the existing list.
     *
     * @return Twig_NodeVisitorInterface[] An array of Twig_NodeVisitorInterface instances
=======
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getNodeVisitors()
    {
        return array();
    }

    /**
<<<<<<< HEAD
     * Returns a list of filters to add to the existing list.
     *
     * @return array An array of filters
=======
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getFilters()
    {
        return array();
    }

    /**
<<<<<<< HEAD
     * Returns a list of tests to add to the existing list.
     *
     * @return array An array of tests
=======
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getTests()
    {
        return array();
    }

    /**
<<<<<<< HEAD
     * Returns a list of functions to add to the existing list.
     *
     * @return array An array of functions
=======
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getFunctions()
    {
        return array();
    }

    /**
<<<<<<< HEAD
     * Returns a list of operators to add to the existing list.
     *
     * @return array An array of operators
=======
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getOperators()
    {
        return array();
    }

    /**
<<<<<<< HEAD
     * Returns a list of global variables to add to the existing list.
     *
     * @return array An array of global variables
=======
     * {@inheritdoc}
     *
     * @deprecated since 1.23 (to be removed in 2.0), implement Twig_Extension_GlobalsInterface instead
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getGlobals()
    {
        return array();
    }
<<<<<<< HEAD
=======

    /**
     * {@inheritdoc}
     *
     * @deprecated since 1.26 (to be removed in 2.0), not used anymore internally
     */
    public function getName()
    {
        return get_class($this);
    }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
