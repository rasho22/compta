<?php

/*
 * This file is part of Twig.
 *
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Interface implemented by extension classes.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface Twig_ExtensionInterface
{
    /**
     * Initializes the runtime environment.
     *
     * This is where you can load some file that contains filter functions for instance.
     *
     * @param Twig_Environment $environment The current Twig_Environment instance
<<<<<<< HEAD
=======
     *
     * @deprecated since 1.23 (to be removed in 2.0), implement Twig_Extension_InitRuntimeInterface instead
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function initRuntime(Twig_Environment $environment);

    /**
     * Returns the token parser instances to add to the existing list.
     *
<<<<<<< HEAD
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
=======
     * @return Twig_TokenParserInterface[]
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getTokenParsers();

    /**
     * Returns the node visitor instances to add to the existing list.
     *
     * @return Twig_NodeVisitorInterface[] An array of Twig_NodeVisitorInterface instances
     */
    public function getNodeVisitors();

    /**
     * Returns a list of filters to add to the existing list.
     *
<<<<<<< HEAD
     * @return array An array of filters
=======
     * @return Twig_SimpleFilter[]
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getFilters();

    /**
     * Returns a list of tests to add to the existing list.
     *
<<<<<<< HEAD
     * @return array An array of tests
=======
     * @return Twig_SimpleTest[]
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getTests();

    /**
     * Returns a list of functions to add to the existing list.
     *
<<<<<<< HEAD
     * @return array An array of functions
=======
     * @return Twig_SimpleFunction[]
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getFunctions();

    /**
     * Returns a list of operators to add to the existing list.
     *
     * @return array An array of operators
     */
    public function getOperators();

    /**
     * Returns a list of global variables to add to the existing list.
     *
     * @return array An array of global variables
<<<<<<< HEAD
=======
     *
     * @deprecated since 1.23 (to be removed in 2.0), implement Twig_Extension_GlobalsInterface instead
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getGlobals();

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
<<<<<<< HEAD
=======
     *
     * @deprecated since 1.26 (to be removed in 2.0), not used anymore internally
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getName();
}
