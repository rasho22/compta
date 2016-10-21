<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Extension\Validator;

use Symfony\Component\Form\Extension\Validator\ValidatorExtension;
use Symfony\Component\Validator\ValidatorInterface;

class ValidatorExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function test2Dot5ValidationApi()
    {
        $validator = $this->getMockBuilder('Symfony\Component\Validator\Validator\RecursiveValidator')
            ->disableOriginalConstructor()
            ->getMock();
        $metadata = $this->getMockBuilder('Symfony\Component\Validator\Mapping\ClassMetadata')
            ->disableOriginalConstructor()
            ->getMock();

        $validator->expects($this->once())
            ->method('getMetadataFor')
            ->with($this->identicalTo('Symfony\Component\Form\Form'))
            ->will($this->returnValue($metadata));

        // Verify that the constraints are added
        $metadata->expects($this->once())
            ->method('addConstraint')
            ->with($this->isInstanceOf('Symfony\Component\Form\Extension\Validator\Constraints\Form'));

        $metadata->expects($this->once())
            ->method('addPropertyConstraint')
            ->with('children', $this->isInstanceOf('Symfony\Component\Validator\Constraints\Valid'));

        if ($validator instanceof ValidatorInterface) {
            $validator
                ->expects($this->never())
                ->method('getMetadataFactory');
        }

        $extension = new ValidatorExtension($validator);
        $guesser = $extension->loadTypeGuesser();

        $this->assertInstanceOf('Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser', $guesser);
    }

    /**
     * @group legacy
     */
    public function test2Dot4ValidationApi()
    {
<<<<<<< HEAD
        $factory = $this->getMock('Symfony\Component\Validator\MetadataFactoryInterface');
=======
        $factory = $this->getMock('Symfony\Component\Validator\Mapping\Factory\MetadataFactoryInterface');
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $validator = $this->getMock('Symfony\Component\Validator\ValidatorInterface');
        $metadata = $this->getMockBuilder('Symfony\Component\Validator\Mapping\ClassMetadata')
            ->disableOriginalConstructor()
            ->getMock();

        $validator->expects($this->any())
            ->method('getMetadataFactory')
            ->will($this->returnValue($factory));

        $factory->expects($this->once())
            ->method('getMetadataFor')
            ->with($this->identicalTo('Symfony\Component\Form\Form'))
            ->will($this->returnValue($metadata));

        // Verify that the constraints are added
        $metadata->expects($this->once())
            ->method('addConstraint')
            ->with($this->isInstanceOf('Symfony\Component\Form\Extension\Validator\Constraints\Form'));

        $metadata->expects($this->once())
            ->method('addPropertyConstraint')
            ->with('children', $this->isInstanceOf('Symfony\Component\Validator\Constraints\Valid'));

        $extension = new ValidatorExtension($validator);
        $guesser = $extension->loadTypeGuesser();

        $this->assertInstanceOf('Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser', $guesser);
    }

    /**
     * @expectedException \Symfony\Component\Form\Exception\UnexpectedTypeException
     * @group legacy
     */
    public function testInvalidValidatorInterface()
    {
        new ValidatorExtension(null);
    }
}
