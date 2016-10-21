<?php

/*
 * This file is part of Twig.
 *
 * (c) 2010 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
class Twig_Extensions_Extension_I18n extends Twig_Extension
{
    /**
     * Returns the token parser instances to add to the existing list.
     *
     * @return array An array of Twig_TokenParserInterface or Twig_TokenParserBrokerInterface instances
=======

class Twig_Extensions_Extension_I18n extends Twig_Extension
{
    /**
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getTokenParsers()
    {
        return array(new Twig_Extensions_TokenParser_Trans());
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
        return array(
             new Twig_SimpleFilter('trans', 'gettext'),
        );
    }

    /**
<<<<<<< HEAD
     * Returns the name of the extension.
     *
     * @return string The extension name
=======
     * {@inheritdoc}
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     */
    public function getName()
    {
        return 'i18n';
    }
}
