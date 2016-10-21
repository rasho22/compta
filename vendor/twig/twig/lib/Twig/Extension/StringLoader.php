<?php

/*
 * This file is part of Twig.
 *
 * (c) 2012 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class Twig_Extension_StringLoader extends Twig_Extension
{
<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('template_from_string', 'twig_template_from_string', array('needs_environment' => true)),
        );
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     */
=======
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function getName()
    {
        return 'string_loader';
    }
}

/**
 * Loads a template from a string.
 *
 * <pre>
 * {{ include(template_from_string("Hello {{ name }}")) }}
 * </pre>
 *
 * @param Twig_Environment $env      A Twig_Environment instance
<<<<<<< HEAD
 * @param string           $template A template as a string
=======
 * @param string           $template A template as a string or object implementing __toString()
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
 *
 * @return Twig_Template A Twig_Template instance
 */
function twig_template_from_string(Twig_Environment $env, $template)
{
<<<<<<< HEAD
    return $env->createTemplate($template);
=======
    return $env->createTemplate((string) $template);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
