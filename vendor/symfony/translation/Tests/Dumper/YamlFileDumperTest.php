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
use Symfony\Component\Translation\Dumper\YamlFileDumper;

class YamlFileDumperTest extends \PHPUnit_Framework_TestCase
{
<<<<<<< HEAD
    public function testDump()
    {
        $catalogue = new MessageCatalogue('en');
        $catalogue->add(array('foo' => 'bar'));

        $tempDir = sys_get_temp_dir();
        $dumper = new YamlFileDumper();
        $dumper->dump($catalogue, array('path' => $tempDir));

        $this->assertEquals(file_get_contents(__DIR__.'/../fixtures/resources.yml'), file_get_contents($tempDir.'/messages.en.yml'));

        unlink($tempDir.'/messages.en.yml');
=======
    public function testTreeFormatCatalogue()
    {
        $catalogue = new MessageCatalogue('en');
        $catalogue->add(
            array(
                'foo.bar1' => 'value1',
                'foo.bar2' => 'value2',
            ));

        $dumper = new YamlFileDumper();

        $this->assertStringEqualsFile(__DIR__.'/../fixtures/messages.yml', $dumper->formatCatalogue($catalogue, 'messages', array('as_tree' => true, 'inline' => 999)));
    }

    public function testLinearFormatCatalogue()
    {
        $catalogue = new MessageCatalogue('en');
        $catalogue->add(
            array(
                'foo.bar1' => 'value1',
                'foo.bar2' => 'value2',
            ));

        $dumper = new YamlFileDumper();

        $this->assertStringEqualsFile(__DIR__.'/../fixtures/messages_linear.yml', $dumper->formatCatalogue($catalogue, 'messages'));
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
