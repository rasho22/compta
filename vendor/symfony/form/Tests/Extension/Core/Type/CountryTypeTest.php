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
use Symfony\Component\Form\ChoiceList\View\ChoiceView;
use Symfony\Component\Intl\Util\IntlTestHelper;

class CountryTypeTest extends TestCase
{
    protected function setUp()
    {
        IntlTestHelper::requireIntl($this);

        parent::setUp();
    }

<<<<<<< HEAD
    public function testCountriesAreSelectable()
    {
        $form = $this->factory->create('country');
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('country');

        $this->assertSame('country', $form->getConfig()->getType()->getName());
    }

    public function testCountriesAreSelectable()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CountryType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();
        $choices = $view->vars['choices'];

        // Don't check objects for identity
        $this->assertContains(new ChoiceView('DE', 'DE', 'Germany'), $choices, '', false, false);
        $this->assertContains(new ChoiceView('GB', 'GB', 'United Kingdom'), $choices, '', false, false);
        $this->assertContains(new ChoiceView('US', 'US', 'United States'), $choices, '', false, false);
        $this->assertContains(new ChoiceView('FR', 'FR', 'France'), $choices, '', false, false);
        $this->assertContains(new ChoiceView('MY', 'MY', 'Malaysia'), $choices, '', false, false);
    }

    public function testUnknownCountryIsNotIncluded()
    {
<<<<<<< HEAD
        $form = $this->factory->create('country', 'country');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\CountryType', 'Symfony\Component\Form\Extension\Core\Type\CountryType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();
        $choices = $view->vars['choices'];

        foreach ($choices as $choice) {
            if ('ZZ' === $choice->value) {
                $this->fail('Should not contain choice "ZZ"');
            }
        }
    }
}
