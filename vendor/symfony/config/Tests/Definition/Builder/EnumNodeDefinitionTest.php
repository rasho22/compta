<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Config\Tests\Definition\Builder;

use Symfony\Component\Config\Definition\Builder\EnumNodeDefinition;

class EnumNodeDefinitionTest extends \PHPUnit_Framework_TestCase
{
<<<<<<< HEAD
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ->values() must be called with at least two distinct values.
     */
    public function testNoDistinctValues()
    {
        $def = new EnumNodeDefinition('foo');
        $def->values(array('foo', 'foo'));
=======
    public function testWithOneValue()
    {
        $def = new EnumNodeDefinition('foo');
        $def->values(array('foo'));

        $node = $def->getNode();
        $this->assertEquals(array('foo'), $node->getValues());
    }

    public function testWithOneDistinctValue()
    {
        $def = new EnumNodeDefinition('foo');
        $def->values(array('foo', 'foo'));

        $node = $def->getNode();
        $this->assertEquals(array('foo'), $node->getValues());
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage You must call ->values() on enum nodes.
     */
    public function testNoValuesPassed()
    {
        $def = new EnumNodeDefinition('foo');
        $def->getNode();
    }

<<<<<<< HEAD
=======
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage ->values() must be called with at least one value.
     */
    public function testWithNoValues()
    {
        $def = new EnumNodeDefinition('foo');
        $def->values(array());
    }

>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
    public function testGetNode()
    {
        $def = new EnumNodeDefinition('foo');
        $def->values(array('foo', 'bar'));

        $node = $def->getNode();
        $this->assertEquals(array('foo', 'bar'), $node->getValues());
    }
}
