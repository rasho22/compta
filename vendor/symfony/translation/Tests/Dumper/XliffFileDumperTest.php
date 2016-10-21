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
use Symfony\Component\Translation\Dumper\XliffFileDumper;

class XliffFileDumperTest extends \PHPUnit_Framework_TestCase
{
<<<<<<< HEAD
    public function testDump()
=======
    public function testFormatCatalogue()
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    {
        $catalogue = new MessageCatalogue('en_US');
        $catalogue->add(array(
            'foo' => 'bar',
            'key' => '',
            'key.with.cdata' => '<source> & <target>',
        ));
        $catalogue->setMetadata('foo', array('notes' => array(array('priority' => 1, 'from' => 'bar', 'content' => 'baz'))));
        $catalogue->setMetadata('key', array('notes' => array(array('content' => 'baz'), array('content' => 'qux'))));

<<<<<<< HEAD
        $tempDir = sys_get_temp_dir();
        $dumper = new XliffFileDumper();
        $dumper->dump($catalogue, array('path' => $tempDir, 'default_locale' => 'fr_FR'));

        $this->assertEquals(
            file_get_contents(__DIR__.'/../fixtures/resources-clean.xlf'),
            file_get_contents($tempDir.'/messages.en_US.xlf')
        );

        unlink($tempDir.'/messages.en_US.xlf');
=======
        $dumper = new XliffFileDumper();

        $this->assertStringEqualsFile(
            __DIR__.'/../fixtures/resources-clean.xlf',
            $dumper->formatCatalogue($catalogue, 'messages', array('default_locale' => 'fr_FR'))
        );
    }

    public function testFormatCatalogueXliff2()
    {
        $catalogue = new MessageCatalogue('en_US');
        $catalogue->add(array(
            'foo' => 'bar',
            'key' => '',
            'key.with.cdata' => '<source> & <target>',
        ));
        $catalogue->setMetadata('key', array('target-attributes' => array('order' => 1)));

        $dumper = new XliffFileDumper();

        $this->assertStringEqualsFile(
            __DIR__.'/../fixtures/resources-2.0-clean.xlf',
            $dumper->formatCatalogue($catalogue, 'messages', array('default_locale' => 'fr_FR', 'xliff_version' => '2.0'))
        );
    }

    public function testFormatCatalogueWithCustomToolInfo()
    {
        $options = array(
            'default_locale' => 'en_US',
            'tool_info' => array('tool-id' => 'foo', 'tool-name' => 'foo', 'tool-version' => '0.0', 'tool-company' => 'Foo'),
        );

        $catalogue = new MessageCatalogue('en_US');
        $catalogue->add(array('foo' => 'bar'));

        $dumper = new XliffFileDumper();

        $this->assertStringEqualsFile(
            __DIR__.'/../fixtures/resources-tool-info.xlf',
            $dumper->formatCatalogue($catalogue, 'messages', $options)
        );
    }

    public function testFormatCatalogueWithTargetAttributesMetadata()
    {
        $catalogue = new MessageCatalogue('en_US');
        $catalogue->add(array(
            'foo' => 'bar',
        ));
        $catalogue->setMetadata('foo', array('target-attributes' => array('state' => 'needs-translation')));

        $dumper = new XliffFileDumper();

        $this->assertStringEqualsFile(
            __DIR__.'/../fixtures/resources-target-attributes.xlf',
            $dumper->formatCatalogue($catalogue, 'messages', array('default_locale' => 'fr_FR'))
        );
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }
}
