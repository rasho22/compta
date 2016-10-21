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
use Symfony\Component\Intl\Util\IntlTestHelper;

class DateTypeTest extends TestCase
{
    private $defaultTimezone;

    protected function setUp()
    {
        parent::setUp();
        $this->defaultTimezone = date_default_timezone_get();
    }

    protected function tearDown()
    {
        date_default_timezone_set($this->defaultTimezone);
        \Locale::setDefault('en');
    }

    /**
<<<<<<< HEAD
=======
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('date');

        $this->assertSame('date', $form->getConfig()->getType()->getName());
    }

    /**
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testInvalidWidgetOption()
    {
<<<<<<< HEAD
        $this->factory->create('date', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'fake_widget',
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testInvalidInputOption()
    {
<<<<<<< HEAD
        $this->factory->create('date', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'input' => 'fake_input',
        ));
    }

    public function testSubmitFromSingleTextDateTimeWithDefaultFormat()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'single_text',
            'input' => 'datetime',
        ));

        $form->submit('2010-06-02');

        $this->assertDateTimeEquals(new \DateTime('2010-06-02 UTC'), $form->getData());
        $this->assertEquals('2010-06-02', $form->getViewData());
    }

    public function testSubmitFromSingleTextDateTime()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => \IntlDateFormatter::MEDIUM,
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'single_text',
            'input' => 'datetime',
        ));

        $form->submit('2.6.2010');

        $this->assertDateTimeEquals(new \DateTime('2010-06-02 UTC'), $form->getData());
        $this->assertEquals('02.06.2010', $form->getViewData());
    }

    public function testSubmitFromSingleTextString()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => \IntlDateFormatter::MEDIUM,
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'single_text',
            'input' => 'string',
        ));

        $form->submit('2.6.2010');

        $this->assertEquals('2010-06-02', $form->getData());
        $this->assertEquals('02.06.2010', $form->getViewData());
    }

    public function testSubmitFromSingleTextTimestamp()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => \IntlDateFormatter::MEDIUM,
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'single_text',
            'input' => 'timestamp',
        ));

        $form->submit('2.6.2010');

        $dateTime = new \DateTime('2010-06-02 UTC');

        $this->assertEquals($dateTime->format('U'), $form->getData());
        $this->assertEquals('02.06.2010', $form->getViewData());
    }

    public function testSubmitFromSingleTextRaw()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => \IntlDateFormatter::MEDIUM,
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'single_text',
            'input' => 'array',
        ));

        $form->submit('2.6.2010');

        $output = array(
            'day' => '2',
            'month' => '6',
            'year' => '2010',
        );

        $this->assertEquals($output, $form->getData());
        $this->assertEquals('02.06.2010', $form->getViewData());
    }

    public function testSubmitFromText()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'text',
        ));

        $text = array(
            'day' => '2',
            'month' => '6',
            'year' => '2010',
        );

        $form->submit($text);

        $dateTime = new \DateTime('2010-06-02 UTC');

        $this->assertDateTimeEquals($dateTime, $form->getData());
        $this->assertEquals($text, $form->getViewData());
    }

    public function testSubmitFromChoice()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'choice',
            'years' => array(2010),
        ));

        $text = array(
            'day' => '2',
            'month' => '6',
            'year' => '2010',
        );

        $form->submit($text);

        $dateTime = new \DateTime('2010-06-02 UTC');

        $this->assertDateTimeEquals($dateTime, $form->getData());
        $this->assertEquals($text, $form->getViewData());
    }

    public function testSubmitFromChoiceEmpty()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'choice',
            'required' => false,
        ));

        $text = array(
            'day' => '',
            'month' => '',
            'year' => '',
        );

        $form->submit($text);

        $this->assertNull($form->getData());
        $this->assertEquals($text, $form->getViewData());
    }

    public function testSubmitFromInputDateTimeDifferentPattern()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'format' => 'MM*yyyy*dd',
            'widget' => 'single_text',
            'input' => 'datetime',
        ));

        $form->submit('06*2010*02');

        $this->assertDateTimeEquals(new \DateTime('2010-06-02 UTC'), $form->getData());
        $this->assertEquals('06*2010*02', $form->getViewData());
    }

    public function testSubmitFromInputStringDifferentPattern()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'format' => 'MM*yyyy*dd',
            'widget' => 'single_text',
            'input' => 'string',
        ));

        $form->submit('06*2010*02');

        $this->assertEquals('2010-06-02', $form->getData());
        $this->assertEquals('06*2010*02', $form->getViewData());
    }

    public function testSubmitFromInputTimestampDifferentPattern()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'format' => 'MM*yyyy*dd',
            'widget' => 'single_text',
            'input' => 'timestamp',
        ));

        $form->submit('06*2010*02');

        $dateTime = new \DateTime('2010-06-02 UTC');

        $this->assertEquals($dateTime->format('U'), $form->getData());
        $this->assertEquals('06*2010*02', $form->getViewData());
    }

    public function testSubmitFromInputRawDifferentPattern()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'format' => 'MM*yyyy*dd',
            'widget' => 'single_text',
            'input' => 'array',
        ));

        $form->submit('06*2010*02');

        $output = array(
            'day' => '2',
            'month' => '6',
            'year' => '2010',
        );

        $this->assertEquals($output, $form->getData());
        $this->assertEquals('06*2010*02', $form->getViewData());
    }

    /**
     * @dataProvider provideDateFormats
     */
    public function testDatePatternWithFormatOption($format, $pattern)
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => $format,
        ));

        $view = $form->createView();

        $this->assertEquals($pattern, $view->vars['date_pattern']);
    }

    public function provideDateFormats()
    {
        return array(
            array('dMy', '{{ day }}{{ month }}{{ year }}'),
            array('d-M-yyyy', '{{ day }}-{{ month }}-{{ year }}'),
            array('M d y', '{{ month }} {{ day }} {{ year }}'),
        );
    }

    /**
     * This test is to check that the strings '0', '1', '2', '3' are not accepted
     * as valid IntlDateFormatter constants for FULL, LONG, MEDIUM or SHORT respectively.
     *
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfFormatIsNoPattern()
    {
<<<<<<< HEAD
        $this->factory->create('date', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => '0',
            'widget' => 'single_text',
            'input' => 'string',
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfFormatDoesNotContainYearMonthAndDay()
    {
<<<<<<< HEAD
        $this->factory->create('date', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'months' => array(6, 7),
            'format' => 'yy',
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfFormatIsNoConstant()
    {
<<<<<<< HEAD
        $this->factory->create('date', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => 105,
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfFormatIsInvalid()
    {
<<<<<<< HEAD
        $this->factory->create('date', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => array(),
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfYearsIsInvalid()
    {
<<<<<<< HEAD
        $this->factory->create('date', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'years' => 'bad value',
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfMonthsIsInvalid()
    {
<<<<<<< HEAD
        $this->factory->create('date', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'months' => 'bad value',
        ));
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testThrowExceptionIfDaysIsInvalid()
    {
<<<<<<< HEAD
        $this->factory->create('date', null, array(
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'days' => 'bad value',
        ));
    }

    public function testSetDataWithNegativeTimezoneOffsetStringInput()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => \IntlDateFormatter::MEDIUM,
            'model_timezone' => 'UTC',
            'view_timezone' => 'America/New_York',
            'input' => 'string',
            'widget' => 'single_text',
        ));

        $form->setData('2010-06-02');

        // 2010-06-02 00:00:00 UTC
        // 2010-06-01 20:00:00 UTC-4
        $this->assertEquals('01.06.2010', $form->getViewData());
    }

    public function testSetDataWithNegativeTimezoneOffsetDateTimeInput()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => \IntlDateFormatter::MEDIUM,
            'model_timezone' => 'UTC',
            'view_timezone' => 'America/New_York',
            'input' => 'datetime',
            'widget' => 'single_text',
        ));

        $dateTime = new \DateTime('2010-06-02 UTC');

        $form->setData($dateTime);

        // 2010-06-02 00:00:00 UTC
        // 2010-06-01 20:00:00 UTC-4
        $this->assertDateTimeEquals($dateTime, $form->getData());
        $this->assertEquals('01.06.2010', $form->getViewData());
    }

    public function testYearsOption()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'years' => array(2010, 2011),
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView('2010', '2010', '2010'),
            new ChoiceView('2011', '2011', '2011'),
        ), $view['year']->vars['choices']);
    }

    public function testMonthsOption()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'months' => array(6, 7),
            'format' => \IntlDateFormatter::SHORT,
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView(6, '6', '06'),
            new ChoiceView(7, '7', '07'),
        ), $view['month']->vars['choices']);
    }

    public function testMonthsOptionShortFormat()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'months' => array(1, 4),
            'format' => 'dd.MMM.yy',
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView(1, '1', 'Jän.'),
            new ChoiceView(4, '4', 'Apr.'),
        ), $view['month']->vars['choices']);
    }

    public function testMonthsOptionLongFormat()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'months' => array(1, 4),
            'format' => 'dd.MMMM.yy',
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView(1, '1', 'Jänner'),
            new ChoiceView(4, '4', 'April'),
        ), $view['month']->vars['choices']);
    }

    public function testMonthsOptionLongFormatWithDifferentTimezone()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'months' => array(1, 4),
            'format' => 'dd.MMMM.yy',
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView(1, '1', 'Jänner'),
            new ChoiceView(4, '4', 'April'),
        ), $view['month']->vars['choices']);
    }

    public function testIsDayWithinRangeReturnsTrueIfWithin()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'days' => array(6, 7),
        ));

        $view = $form->createView();

        $this->assertEquals(array(
            new ChoiceView(6, '6', '06'),
            new ChoiceView(7, '7', '07'),
        ), $view['day']->vars['choices']);
    }

    public function testIsPartiallyFilledReturnsFalseIfSingleText()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'single_text',
        ));

        $form->submit('7.6.2010');

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsFalseIfChoiceAndCompletelyEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'choice',
        ));

        $form->submit(array(
            'day' => '',
            'month' => '',
            'year' => '',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsFalseIfChoiceAndCompletelyFilled()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'choice',
        ));

        $form->submit(array(
            'day' => '2',
            'month' => '6',
            'year' => '2010',
        ));

        $this->assertFalse($form->isPartiallyFilled());
    }

    public function testIsPartiallyFilledReturnsTrueIfChoiceAndDayEmpty()
    {
        $this->markTestIncomplete('Needs to be reimplemented using validators');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'widget' => 'choice',
        ));

        $form->submit(array(
            'day' => '',
            'month' => '6',
            'year' => '2010',
        ));

        $this->assertTrue($form->isPartiallyFilled());
    }

    public function testPassDatePatternToView()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date');
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $view = $form->createView();

        $this->assertSame('{{ day }}{{ month }}{{ year }}', $view->vars['date_pattern']);
    }

    public function testPassDatePatternToViewDifferentFormat()
    {
        // we test against "de_AT", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('de_AT');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => \IntlDateFormatter::LONG,
        ));

        $view = $form->createView();

        $this->assertSame('{{ day }}{{ month }}{{ year }}', $view->vars['date_pattern']);
    }

    public function testPassDatePatternToViewDifferentPattern()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => 'MMyyyydd',
        ));

        $view = $form->createView();

        $this->assertSame('{{ month }}{{ year }}{{ day }}', $view->vars['date_pattern']);
    }

    public function testPassDatePatternToViewDifferentPatternWithSeparators()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'format' => 'MM*yyyy*dd',
        ));

        $view = $form->createView();

        $this->assertSame('{{ month }}*{{ year }}*{{ day }}', $view->vars['date_pattern']);
    }

    public function testDontPassDatePatternIfText()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
        ));
        $view = $form->createView();

        $this->assertFalse(isset($view->vars['date_pattern']));
    }

    public function testDatePatternFormatWithQuotedStrings()
    {
        // we test against "es_ES", so we need the full implementation
        IntlTestHelper::requireFullIntl($this);

        \Locale::setDefault('es_ES');

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            // EEEE, d 'de' MMMM 'de' y
            'format' => \IntlDateFormatter::FULL,
        ));

        $view = $form->createView();

        $this->assertEquals('{{ day }}{{ month }}{{ year }}', $view->vars['date_pattern']);
    }

    public function testPassWidgetToView()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
        ));
        $view = $form->createView();

        $this->assertSame('single_text', $view->vars['widget']);
    }

    public function testInitializeWithDateTime()
    {
        // Throws an exception if "data_class" option is not explicitly set
        // to null in the type
<<<<<<< HEAD
        $this->factory->create('date', new \DateTime());
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', new \DateTime());
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function testSingleTextWidgetShouldUseTheRightInputType()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
        ));

        $view = $form->createView();
        $this->assertEquals('date', $view->vars['type']);
    }

    public function testPassDefaultPlaceholderToViewIfNotRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => false,
        ));

        $view = $form->createView();
        $this->assertSame('', $view['year']->vars['placeholder']);
        $this->assertSame('', $view['month']->vars['placeholder']);
        $this->assertSame('', $view['day']->vars['placeholder']);
    }

    public function testPassNoPlaceholderToViewIfRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => true,
        ));

        $view = $form->createView();
        $this->assertNull($view['year']->vars['placeholder']);
        $this->assertNull($view['month']->vars['placeholder']);
        $this->assertNull($view['day']->vars['placeholder']);
    }

    public function testPassPlaceholderAsString()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'placeholder' => 'Empty',
        ));

        $view = $form->createView();
        $this->assertSame('Empty', $view['year']->vars['placeholder']);
        $this->assertSame('Empty', $view['month']->vars['placeholder']);
        $this->assertSame('Empty', $view['day']->vars['placeholder']);
    }

    /**
     * @group legacy
     */
    public function testPassEmptyValueBC()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'empty_value' => 'Empty',
        ));

        $view = $form->createView();
        $this->assertSame('Empty', $view['year']->vars['placeholder']);
        $this->assertSame('Empty', $view['month']->vars['placeholder']);
        $this->assertSame('Empty', $view['day']->vars['placeholder']);
        $this->assertSame('Empty', $view['year']->vars['empty_value']);
        $this->assertSame('Empty', $view['month']->vars['empty_value']);
        $this->assertSame('Empty', $view['day']->vars['empty_value']);
    }

    public function testPassPlaceholderAsArray()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'placeholder' => array(
                'year' => 'Empty year',
                'month' => 'Empty month',
                'day' => 'Empty day',
            ),
        ));

        $view = $form->createView();
        $this->assertSame('Empty year', $view['year']->vars['placeholder']);
        $this->assertSame('Empty month', $view['month']->vars['placeholder']);
        $this->assertSame('Empty day', $view['day']->vars['placeholder']);
    }

    public function testPassPlaceholderAsPartialArrayAddEmptyIfNotRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => false,
            'placeholder' => array(
                'year' => 'Empty year',
                'day' => 'Empty day',
            ),
        ));

        $view = $form->createView();
        $this->assertSame('Empty year', $view['year']->vars['placeholder']);
        $this->assertSame('', $view['month']->vars['placeholder']);
        $this->assertSame('Empty day', $view['day']->vars['placeholder']);
    }

    public function testPassPlaceholderAsPartialArrayAddNullIfRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => true,
            'placeholder' => array(
                'year' => 'Empty year',
                'day' => 'Empty day',
            ),
        ));

        $view = $form->createView();
        $this->assertSame('Empty year', $view['year']->vars['placeholder']);
        $this->assertNull($view['month']->vars['placeholder']);
        $this->assertSame('Empty day', $view['day']->vars['placeholder']);
    }

    public function testPassHtml5TypeIfSingleTextAndHtml5Format()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
        ));

        $view = $form->createView();
        $this->assertSame('date', $view->vars['type']);
    }

    public function testDontPassHtml5TypeIfHtml5NotAllowed()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
            'html5' => false,
        ));

        $view = $form->createView();
        $this->assertFalse(isset($view->vars['type']));
    }

    public function testDontPassHtml5TypeIfNotHtml5Format()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
            'format' => \IntlDateFormatter::MEDIUM,
        ));

        $view = $form->createView();
        $this->assertFalse(isset($view->vars['type']));
    }

    public function testDontPassHtml5TypeIfNotSingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'text',
        ));

        $view = $form->createView();
        $this->assertFalse(isset($view->vars['type']));
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
    public function testYearErrorsBubbleUp($widget)
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => $widget,
        ));
        $form['year']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['year']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }

    /**
     * @dataProvider provideCompoundWidgets
     */
    public function testMonthErrorsBubbleUp($widget)
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => $widget,
        ));
        $form['month']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['month']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }

    /**
     * @dataProvider provideCompoundWidgets
     */
    public function testDayErrorsBubbleUp($widget)
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => $widget,
        ));
        $form['day']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['day']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }

    public function testYearsFor32BitsMachines()
    {
        if (4 !== PHP_INT_SIZE) {
            $this->markTestSkipped('PHP 32 bit is required.');
        }

<<<<<<< HEAD
        $form = $this->factory->create('date', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'years' => range(1900, 2040),
        ));

        $view = $form->createView();

        $listChoices = array();
        foreach (range(1902, 2037) as $y) {
            $listChoices[] = new ChoiceView($y, $y, $y);
        }

        $this->assertEquals($listChoices, $view['year']->vars['choices']);
    }
<<<<<<< HEAD
=======

    public function testPassDefaultChoiceTranslationDomain()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType');

        $view = $form->createView();
        $this->assertFalse($view['year']->vars['choice_translation_domain']);
        $this->assertFalse($view['month']->vars['choice_translation_domain']);
        $this->assertFalse($view['day']->vars['choice_translation_domain']);
    }

    public function testPassChoiceTranslationDomainAsString()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
            'choice_translation_domain' => 'messages',
        ));

        $view = $form->createView();
        $this->assertSame('messages', $view['year']->vars['choice_translation_domain']);
        $this->assertSame('messages', $view['month']->vars['choice_translation_domain']);
        $this->assertSame('messages', $view['day']->vars['choice_translation_domain']);
    }

    public function testPassChoiceTranslationDomainAsArray()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateType', null, array(
            'choice_translation_domain' => array(
                'year' => 'foo',
                'day' => 'test',
            ),
        ));

        $view = $form->createView();
        $this->assertSame('foo', $view['year']->vars['choice_translation_domain']);
        $this->assertFalse($view['month']->vars['choice_translation_domain']);
        $this->assertSame('test', $view['day']->vars['choice_translation_domain']);
    }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
