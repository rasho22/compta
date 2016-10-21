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

use Symfony\Component\Form\FormError;
use Symfony\Component\Form\Test\TypeTestCase as TestCase;

class DateTimeTypeTest extends TestCase
{
    protected function setUp()
    {
        \Locale::setDefault('en');

        parent::setUp();
    }

<<<<<<< HEAD
    public function testSubmitDateTime()
    {
        $form = $this->factory->create('datetime', null, array(
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('datetime');

        $this->assertSame('datetime', $form->getConfig()->getType()->getName());
    }

    public function testSubmitDateTime()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'date_widget' => 'choice',
            'years' => array(2010),
            'time_widget' => 'choice',
            'input' => 'datetime',
        ));

        $form->submit(array(
            'date' => array(
                'day' => '2',
                'month' => '6',
                'year' => '2010',
            ),
            'time' => array(
                'hour' => '3',
                'minute' => '4',
            ),
        ));

        $dateTime = new \DateTime('2010-06-02 03:04:00 UTC');

        $this->assertDateTimeEquals($dateTime, $form->getData());
    }

    public function testSubmitString()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'string',
            'date_widget' => 'choice',
            'years' => array(2010),
            'time_widget' => 'choice',
        ));

        $form->submit(array(
            'date' => array(
                'day' => '2',
                'month' => '6',
                'year' => '2010',
            ),
            'time' => array(
                'hour' => '3',
                'minute' => '4',
            ),
        ));

        $this->assertEquals('2010-06-02 03:04:00', $form->getData());
    }

    public function testSubmitTimestamp()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'timestamp',
            'date_widget' => 'choice',
            'years' => array(2010),
            'time_widget' => 'choice',
        ));

        $form->submit(array(
            'date' => array(
                'day' => '2',
                'month' => '6',
                'year' => '2010',
            ),
            'time' => array(
                'hour' => '3',
                'minute' => '4',
            ),
        ));

        $dateTime = new \DateTime('2010-06-02 03:04:00 UTC');

        $this->assertEquals($dateTime->format('U'), $form->getData());
    }

    public function testSubmitWithoutMinutes()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'date_widget' => 'choice',
            'years' => array(2010),
            'time_widget' => 'choice',
            'input' => 'datetime',
            'with_minutes' => false,
        ));

        $form->setData(new \DateTime());

        $input = array(
            'date' => array(
                'day' => '2',
                'month' => '6',
                'year' => '2010',
            ),
            'time' => array(
                'hour' => '3',
            ),
        );

        $form->submit($input);

        $this->assertDateTimeEquals(new \DateTime('2010-06-02 03:00:00 UTC'), $form->getData());
    }

    public function testSubmitWithSeconds()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'date_widget' => 'choice',
            'years' => array(2010),
            'time_widget' => 'choice',
            'input' => 'datetime',
            'with_seconds' => true,
        ));

        $form->setData(new \DateTime());

        $input = array(
            'date' => array(
                'day' => '2',
                'month' => '6',
                'year' => '2010',
            ),
            'time' => array(
                'hour' => '3',
                'minute' => '4',
                'second' => '5',
            ),
        );

        $form->submit($input);

        $this->assertDateTimeEquals(new \DateTime('2010-06-02 03:04:05 UTC'), $form->getData());
    }

    public function testSubmitDifferentTimezones()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'America/New_York',
            'view_timezone' => 'Pacific/Tahiti',
            'date_widget' => 'choice',
            'years' => array(2010),
            'time_widget' => 'choice',
            'input' => 'string',
            'with_seconds' => true,
        ));

        $dateTime = new \DateTime('2010-06-02 03:04:05 Pacific/Tahiti');

        $form->submit(array(
            'date' => array(
                'day' => (int) $dateTime->format('d'),
                'month' => (int) $dateTime->format('m'),
                'year' => (int) $dateTime->format('Y'),
            ),
            'time' => array(
                'hour' => (int) $dateTime->format('H'),
                'minute' => (int) $dateTime->format('i'),
                'second' => (int) $dateTime->format('s'),
            ),
        ));

        $dateTime->setTimezone(new \DateTimeZone('America/New_York'));

        $this->assertEquals($dateTime->format('Y-m-d H:i:s'), $form->getData());
    }

    public function testSubmitDifferentTimezonesDateTime()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'America/New_York',
            'view_timezone' => 'Pacific/Tahiti',
            'widget' => 'single_text',
            'input' => 'datetime',
        ));

        $outputTime = new \DateTime('2010-06-02 03:04:00 Pacific/Tahiti');

        $form->submit('2010-06-02T03:04:00-10:00');

        $outputTime->setTimezone(new \DateTimeZone('America/New_York'));

        $this->assertDateTimeEquals($outputTime, $form->getData());
        $this->assertEquals('2010-06-02T03:04:00-10:00', $form->getViewData());
    }

    public function testSubmitStringSingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'string',
            'widget' => 'single_text',
        ));

        $form->submit('2010-06-02T03:04:00Z');

        $this->assertEquals('2010-06-02 03:04:00', $form->getData());
        $this->assertEquals('2010-06-02T03:04:00Z', $form->getViewData());
    }

    public function testSubmitStringSingleTextWithSeconds()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'model_timezone' => 'UTC',
            'view_timezone' => 'UTC',
            'input' => 'string',
            'widget' => 'single_text',
            'with_seconds' => true,
        ));

        $form->submit('2010-06-02T03:04:05Z');

        $this->assertEquals('2010-06-02 03:04:05', $form->getData());
        $this->assertEquals('2010-06-02T03:04:05Z', $form->getViewData());
    }

    public function testSubmitDifferentPattern()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'date_format' => 'MM*yyyy*dd',
            'date_widget' => 'single_text',
            'time_widget' => 'single_text',
            'input' => 'datetime',
        ));

        $dateTime = new \DateTime('2010-06-02 03:04');

        $form->submit(array(
            'date' => '06*2010*02',
            'time' => '03:04',
        ));

        $this->assertDateTimeEquals($dateTime, $form->getData());
    }

    public function testInitializeWithDateTime()
    {
        // Throws an exception if "data_class" option is not explicitly set
        // to null in the type
<<<<<<< HEAD
        $this->factory->create('datetime', new \DateTime());
=======
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', new \DateTime());
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    public function testSingleTextWidgetShouldUseTheRightInputType()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
        ));

        $view = $form->createView();
        $this->assertEquals('datetime', $view->vars['type']);
    }

    public function testPassDefaultPlaceholderToViewIfNotRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => false,
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('', $view['date']['year']->vars['placeholder']);
        $this->assertSame('', $view['date']['month']->vars['placeholder']);
        $this->assertSame('', $view['date']['day']->vars['placeholder']);
        $this->assertSame('', $view['time']['hour']->vars['placeholder']);
        $this->assertSame('', $view['time']['minute']->vars['placeholder']);
        $this->assertSame('', $view['time']['second']->vars['placeholder']);
    }

    public function testPassNoPlaceholderToViewIfRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => true,
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertNull($view['date']['year']->vars['placeholder']);
        $this->assertNull($view['date']['month']->vars['placeholder']);
        $this->assertNull($view['date']['day']->vars['placeholder']);
        $this->assertNull($view['time']['hour']->vars['placeholder']);
        $this->assertNull($view['time']['minute']->vars['placeholder']);
        $this->assertNull($view['time']['second']->vars['placeholder']);
    }

    public function testPassPlaceholderAsString()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'placeholder' => 'Empty',
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty', $view['date']['year']->vars['placeholder']);
        $this->assertSame('Empty', $view['date']['month']->vars['placeholder']);
        $this->assertSame('Empty', $view['date']['day']->vars['placeholder']);
        $this->assertSame('Empty', $view['time']['hour']->vars['placeholder']);
        $this->assertSame('Empty', $view['time']['minute']->vars['placeholder']);
        $this->assertSame('Empty', $view['time']['second']->vars['placeholder']);
    }

    /**
     * @group legacy
     */
    public function testPassEmptyValueBC()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'empty_value' => 'Empty',
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty', $view['date']['year']->vars['placeholder']);
        $this->assertSame('Empty', $view['date']['month']->vars['placeholder']);
        $this->assertSame('Empty', $view['date']['day']->vars['placeholder']);
        $this->assertSame('Empty', $view['time']['hour']->vars['placeholder']);
        $this->assertSame('Empty', $view['time']['minute']->vars['placeholder']);
        $this->assertSame('Empty', $view['time']['second']->vars['placeholder']);
        $this->assertSame('Empty', $view['date']['year']->vars['empty_value']);
        $this->assertSame('Empty', $view['date']['month']->vars['empty_value']);
        $this->assertSame('Empty', $view['date']['day']->vars['empty_value']);
        $this->assertSame('Empty', $view['time']['hour']->vars['empty_value']);
        $this->assertSame('Empty', $view['time']['minute']->vars['empty_value']);
        $this->assertSame('Empty', $view['time']['second']->vars['empty_value']);
    }

    public function testPassPlaceholderAsArray()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'placeholder' => array(
                'year' => 'Empty year',
                'month' => 'Empty month',
                'day' => 'Empty day',
                'hour' => 'Empty hour',
                'minute' => 'Empty minute',
                'second' => 'Empty second',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty year', $view['date']['year']->vars['placeholder']);
        $this->assertSame('Empty month', $view['date']['month']->vars['placeholder']);
        $this->assertSame('Empty day', $view['date']['day']->vars['placeholder']);
        $this->assertSame('Empty hour', $view['time']['hour']->vars['placeholder']);
        $this->assertSame('Empty minute', $view['time']['minute']->vars['placeholder']);
        $this->assertSame('Empty second', $view['time']['second']->vars['placeholder']);
    }

    public function testPassPlaceholderAsPartialArrayAddEmptyIfNotRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => false,
            'placeholder' => array(
                'year' => 'Empty year',
                'day' => 'Empty day',
                'hour' => 'Empty hour',
                'second' => 'Empty second',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty year', $view['date']['year']->vars['placeholder']);
        $this->assertSame('', $view['date']['month']->vars['placeholder']);
        $this->assertSame('Empty day', $view['date']['day']->vars['placeholder']);
        $this->assertSame('Empty hour', $view['time']['hour']->vars['placeholder']);
        $this->assertSame('', $view['time']['minute']->vars['placeholder']);
        $this->assertSame('Empty second', $view['time']['second']->vars['placeholder']);
    }

    public function testPassPlaceholderAsPartialArrayAddNullIfRequired()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'required' => true,
            'placeholder' => array(
                'year' => 'Empty year',
                'day' => 'Empty day',
                'hour' => 'Empty hour',
                'second' => 'Empty second',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('Empty year', $view['date']['year']->vars['placeholder']);
        $this->assertNull($view['date']['month']->vars['placeholder']);
        $this->assertSame('Empty day', $view['date']['day']->vars['placeholder']);
        $this->assertSame('Empty hour', $view['time']['hour']->vars['placeholder']);
        $this->assertNull($view['time']['minute']->vars['placeholder']);
        $this->assertSame('Empty second', $view['time']['second']->vars['placeholder']);
    }

    public function testPassHtml5TypeIfSingleTextAndHtml5Format()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
        ));

        $view = $form->createView();
        $this->assertSame('datetime', $view->vars['type']);
    }

    public function testDontPassHtml5TypeIfHtml5NotAllowed()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
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
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'single_text',
            'format' => 'yyyy-MM-dd HH:mm',
        ));

        $view = $form->createView();
        $this->assertFalse(isset($view->vars['type']));
    }

    public function testDontPassHtml5TypeIfNotSingleText()
    {
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'widget' => 'text',
        ));

        $view = $form->createView();
        $this->assertFalse(isset($view->vars['type']));
    }

    public function testDateTypeChoiceErrorsBubbleUp()
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null);
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $form['date']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['date']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }

    public function testDateTypeSingleTextErrorsBubbleUp()
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'date_widget' => 'single_text',
        ));

        $form['date']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['date']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }

    public function testTimeTypeChoiceErrorsBubbleUp()
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null);
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null);
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $form['time']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['time']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }

    public function testTimeTypeSingleTextErrorsBubbleUp()
    {
        $error = new FormError('Invalid!');
<<<<<<< HEAD
        $form = $this->factory->create('datetime', null, array(
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'time_widget' => 'single_text',
        ));

        $form['time']->addError($error);

        $this->assertSame(array(), iterator_to_array($form['time']->getErrors()));
        $this->assertSame(array($error), iterator_to_array($form->getErrors()));
    }
