<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests\DataCollector;

use Symfony\Component\Translation\DataCollectorTranslator;
use Symfony\Component\Translation\DataCollector\TranslationDataCollector;

class TranslationDataCollectorTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        if (!class_exists('Symfony\Component\HttpKernel\DataCollector\DataCollector')) {
            $this->markTestSkipped('The "DataCollector" is not available');
        }
    }

    public function testCollectEmptyMessages()
    {
        $translator = $this->getTranslator();
        $translator->expects($this->any())->method('getCollectedMessages')->will($this->returnValue(array()));

        $dataCollector = new TranslationDataCollector($translator);
        $dataCollector->lateCollect();

        $this->assertEquals(0, $dataCollector->getCountMissings());
        $this->assertEquals(0, $dataCollector->getCountFallbacks());
        $this->assertEquals(0, $dataCollector->getCountDefines());
        $this->assertEquals(array(), $dataCollector->getMessages());
    }

    public function testCollect()
    {
        $collectedMessages = array(
            array(
                  'id' => 'foo',
                  'translation' => 'foo (en)',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_DEFINED,
<<<<<<< HEAD
=======
                  'parameters' => array(),
                  'transChoiceNumber' => null,
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ),
            array(
                  'id' => 'bar',
                  'translation' => 'bar (fr)',
                  'locale' => 'fr',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
<<<<<<< HEAD
=======
                  'parameters' => array(),
                  'transChoiceNumber' => null,
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ),
            array(
                  'id' => 'choice',
                  'translation' => 'choice',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_MISSING,
<<<<<<< HEAD
=======
                  'parameters' => array('%count%' => 3),
                  'transChoiceNumber' => 3,
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ),
            array(
                  'id' => 'choice',
                  'translation' => 'choice',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_MISSING,
<<<<<<< HEAD
=======
                  'parameters' => array('%count%' => 3),
                  'transChoiceNumber' => 3,
            ),
            array(
                  'id' => 'choice',
                  'translation' => 'choice',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_MISSING,
                  'parameters' => array('%count%' => 4, '%foo%' => 'bar'),
                  'transChoiceNumber' => 4,
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ),
        );
        $expectedMessages = array(
            array(
                  'id' => 'foo',
                  'translation' => 'foo (en)',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_DEFINED,
                  'count' => 1,
<<<<<<< HEAD
=======
                  'parameters' => array(),
                  'transChoiceNumber' => null,
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ),
            array(
                  'id' => 'bar',
                  'translation' => 'bar (fr)',
                  'locale' => 'fr',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK,
                  'count' => 1,
<<<<<<< HEAD
=======
                  'parameters' => array(),
                  'transChoiceNumber' => null,
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ),
            array(
                  'id' => 'choice',
                  'translation' => 'choice',
                  'locale' => 'en',
                  'domain' => 'messages',
                  'state' => DataCollectorTranslator::MESSAGE_MISSING,
<<<<<<< HEAD
                  'count' => 2,
=======
                  'count' => 3,
                  'parameters' => array(
                      array('%count%' => 3),
                      array('%count%' => 3),
                      array('%count%' => 4, '%foo%' => 'bar'),
                  ),
                  'transChoiceNumber' => 3,
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            ),
        );

        $translator = $this->getTranslator();
        $translator->expects($this->any())->method('getCollectedMessages')->will($this->returnValue($collectedMessages));

        $dataCollector = new TranslationDataCollector($translator);
        $dataCollector->lateCollect();

        $this->assertEquals(1, $dataCollector->getCountMissings());
        $this->assertEquals(1, $dataCollector->getCountFallbacks());
        $this->assertEquals(1, $dataCollector->getCountDefines());
        $this->assertEquals($expectedMessages, array_values($dataCollector->getMessages()));
    }

    private function getTranslator()
    {
        $translator = $this
            ->getMockBuilder('Symfony\Component\Translation\DataCollectorTranslator')
            ->disableOriginalConstructor()
            ->getMock()
        ;

        return $translator;
    }
}
