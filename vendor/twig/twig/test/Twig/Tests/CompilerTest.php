<?php

/*
 * This file is part of Twig.
 *
 * (c) Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Twig_Tests_CompilerTest extends PHPUnit_Framework_TestCase
{
    public function testReprNumericValueWithLocale()
    {
<<<<<<< HEAD
        $compiler = new Twig_Compiler(new Twig_Environment($this->getMock('Twig_LoaderInterface')));
=======
        $compiler = new Twig_Compiler(new Twig_Environment($this->getMockBuilder('Twig_LoaderInterface')->getMock()));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $locale = setlocale(LC_NUMERIC, 0);
        if (false === $locale) {
            $this->markTestSkipped('Your platform does not support locales.');
        }

        $required_locales = array('fr_FR.UTF-8', 'fr_FR.UTF8', 'fr_FR.utf-8', 'fr_FR.utf8', 'French_France.1252');
        if (false === setlocale(LC_NUMERIC, $required_locales)) {
            $this->markTestSkipped('Could not set any of required locales: '.implode(', ', $required_locales));
        }

        $this->assertEquals('1.2', $compiler->repr(1.2)->getSource());
        $this->assertContains('fr', strtolower(setlocale(LC_NUMERIC, 0)));

        setlocale(LC_NUMERIC, $locale);
    }
}