<<<<<<< HEAD
=======

    public function testPassDefaultChoiceTranslationDomain()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
            'with_seconds' => true,
        ));

        $view = $form->createView();

        $this->assertFalse($view['date']['year']->vars['choice_translation_domain']);
        $this->assertFalse($view['date']['month']->vars['choice_translation_domain']);
        $this->assertFalse($view['date']['day']->vars['choice_translation_domain']);
        $this->assertFalse($view['time']['hour']->vars['choice_translation_domain']);
        $this->assertFalse($view['time']['minute']->vars['choice_translation_domain']);
        $this->assertFalse($view['time']['second']->vars['choice_translation_domain']);
    }

    public function testPassChoiceTranslationDomainAsString()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
            'choice_translation_domain' => 'messages',
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('messages', $view['date']['year']->vars['choice_translation_domain']);
        $this->assertSame('messages', $view['date']['month']->vars['choice_translation_domain']);
        $this->assertSame('messages', $view['date']['day']->vars['choice_translation_domain']);
        $this->assertSame('messages', $view['time']['hour']->vars['choice_translation_domain']);
        $this->assertSame('messages', $view['time']['minute']->vars['choice_translation_domain']);
        $this->assertSame('messages', $view['time']['second']->vars['choice_translation_domain']);
    }

    public function testPassChoiceTranslationDomainAsArray()
    {
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\DateTimeType', null, array(
            'choice_translation_domain' => array(
                'year' => 'foo',
                'month' => 'test',
                'hour' => 'foo',
                'second' => 'test',
            ),
            'with_seconds' => true,
        ));

        $view = $form->createView();
        $this->assertSame('foo', $view['date']['year']->vars['choice_translation_domain']);
        $this->assertSame('test', $view['date']['month']->vars['choice_translation_domain']);
        $this->assertFalse($view['date']['day']->vars['choice_translation_domain']);
        $this->assertSame('foo', $view['time']['hour']->vars['choice_translation_domain']);
        $this->assertFalse($view['time']['minute']->vars['choice_translation_domain']);
        $this->assertSame('test', $view['time']['second']->vars['choice_translation_domain']);
    }
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
}
