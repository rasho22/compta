<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Tests\Dumper;

use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Dumper\CsvFileDumper;

class CsvFileDumperTest extends \PHPUnit_Framework_TestCase
{
<<<<<<< HEAD
    public function testDump()
=======
    public function testFormatCatalogue()
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    {
        $catalogue = new MessageCatalogue('en');
        $catalogue->add(array('foo' => 'bar', 'bar' => 'foo
foo', 'foo;foo' => 'bar'));

<<<<<<< HEAD
        $tempDir = sys_get_temp_dir();
        $dumper = new CsvFileDumper();
        $dumper->dump($catalogue, array('path' => $tempDir));

        $this->assertEquals(file_get_contents(__DIR__.'/../fixtures/valid.csv'), file_get_contents($tempDir.'/messages.en.csv'));

        unlink($tempDir.'/messages.en.csv');
=======
        $dumper = new CsvFileDumper();

        $this->assertStringEqualsFile(__DIR__.'/../fixtures/valid.csv', $dumper->formatCatalogue($catalogue, 'messages'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
