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

class FileTypeTest extends \Symfony\Component\Form\Test\TypeTestCase
{
<<<<<<< HEAD
    // https://github.com/symfony/symfony/pull/5028
    public function testSetData()
    {
        $form = $this->factory->createBuilder('file')->getForm();
=======
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('file');

        $this->assertSame('file', $form->getConfig()->getType()->getName());
    }

    // https://github.com/symfony/symfony/pull/5028
    public function testSetData()
    {
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FileType')->getForm();
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $data = $this->createUploadedFileMock('abcdef', 'original.jpg', true);

        $form->setData($data);

        $this->assertSame($data, $form->getData());
    }

    public function testSubmit()
    {
<<<<<<< HEAD
        $form = $this->factory->createBuilder('file')->getForm();
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FileType')->getForm();
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        $data = $this->createUploadedFileMock('abcdef', 'original.jpg', true);

        $form->submit($data);

        $this->assertSame($data, $form->getData());
    }

    // https://github.com/symfony/symfony/issues/6134
    public function testSubmitEmpty()
    {
<<<<<<< HEAD
        $form = $this->factory->createBuilder('file')->getForm();
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FileType')->getForm();
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af

        $form->submit(null);

        $this->assertNull($form->getData());
    }

    public function testSubmitMultiple()
    {
<<<<<<< HEAD
        $form = $this->factory->createBuilder('file', null, array(
=======
        $form = $this->factory->createBuilder('Symfony\Component\Form\Extension\Core\Type\FileType', null, array(
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
            'multiple' => true,
        ))->getForm();

        $data = array(
            $this->createUploadedFileMock('abcdef', 'first.jpg', true),
            $this->createUploadedFileMock('zyxwvu', 'second.jpg', true),
        );

        $form->submit($data);
        $this->assertSame($data, $form->getData());

        $view = $form->createView();
        $this->assertSame('file[]', $view->vars['full_name']);
        $this->assertArrayHasKey('multiple', $view->vars['attr']);
    }

    public function testDontPassValueToView()
    {
<<<<<<< HEAD
        $form = $this->factory->create('file');
        $form->submit(array(
            'file' => $this->createUploadedFileMock('abcdef', 'original.jpg', true),
=======
        $form = $this->factory->create('Symfony\Component\Form\Extension\Core\Type\FileType');
        $form->submit(array(
            'Symfony\Component\Form\Extension\Core\Type\FileType' => $this->createUploadedFileMock('abcdef', 'original.jpg', true),
>>>>>>> 142cc195a7ab2884643ba9e1d4b7d43ec9adc6af
        ));
        $view = $form->createView();

        $this->assertEquals('', $view->vars['value']);
    }

    private function createUploadedFileMock($name, $originalName, $valid)
    {
        $file = $this
            ->getMockBuilder('Symfony\Component\HttpFoundation\File\UploadedFile')
            ->setConstructorArgs(array(__DIR__.'/../../../Fixtures/foo', 'foo'))
            ->getMock()
        ;
        $file
            ->expects($this->any())
            ->method('getBasename')
            ->will($this->returnValue($name))
        ;
        $file
            ->expects($this->any())
            ->method('getClientOriginalName')
            ->will($this->returnValue($originalName))
        ;
        $file
            ->expects($this->any())
            ->method('isValid')
            ->will($this->returnValue($valid))
        ;

        return $file;
    }
}
