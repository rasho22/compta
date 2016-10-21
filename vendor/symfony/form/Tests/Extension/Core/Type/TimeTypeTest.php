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

use Symfony\Component\Form\ChoiceList\View\ChoiceView;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\Test\TypeTestCase as TestCase;

class TimeTypeTest extends TestCase
{
<<<<<<< HEAD
    public function testSubmitDateTime()
    {
        $form = $this->factory->create('time', null, array(
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('time');

        $this->assertSame('time', $form->getConfig()->getType()->getName());
    }

    public function testSubmitDateTime()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'datetime',
        ));

        $input = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->submit($input);

        $dateTime = new \DateTime('1970-01-01 03:04:00 UTC');

        $this->assertEquals($dateTime, $form->getData());
        $this->assertEquals($input, $form->getViewData());
    }

    public function testSubmitString()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'string',
        ));

        $input = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->submit($input);

        $this->assertEquals('03:04:00', $form->getData());
        $this->assertEquals($input, $form->getViewData());
    }

    public function testSubmitTimestamp()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'timestamp',
        ));

        $input = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->submit($input);

        $dateTime = new \DateTime('1970-01-01 03:04:00 UTC');

        $this->assertEquals($dateTime->format('U'), $form->getData());
        $this->assertEquals($input, $form->getViewData());
    }

    public function testSubmitArray()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'array',
        ));

        $input = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->submit($input);

        $this->assertEquals($input, $form->getData());
        $this->assertEquals($input, $form->getViewData());
    }

    public function testSubmitDatetimeSingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'datetime',
            'widget' => 'single_text',
        ));

        $form->submit('03:04');

        $this->assertEquals(new \DateTime('1970-01-01 03:04:00 UTC'), $form->getData());
        $this->assertEquals('03:04', $form->getViewData());
    }

    public function testSubmitDatetimeSingleTextWithoutMinutes()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'datetime',
            'widget' => 'single_text',
            'with_minutes' => false,
        ));

        $form->submit('03');

        $this->assertEquals(new \DateTime('1970-01-01 03:00:00 UTC'), $form->getData());
        $this->assertEquals('03', $form->getViewData());
    }

    public function testSubmitArraySingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'array',
            'widget' => 'single_text',
        ));

        $data = array(
            'hour' => '3',
            'minute' => '4',
        );

        $form->submit('03:04');

        $this->assertEquals($data, $form->getData());
        $this->assertEquals('03:04', $form->getViewData());
    }

    public function testSubmitArraySingleTextWithoutMinutes()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'array',
            'widget' => 'single_text',
            'with_minutes' => false,
        ));

        $data = array(
            'hour' => '3',
        );

        $form->submit('03');

        $this->assertEquals($data, $form->getData());
        $this->assertEquals('03', $form->getViewData());
    }

    public function testSubmitArraySingleTextWithSeconds()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'array',
            'widget' => 'single_text',
            'with_seconds' => true,
        ));

        $data = array(
            'hour' => '3',
            'minute' => '4',
            'second' => '5',
        );

        $form->submit('03:04:05');

        $this->assertEquals($data, $form->getData());
        $this->assertEquals('03:04:05', $form->getViewData());
    }

    public function testSubmitStringSingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'string',
            'widget' => 'single_text',
        ));

        $form->submit('03:04');

        $this->assertEquals('03:04:00', $form->getData());
        $this->assertEquals('03:04', $form->getViewData());
    }

    public function testSubmitStringSingleTextWithoutMinutes()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'string',
            'widget' => 'single_text',
            'with_minutes' => false,
        ));

        $form->submit('03');

        $this->assertEquals('03:00:00', $form->getData());
        $this->assertEquals('03', $form->getViewData());
    }

    public function testSetDataWithoutMinutes()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'datetime',
            'with_minutes' => false,
        ));

        $form->setData(new \DateTime('03:04:05 UTC'));

        $this->assertEquals(array('hour' => 3), $form->getViewData());
    }

    public function testSetDataWithSeconds()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'datetime',
            'with_seconds' => true,
        ));

        $form->setData(new \DateTime('03:04:05 UTC'));

        $this->assertEquals(array('hour' => 3, 'minute' => 4, 'second' => 5), $form->getViewData());
    }

    public function testSetDataDifferentTimezones()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'America/New_York',
            'view_timezone' => 'Asia/Hong_Kong',
            'input' => 'string',
            'with_seconds' => true,
        ));

        $dateTime = new \DateTime('2013-01-01 12:04:05');
        $dateTime->setTimezone(new \DateTimeZone('America/New_York'));

        $form->setData($dateTime->format('H:i:s'));

        $outputTime = clone $dateTime;
        $outputTime->setTimezone(new \DateTimeZone('Asia/Hong_Kong'));

        $displayedData = array(
            'hour' => (int) $outputTime->format('H'),
            'minute' => (int) $outputTime->format('i'),
            'second' => (int) $outputTime->format('s'),
        );

        $this->assertEquals($displayedData, $form->getViewData());
    }

    public function testSetDataDifferentTimezonesDateTime()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'America/New_York',
            'view_timezone' => 'Asia/Hong_Kong',
            'input' => 'datetime',
            'with_seconds' => true,
        ));

        $dateTime = new \DateTime('12:04:05');
        $dateTime->setTimezone(new \DateTimeZone('America/New_York'));

        $form->setData($dateTime);

        $outputTime = clone $dateTime;
        $outputTime->setTimezone(new \DateTimeZone('Asia/Hong_Kong'));

        $displayedData = array(
            'hour' => (int) $outputTime->format('H'),
            'minute' => (int) $outputTime->format('i'),
            'second' => (int) $outputTime->format('s'),
        );

        $this->assertDateTimeEquals($dateTime, $form->getData());
        $this->assertEquals($displayedData, $form->getViewData());
    }

    public function testHoursOption()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'hours' => array(6, 7),
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView('6', '6', '06'),
            new ChoiceView('7', '7', '07'),
        ), $view['hour']->vars['choices']);
    }

    public function testIsMinuteWithinRangeReturnsTrueIfWithin()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'minutes' => array(6, 7),
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView('6', '6', '06'),
            new ChoiceView('7', '7', '07'),
        ), $view['minute']->vars['choices']);
    }

    public function testIsSecondWithinRangeReturnsTrueIfWithin()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'seconds' => array(6, 7),
            'with_seconds' => true,
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView('6', '6', '06'),
            new ChoiceView('7', '7', '07'),
        ), $view['second']->vars['choices']);
    }

    public function testIsPartiallyFilledReturnsFalseIfCompletelyEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'choice',
        ));

        $form->submit(array(
            'hour' => '',
            'minute' => '',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsFalseIfCompletelyEmptyWithSeconds()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->submit(array(
            'hour' => '',
            'minute' => '',
            'second' => '',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsFalseIfCompletelyFilled()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'choice',
        ));

        $form->submit(array(
            'hour' => '0',
            'minute' => '0',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsFalseIfCompletelyFilledWithSeconds()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->submit(array(
            'hour' => '0',
            'minute' => '0',
            'second' => '0',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsTrueIfChoiceAndHourEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->submit(array(
            'hour' => '',
            'minute' => '0',
            'second' => '0',
        ));

        $this->assertTrue($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsTrueIfChoiceAndMinuteEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->submit(array(
            'hour' => '0',
            'minute' => '',
            'second' => '0',
        ));

        $this->assertTrue($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsTrueIfChoiceAndSecondsEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'choice',
            'with_seconds' => true,
        ));

        $form->submit(array(
            'hour' => '0',
            'minute' => '0',
            'second' => '',
        ));

        $this->assertTrue($form->isPartiallyFilled());
    }

    public function testInitializeWithDateTime()
    {
        // Throws an exception if "data_class" option is not explicitly set
        // to null in the type
<<<<<<< HEAD
        $this->factory->create('time', new \DateTime());
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', new \DateTime());
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function testSingleTextWidgetShouldUseTheRightInputType()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
        ));

        $view = $form->createView();
        $this->assertEquals('time', $view->vars['type']);
    }

    public function testSingleTextWidgetWithSecondsShouldHaveRightStepAttribute()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertArrayHasKey('step', $view->vars['attr']);
        $this->assertEquals(1, $view->vars['attr']['step']);
    }

    public function testSingleTextWidgetWithSecondsShouldNotOverrideStepAttribute()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
            'with_seconds' => true,
            'attr' => array(
                'step' => 30,
            ),
        ));

        $view = $form->createView();
        $this->assertArrayHasKey('step', $view->vars['attr']);
        $this->assertEquals(30, $view->vars['attr']['step']);
    }

    public function testDontPassHtml5TypeIfHtml5NotAllowed()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
            'html5' => false,
        ));

        $view = $form->createView();
        $this->assertFalse(isset($view->vars['type']));
    }

    public function testPassDefaultPlaceholderToViewIfNotRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => false,
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('', $view['hour']->vars['placeholder']);
        $this->assertSame('', $view['minute']->vars['placeholder']);
        $this->assertSame('', $view['second']->vars['placeholder']);
    }

    public function testPassNoPlaceholderToViewIfRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => true,
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertNull($view['hour']->vars['placeholder']);
        $this->assertNull($view['minute']->vars['placeholder']);
        $this->assertNull($view['second']->vars['placeholder']);
    }

    public function testPassPlaceholderAsString()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'placeholder' => 'Empty',
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty', $view['hour']->vars['placeholder']);
        $this->assertSame('Empty', $view['minute']->vars['placeholder']);
        $this->assertSame('Empty', $view['second']->vars['placeholder']);
    }

    /**
     * @group legacy
     */
    public function testPassEmptyValueBC()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'empty_value' => 'Empty',
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty', $view['hour']->vars['placeholder']);
        $this->assertSame('Empty', $view['minute']->vars['placeholder']);
        $this->assertSame('Empty', $view['second']->vars['placeholder']);
        $this->assertSame('Empty', $view['hour']->vars['empty_value']);
        $this->assertSame('Empty', $view['minute']->vars['empty_value']);
        $this->assertSame('Empty', $view['second']->vars['empty_value']);
    }

    public function testPassPlaceholderAsArray()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'placeholder' => array(
                'hour' => 'Empty hour',
                'minute' => 'Empty minute',
                'second' => 'Empty second',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty hour', $view['hour']->vars['placeholder']);
        $this->assertSame('Empty minute', $view['minute']->vars['placeholder']);
        $this->assertSame('Empty second', $view['second']->vars['placeholder']);
    }

    public function testPassPlaceholderAsPartialArrayAddEmptyIfNotRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => false,
            'placeholder' => array(
                'hour' => 'Empty hour',
                'second' => 'Empty second',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty hour', $view['hour']->vars['placeholder']);
        $this->assertSame('', $view['minute']->vars['placeholder']);
        $this->assertSame('Empty second', $view['second']->vars['placeholder']);
    }

    public function testPassPlaceholderAsPartialArrayAddNullIfRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => true,
            'placeholder' => array(
                'hour' => 'Empty hour',
                'second' => 'Empty second',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty hour', $view['hour']->vars['placeholder']);
        $this->assertNull($view['minute']->vars['placeholder']);
        $this->assertSame('Empty second', $view['second']->vars['placeholder']);
    }

    public function provideCompoundWidgets()
    {
        return array(
            array('text'),
            array('choice'),
        );
    }

    /**
     * @dataProvider provideCompoundWidgets
     */
    public function testHourErrorsBubbleUp($widget)
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => $widget,
        ));
        $form['hour']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['hour']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }

    /**
     * @dataProvider provideCompoundWidgets
     */
    public function testMinuteErrorsBubbleUp($widget)
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => $widget,
        ));
        $form['minute']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['minute']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }

    /**
     * @dataProvider provideCompoundWidgets
     */
    public function testSecondErrorsBubbleUp($widget)
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('time', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => $widget,
            'with_seconds' => true,
        ));
        $form['second']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['second']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }

    /**
     * @expectedException \Symfony\Component\Form\Exception\InvalidConfigurationException
     */
    public function testInitializeWithSecondsAndWithoutMinutes()
    {
<<<<<<< HEAD
        $this->factory->create('time', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'with_minutes' => false,
            'with_seconds' => true,
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfHoursIsInvalid()
    {
<<<<<<< HEAD
        $this->factory->create('time', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'hours' => 'bad value',
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfMinutesIsInvalid()
    {
<<<<<<< HEAD
        $this->factory->create('time', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'minutes' => 'bad value',
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfSecondsIsInvalid()
    {
<<<<<<< HEAD
        $this->factory->create('time', null, array(
            'seconds' => 'bad value',
        ));
    }
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
            'seconds' => 'bad value',
        ));
    }

    public function testPassDefaultChoiceTranslationDomain()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType');

        $view = $form->createView();
        $this->assertFalse($view['hour']->vars['choice_translation_domain']);
        $this->assertFalse($view['minute']->vars['choice_translation_domain']);
    }

    public function testPassChoiceTranslationDomainAsString()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
            'choice_translation_domain' => 'messages',
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('messages', $view['hour']->vars['choice_translation_domain']);
        $this->assertSame('messages', $view['minute']->vars['choice_translation_domain']);
        $this->assertSame('messages', $view['second']->vars['choice_translation_domain']);
    }

    public function testPassChoiceTranslationDomainAsArray()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\TimeType', null, array(
            'choice_translation_domain' => array(
                'hour' => 'foo',
                'second' => 'test',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('foo', $view['hour']->vars['choice_translation_domain']);
        $this->assertFalse($view['minute']->vars['choice_translation_domain']);
        $this->assertSame('test', $view['second']->vars['choice_translation_domain']);
    }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
