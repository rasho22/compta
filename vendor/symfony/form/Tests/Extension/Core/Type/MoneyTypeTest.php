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

class MoneyTypeTest extends TestCase
{
    protected function setUp()
    {
        // we test against different locales, so we need the full
        // implementation
        IntlTestHelper::requireFullIntl($this);

        parent::setUp();
    }

<<<<<<< HEAD
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('money');

        $this->assertSame('money', $form->getConfig()->getType()->getName());
    }

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function testPassMoneyPatternToView()
    {
        \Locale::setDefault('de_DE');

<<<<<<< HEAD
        $form = $this->factory->create('money');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\MoneyType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();

        $this->assertSame('{{ widget }} €', $view->vars['money_pattern']);
    }

    public function testMoneyPatternWorksForYen()
    {
        \Locale::setDefault('en_US');

<<<<<<< HEAD
        $form = $this->factory->create('money', null, array('currency' => 'JPY'));
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\MoneyType', null, array('currency' => 'JPY'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();
        $this->assertTrue((bool) strstr($view->vars['money_pattern'], '¥'));
    }

    // https://github.com/symfony/symfony/issues/5458
    public function testPassDifferentPatternsForDifferentCurrencies()
    {
        \Locale::setDefault('de_DE');

<<<<<<< HEAD
        $form1 = $this->factory->create('money', null, array('currency' => 'GBP'));
        $form2 = $this->factory->create('money', null, array('currency' => 'EUR'));
=======
        $form1 = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\MoneyType', null, array('currency' => 'GBP'));
        $form2 = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\MoneyType', null, array('currency' => 'EUR'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view1 = $form1->createView();
        $view2 = $form2->createView();

        $this->assertSame('{{ widget }} £', $view1->vars['money_pattern']);
        $this->assertSame('{{ widget }} €', $view2->vars['money_pattern']);
    }
}
