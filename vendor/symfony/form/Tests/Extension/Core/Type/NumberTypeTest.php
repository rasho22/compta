<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Extension\Core\Type;

use Symfony\Component\Form\Test\TypeTestCase as TestCase;
use Symfony\Component\Intl\Util\IntlTestHelper;

class NumberTypeTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        // we test against "de_DE", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_DE');
    }

<<<<<<< HEAD
    public function testDefaultFormatting()
    {
        $form = $this->factory->create('number');
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('number');

        $this->assertSame('number', $form->getConfig()->getType()->getName());
    }

    public function testDefaultFormatting()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\NumberType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->setData('12345.67890');
        $view = $form->createView();

        $this->assertSame('12345,679', $view->vars['value']);
    }

    public function testDefaultFormattingWithGrouping()
    {
<<<<<<< HEAD
        $form = $this->factory->create('number', null, array('grouping' => true));
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\NumberType', null, array('grouping' => true));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->setData('12345.67890');
        $view = $form->createView();

        $this->assertSame('12.345,679', $view->vars['value']);
    }

    public function testDefaultFormattingWithScale()
    {
<<<<<<< HEAD
        $form = $this->factory->create('number', null, array('scale' => 2));
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\NumberType', null, array('scale' => 2));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->setData('12345.67890');
        $view = $form->createView();

        $this->assertSame('12345,68', $view->vars['value']);
    }

    public function testDefaultFormattingWithRounding()
    {
<<<<<<< HEAD
        $form = $this->factory->create('number', null, array('scale' => 0, 'rounding_mode' => \NumberFormatter::ROUND_UP));
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\NumberType', null, array('scale' => 0, 'rounding_mode' => \NumberFormatter::ROUND_UP));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $form->setData('12345.54321');
        $view = $form->createView();

        $this->assertSame('12346', $view->vars['value']);
    }
}
